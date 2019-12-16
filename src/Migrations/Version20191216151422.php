<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191216151422 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, page_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, param LONGTEXT NOT NULL, container VARCHAR(255) DEFAULT NULL, INDEX IDX_8F87BF96C4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96C4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('DROP TABLE classes');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE classes (id INT AUTO_INCREMENT NOT NULL, page_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, param LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_2ED7EC5C4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC5C4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('DROP TABLE classe');
    }
}
