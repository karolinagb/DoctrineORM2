<?php

return [
    //Informações das tabelas de migrations
    'table_storage' => [
        'table_name' => 'doctrine_migration_versions',
        'version_column_name' => 'version',
        'version_column_length' => 1024,
        'executed_at_column_name' => 'executed_at',
        'execution_time_column_name' => 'execution_time',
    ],

    //Namespace => e onde vai salvar as migrations
    'migrations_paths' => [
        'Alura\\Doctrine\\Migrations' => __DIR__ . '/migrations'
    ],

    'all_or_nothing' => true,
    'transactional' => true,
    'check_database_platform' => true,
    'organize_migrations' => 'none',
    'connection' => null,
    'em' => null,
];