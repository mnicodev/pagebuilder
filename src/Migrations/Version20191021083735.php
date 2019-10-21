<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191021083735 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE content_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE format_zone (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, actif INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bloc (id INT AUTO_INCREMENT NOT NULL, id_zone_id INT DEFAULT NULL, position VARCHAR(255) NOT NULL, param VARCHAR(255) DEFAULT NULL, INDEX IDX_C778955A41B196DB (id_zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, id_page_id INT DEFAULT NULL, id_format_zone VARCHAR(255) NOT NULL, param VARCHAR(255) NOT NULL, INDEX IDX_A0EBC007D2DBCA94 (id_page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content (id INT AUTO_INCREMENT NOT NULL, id_bloc_id INT DEFAULT NULL, data LONGTEXT DEFAULT NULL, param VARCHAR(255) DEFAULT NULL, INDEX IDX_FEC530A98B1F40B0 (id_bloc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bloc ADD CONSTRAINT FK_C778955A41B196DB FOREIGN KEY (id_zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC007D2DBCA94 FOREIGN KEY (id_page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A98B1F40B0 FOREIGN KEY (id_bloc_id) REFERENCES bloc (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A98B1F40B0');
        $this->addSql('ALTER TABLE bloc DROP FOREIGN KEY FK_C778955A41B196DB');
        $this->addSql('DROP TABLE content_type');
        $this->addSql('DROP TABLE format_zone');
        $this->addSql('DROP TABLE bloc');
        $this->addSql('DROP TABLE zone');
        $this->addSql('DROP TABLE content');
    }
}
