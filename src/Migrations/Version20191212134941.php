<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191212134941 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A95582E9C0');
        $this->addSql('ALTER TABLE bloc DROP FOREIGN KEY FK_C778955A9F2C3FAB');
        $this->addSql('DROP TABLE bloc');
        $this->addSql('DROP TABLE content');
        $this->addSql('DROP TABLE content_data');
        $this->addSql('DROP TABLE zone');
        $this->addSql('ALTER TABLE format_zone CHANGE actif actif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE application CHANGE advert_id advert_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE page CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bloc (id INT AUTO_INCREMENT NOT NULL, zone_id INT DEFAULT NULL, position VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, INDEX IDX_C778955A9F2C3FAB (zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE content (id INT AUTO_INCREMENT NOT NULL, bloc_id INT DEFAULT NULL, data LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, position INT NOT NULL, INDEX IDX_FEC530A95582E9C0 (bloc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE content_data (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, value LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, date_create DATETIME NOT NULL, date_update DATETIME NOT NULL, INDEX IDX_60911EA6C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, page_id INT DEFAULT NULL, id_format_zone VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, param VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, position INT DEFAULT NULL, INDEX IDX_A0EBC007C4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bloc ADD CONSTRAINT FK_C778955A9F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A95582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id)');
        $this->addSql('ALTER TABLE content_data ADD CONSTRAINT FK_60911EA6C54C8C93 FOREIGN KEY (type_id) REFERENCES content_type (id)');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC007C4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE application CHANGE advert_id advert_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE format_zone CHANGE actif actif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE page CHANGE name name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
