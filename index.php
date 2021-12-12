<?php

use Acme\Entity\Comment;
use Acme\Entity\User;
use Cycle\Annotated\Embeddings;
use Cycle\Annotated\Entities;
use Cycle\Annotated\MergeColumns;
use Cycle\Annotated\MergeIndexes;
use Cycle\Database\DatabaseManager;
use Cycle\ORM\Factory;
use Cycle\ORM\ORM;
use Cycle\ORM\Relation;
use Cycle\ORM\Schema;
use Cycle\ORM\Select;
use Cycle\Schema\Compiler;
use Cycle\Schema\Generator\GenerateRelations;
use Cycle\Schema\Generator\GenerateTypecast;
use Cycle\Schema\Generator\RenderRelations;
use Cycle\Schema\Generator\RenderTables;
use Cycle\Schema\Generator\ResetTables;
use Cycle\Schema\Generator\SyncTables;
use Cycle\Schema\Generator\ValidateEntities;
use Cycle\Schema\Registry;
use Spiral\Tokenizer\ClassLocator;
use Symfony\Component\Finder\Finder;

require_once "vendor/autoload.php";


$finder = (new Finder())->files()->in(['src/Entity']); // __DIR__ here is folder with entities
$classLocator = new ClassLocator($finder);


$dbal = new DatabaseManager(include_once('config/db.php'));


$registry = new Registry($dbal);


#$schema = include('config/schemas.php');

$cmp = new Compiler();
$cmp->compile($registry, [
    new ResetTables(),       // re-declared table schemas (remove columns)
    new Embeddings($classLocator),  // register embeddable entities
    new Entities($classLocator),    // register annotated entities
    new MergeColumns(),             // add @Table column declarations
    new GenerateRelations(), // generate entity relations
    new ValidateEntities(),  // make sure all entity schemas are correct
    new RenderTables(),      // declare table schemas
    new RenderRelations(),   // declare relation keys and indexes
    new MergeIndexes(),             // add @Table column declarations
    new SyncTables(),        // sync table changes to database
    new GenerateTypecast(),  // typecast non string columns
]);
$schema = $cmp->getSchema();

//file_put_contents('config/schemas.php', '<?php '.PHP_EOL.'return '.var_export($schema, true).';');
//die();
//SchemaInterface::TABLE
//Relation::ONETOMANY

function constants($className, bool $fullRef = true): ?array
{
    if (class_exists($className)) {
        return array_map(
            fn($i) => $fullRef ? sprintf("%s::%s", $className, $i) : $i,
            array_flip((new \ReflectionClass($className))->getConstants())
        );
    }
    return null;
}

function walk_key_value(array $array, callable $callable, mixed $userData = null)
{
    return array_reduce(array_keys($array), function ($c, $key) use ($array, $callable, $userData) {
        $value = $array[$key];
        $callable($value, $key, $userData);
        $c[$key] = $value;
        return $c;
    }, []);
}

function var_export_short($expression, bool $return = false): ?string
{
    $export = var_export($expression, true);
    $export = preg_replace("/^([ ]*)(.*)/m", '$1$1$2', $export);
    $array = preg_split("/\r\n|\n|\r/", $export);
    $array = preg_replace(["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/"], [null, ']$1', ' => ['], $array);
    $export = join(PHP_EOL, array_filter(["["] + $array));
    if (!$return) {
        echo $export;
        return null;
    } else {
        return $export;
    }
}

function reflectSchema($schema)
{
    return walk_key_value($schema, function (&$value, &$key, $userData) {
        $value = walk_key_value($value, function (&$value, &$key, $userData) {
            $key = $userData[$key];
            if ($key === 'Cycle\ORM\Schema::RELATIONS') {
                $value = walk_key_value($value, function (&$value, &$key, $userData) {
                    $value = walk_key_value($value, function (&$value, &$key, $userData) {
                        $key = $userData[$key];
                        if ($key === 'Cycle\ORM\Relation::SCHEMA') {
                            $value = walk_key_value($value, function (&$value, &$key, $userData) {
                                $key = $userData[$key];
                            }, $userData);
                        }
                    }, constants(Relation::class));
                });
            }
        }, constants(Schema::class));
    });

}

function dumpSchema($schema){
    $dump = var_export_short(reflectSchema($schema), true);
    $dump = preg_replace_callback('@\'([\w\\\\]+::[\w]+)\'@s', fn($matches) => '\\' . stripslashes($matches[1]), $dump);
    return $dump;
}


file_put_contents('config/schemas.php', '<?php ' . PHP_EOL . 'return ' . dumpSchema($schema) . ';');
die;
$orm = new ORM(new Factory($dbal), new Schema($schema));
//$u = new User(1,'jorge');

/** @var User $u */
$u = (new Select($orm, User::class))->load('comments')->fetchOne();

dd($u);

die();


$c = new Comment(1, 'wehehe');
#$c->user = $u;
$u->comments[] = $c;

$t = new Cycle\ORM\Transaction\UnitOfWork($orm);
$t->persist($u);
//foreach($u->comments as $comment){
//    $t->persist($comment);
//}
$t->run();