<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220308152934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invoic (id INT AUTO_INCREMENT NOT NULL, invoice_date DATE NOT NULL, invoice_number INT NOT NULL, customer_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoic_lines (id INT AUTO_INCREMENT NOT NULL, invoic_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, quantity INT NOT NULL, amount DOUBLE PRECISION NOT NULL, vat_amount DOUBLE PRECISION NOT NULL, total_vat DOUBLE PRECISION NOT NULL, INDEX IDX_B500BA23810398B5 (invoic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invoic_lines ADD CONSTRAINT FK_B500BA23810398B5 FOREIGN KEY (invoic_id) REFERENCES invoic (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invoic_lines DROP FOREIGN KEY FK_B500BA23810398B5');
        $this->addSql('DROP TABLE invoic');
        $this->addSql('DROP TABLE invoic_lines');
    }
}
