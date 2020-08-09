<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200809151428 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE command_client (id INT AUTO_INCREMENT NOT NULL, locale VARCHAR(255) NOT NULL, type VARCHAR(20) NOT NULL, priority VARCHAR(20) NOT NULL, nocmd VARCHAR(255) NOT NULL, type_delivery VARCHAR(255) NOT NULL, mode_pay VARCHAR(20) NOT NULL, percent_pay DOUBLE PRECISION NOT NULL, date_cmd DATE NOT NULL, date_preparation DATE NOT NULL, date_pay DATE NOT NULL, date_sumit DATE NOT NULL, comment_cmd LONGTEXT DEFAULT NULL, comment_delivery LONGTEXT DEFAULT NULL, total_weight DOUBLE PRECISION NOT NULL, total_amount DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, total_price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE command_client');
    }
}
