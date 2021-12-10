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

#$schemas = include('config/schemas.php');


    $registry = new Registry($dbal);
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




$orm = new ORM(new Factory($dbal), new Schema($cmp->getSchema()) );

//$u = new User(1,'jorge');

$u = (new Select($orm, User::class))->load('comments')->fetchOne();



$c = new Comment(1,'wehehe');
#$c->user = $u;
$u->comments[]=$c;

$t = new Cycle\ORM\Transaction\UnitOfWork($orm);
$t->persist($u);
//foreach($u->comments as $comment){
//    $t->persist($comment);
//}
$t->run();