<?php


use Acme\Compiler;
use Acme\DbLogger;
use Acme\Entity\Comment;
use Acme\Entity\Post;
use Acme\Entity\User;
use Acme\VO\Comment as CommentVO;
use Acme\VO\Id;
use Cycle\Database\DatabaseManager;
use Cycle\ORM\Factory;
use Cycle\ORM\ORM;
use Cycle\ORM\Schema;
use Cycle\ORM\Select;


require_once "vendor/autoload.php";


$dbal = new DatabaseManager(include_once('config/db.php'));
$dbal->setLogger(new DbLogger());


$schema = include('config/schemas.php');

$schema = Compiler::compile($dbal, 'config/schemas.php');


//$factory = new Factory($dbal, null, null, new SimpleCollection());
$factory = new Factory($dbal, null, null);


//CollectionFactory::register('simple', fn(?array $data) => new SimpleCollection($data ?? []));

$orm = new ORM($factory, new Schema($schema));


//;

///** @var User $u */
//$u = (new Select($orm, User::class))->load('comments')->fetchOne();
//
//dd($u);
//
//die();


//$u = new User(Id::from(1), Name::from('jorge'));
//$p = new Post(Id::from(1), Entry::from('LoremIpsumDolor'), $u);

//$u = new User(Id::from(2), Name::from('albert'));

$p = (new Select($orm, Post::class))->fetchOne(['id' => '5d6f715f-335a-410c-bf6d-5be08433c350']);
dd($p->getComments());


$u = (new Select($orm, User::class))->fetchOne(['id' => 2]);
//
$c = new Comment(Id::from(3), CommentVO::from('Wehehehe'), $u);

$p->addComment($c);
dd(count($p->getComments()));


//$t = new Cycle\ORM\Transaction\UnitOfWork($orm);
////$t->persist($u);
//$t->persist($p);

//foreach($u->comments as $comment){
//    $t->persist($comment);
//}
$t->run();