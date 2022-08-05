<?php

require 'vendor/autoload.php';

use Alura\Doctrine\Helper\EntityManagerCreator;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;

$config = new PhpFile(__DIR__ . '/migrations.php'); // Or use one of the Doctrine\Migrations\Configuration\Configuration\* loaders

//Já temos um entityManager
//Todas as configurações que utilizamos pensando no doctrine 3 vão funcionar
$entityManager = EntityManagerCreator::createEntityManager();

//DependencyFactory = retorna uma fábrica de detalhes de dependência - tudo que o migration precisa - a partir de um entity manager
//Assim temos nosso componente de migrations conversando com o entity manager do orm
return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));