<?php

declare(strict_types=1);

namespace Alura\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220805144058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Criação de uma tabela de testes';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //quando a migration é executa o Schema retorna nosso esquema do banco
        //Podemos definir migrations sem código sql, apenas com método que a classe retorna
        $table = $schema->createTable('teste');
        $table->addColumn('id', 'integer')->setAutoincrement(true);
        $table->addColumn('coluna_teste', 'string');
        $table->setPrimaryKey(['id']);

        //Também é possível adicionar o sql se quisermos:
        //$this->addSql('CREATE TABLE Teste')

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable('teste');
    }
}
