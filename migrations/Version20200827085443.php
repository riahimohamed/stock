<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200827085443 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adjust_stocks_product');
        $this->addSql('ALTER TABLE adjust_stocks ADD products_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adjust_stocks ADD CONSTRAINT FK_86C252CC6C8A81A9 FOREIGN KEY (products_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_86C252CC6C8A81A9 ON adjust_stocks (products_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adjust_stocks_product (adjust_stocks_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_5CC7B5BB31336D8 (adjust_stocks_id), INDEX IDX_5CC7B5BB4584665A (product_id), PRIMARY KEY(adjust_stocks_id, product_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE adjust_stocks_product ADD CONSTRAINT FK_5CC7B5BB31336D8 FOREIGN KEY (adjust_stocks_id) REFERENCES adjust_stocks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adjust_stocks_product ADD CONSTRAINT FK_5CC7B5BB4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adjust_stocks DROP FOREIGN KEY FK_86C252CC6C8A81A9');
        $this->addSql('DROP INDEX IDX_86C252CC6C8A81A9 ON adjust_stocks');
        $this->addSql('ALTER TABLE adjust_stocks DROP products_id');
    }
}
