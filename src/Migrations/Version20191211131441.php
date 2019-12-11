<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191211131441 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE format_zone CHANGE actif actif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE page CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE content_data CHANGE type_id type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bloc CHANGE zone_id zone_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE application CHANGE advert_id advert_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE zone CHANGE page_id page_id INT DEFAULT NULL, CHANGE position position INT DEFAULT NULL');
        $this->addSql('ALTER TABLE content CHANGE bloc_id bloc_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE application CHANGE advert_id advert_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bloc CHANGE zone_id zone_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE content CHANGE bloc_id bloc_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE content_data CHANGE type_id type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE format_zone CHANGE actif actif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE page CHANGE name name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE zone CHANGE page_id page_id INT DEFAULT NULL, CHANGE position position INT DEFAULT NULL');
    }
}
