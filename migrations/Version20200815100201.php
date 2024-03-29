<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200815100201 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE command_client_product (command_client_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_64BBB8819EDA262A (command_client_id), INDEX IDX_64BBB8814584665A (product_id), PRIMARY KEY(command_client_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE command_client_product ADD CONSTRAINT FK_64BBB8819EDA262A FOREIGN KEY (command_client_id) REFERENCES command_client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE command_client_product ADD CONSTRAINT FK_64BBB8814584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE command_client_product');
    }
}
