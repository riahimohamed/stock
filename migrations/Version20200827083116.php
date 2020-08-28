<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200827083116 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adjust_stocks (id INT AUTO_INCREMENT NOT NULL, location_id INT DEFAULT NULL, raison VARCHAR(50) NOT NULL, notes LONGTEXT NOT NULL, type VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_86C252CC64D218E (location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adjust_stocks_product (adjust_stocks_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_5CC7B5BB31336D8 (adjust_stocks_id), INDEX IDX_5CC7B5BB4584665A (product_id), PRIMARY KEY(adjust_stocks_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adjust_stocks ADD CONSTRAINT FK_86C252CC64D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE adjust_stocks_product ADD CONSTRAINT FK_5CC7B5BB31336D8 FOREIGN KEY (adjust_stocks_id) REFERENCES adjust_stocks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adjust_stocks_product ADD CONSTRAINT FK_5CC7B5BB4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adjust_stocks_product DROP FOREIGN KEY FK_5CC7B5BB31336D8');
        $this->addSql('DROP TABLE adjust_stocks');
        $this->addSql('DROP TABLE adjust_stocks_product');
    }
}
