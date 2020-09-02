<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200831134615 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category CHANGE created_at created_at DATE NOT NULL');
        $this->addSql('ALTER TABLE command_client CHANGE created_at created_at DATE NOT NULL');
        $this->addSql('ALTER TABLE command_provider CHANGE created_at created_at DATE NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE command_client CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE command_provider CHANGE created_at created_at DATETIME NOT NULL');
    }
}
