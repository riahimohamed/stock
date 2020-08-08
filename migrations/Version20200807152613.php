<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200807152613 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, location VARCHAR(50) NOT NULL, type VARCHAR(20) NOT NULL, priority VARCHAR(20) NOT NULL, no_command INT NOT NULL, type_delivery VARCHAR(50) NOT NULL, mode_pay VARCHAR(50) NOT NULL, qrcode VARCHAR(255) NOT NULL, percent_pay DOUBLE PRECISION NOT NULL, nb_pallet INT NOT NULL, date_command DATE NOT NULL, date_prepar DATE NOT NULL, date_pay DATE NOT NULL, date_submit DATE NOT NULL, comment_command LONGTEXT DEFAULT NULL, comment_delivery LONGTEXT DEFAULT NULL, total_weight DOUBLE PRECISION NOT NULL, total_amount DOUBLE PRECISION NOT NULL, total_price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, qrcode VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, ref VARCHAR(50) NOT NULL, ref_provider VARCHAR(50) NOT NULL, maker VARCHAR(50) NOT NULL, ref_maker VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, danger TINYINT(1) NOT NULL, price DOUBLE PRECISION NOT NULL, unit VARCHAR(20) NOT NULL, color VARCHAR(20) DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, size DOUBLE PRECISION DEFAULT NULL, created_at DATETIME NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_D34A04AD12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles TINYTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE user');
    }
}
