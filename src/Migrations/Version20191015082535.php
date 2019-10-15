<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191015082535 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, id_page_id INT DEFAULT NULL, id_format_zone VARCHAR(255) NOT NULL, options VARCHAR(255) NOT NULL, INDEX IDX_A0EBC007D2DBCA94 (id_page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content (id INT AUTO_INCREMENT NOT NULL, id_type_content_id INT DEFAULT NULL, id_zone_id INT DEFAULT NULL, bundle VARCHAR(255) NOT NULL, value LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_FEC530A970FDB640 (id_type_content_id), INDEX IDX_FEC530A941B196DB (id_zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, id_site INT NOT NULL, date_create DATETIME NOT NULL, date_update DATETIME NOT NULL, status INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC007D2DBCA94 FOREIGN KEY (id_page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A970FDB640 FOREIGN KEY (id_type_content_id) REFERENCES content_type (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A941B196DB FOREIGN KEY (id_zone_id) REFERENCES zone (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A941B196DB');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A970FDB640');
        $this->addSql('ALTER TABLE zone DROP FOREIGN KEY FK_A0EBC007D2DBCA94');
        $this->addSql('DROP TABLE zone');
        $this->addSql('DROP TABLE content');
        $this->addSql('DROP TABLE content_type');
        $this->addSql('DROP TABLE page');
    }
}
