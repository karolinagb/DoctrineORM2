<?php

namespace Alura\Doctrine\Helper;

use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__ . "/.."],
            true
        );

        //Middleware é um intermediário, quando estamos fazendo um processo, ele intercepta e faz outra coisa no meio do caminho
            //setMiddlewares aceita um array de objetos que implemente uma interface de middleware
            //Vamos adicionar um midleware para fazer um log da query que vai ser executada
            //O doctrine já fornece a classe Middleware do namespace de Logging
        $config->setMiddlewares([
            //Recebe como parãmetro um objeto que implemente uma interface de Logger
                //O doctrine já fornece um log que é o ConsoleLogger
            new Middleware(
                //A saída no console pode ser formata de vários jeitos então preciso passar como parâmetro um output
                //o doctrine fornece o ConsoleOutput
                //Para mostrar o sql temos que informar que queremos o maior número de informações possível com VERBOSITY_DEBUG
                new ConsoleLogger(new ConsoleOutput(ConsoleOutput::VERBOSITY_DEBUG)))
        ]);

        $conn = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite',
        ];

        return EntityManager::create($conn, $config);
    }
}