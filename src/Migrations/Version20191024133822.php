<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191024133822 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE content_data (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, value LONGTEXT NOT NULL, date_create DATETIME NOT NULL, date_update DATETIME NOT NULL, INDEX IDX_60911EA6C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE content_data ADD CONSTRAINT FK_60911EA6C54C8C93 FOREIGN KEY (type_id) REFERENCES content_type (id)');
        $this->addSql('ALTER TABLE format_zone CHANGE actif actif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE page CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE bloc CHANGE zone_id zone_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE application CHANGE advert_id advert_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE zone CHANGE page_id page_id INT DEFAULT NULL, CHANGE position position INT DEFAULT NULL');
        $this->addSql('ALTER TABLE content CHANGE bloc_id bloc_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE content_data');
        $this->addSql('ALTER TABLE application CHANGE advert_id advert_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bloc CHANGE zone_id zone_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE content CHANGE bloc_id bloc_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE format_zone CHANGE actif actif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE page CHANGE name name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE zone CHANGE page_id page_id INT DEFAULT NULL, CHANGE position position INT DEFAULT NULL');
    }
}
