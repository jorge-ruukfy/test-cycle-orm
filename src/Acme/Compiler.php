<?php

namespace Acme;

use Cycle\Annotated\Embeddings;
use Cycle\Annotated\Entities;
use Cycle\Annotated\MergeColumns;
use Cycle\Annotated\MergeIndexes;
use Cycle\Schema\Compiler as CycleCompiler;
use Cycle\Schema\Generator\GenerateRelations;
use Cycle\Schema\Generator\GenerateTypecast;
use Cycle\Schema\Generator\RenderRelations;
use Cycle\Schema\Generator\RenderTables;
use Cycle\Schema\Generator\ResetTables;
use Cycle\Schema\Generator\ValidateEntities;
use Cycle\Schema\Registry;
use Spiral\Tokenizer\ClassLocator;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

class Compiler
{
    public static function compile($dbal, $output = null): array
    {
        $registry = new Registry($dbal);
        $finder = (new Finder())->files()->in(['src/Acme/Entity']); // __DIR__ here is folder with entities
        $classLocator = new ClassLocator($finder);
        $cmp = new CycleCompiler();
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
            //new SyncTables(),        // sync table changes to database
            new GenerateTypecast(),  // typecast non string columns
        ]);

        $schema = $cmp->getSchema();

        if ($output) {
            file_put_contents($output, Yaml::dump($schema,3));
        }

        return $schema;
    }
}