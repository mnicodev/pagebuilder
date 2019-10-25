<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191023164121 extends AbstractMigration
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
        $this->addSql('ALTER TABLE bloc CHANGE zone_id zone_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE application CHANGE advert_id advert_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE zone CHANGE page_id page_id INT DEFAULT NULL, CHANGE position position INT DEFAULT NULL');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A98B1F40B0');
        $this->addSql('DROP INDEX IDX_FEC530A98B1F40B0 ON content');
        $this->addSql('ALTER TABLE content ADD bloc_id INT DEFAULT NULL, DROP id_bloc_id, CHANGE param param VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A95582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id)');
        $this->addSql('CREATE INDEX IDX_FEC530A95582E9C0 ON content (bloc_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE application CHANGE advert_id advert_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bloc CHANGE zone_id zone_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A95582E9C0');
        $this->addSql('DROP INDEX IDX_FEC530A95582E9C0 ON content');
        $this->addSql('ALTER TABLE content ADD id_bloc_id INT DEFAULT NULL, DROP bloc_id, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A98B1F40B0 FOREIGN KEY (id_bloc_id) REFERENCES bloc (id)');
        $this->addSql('CREATE INDEX IDX_FEC530A98B1F40B0 ON content (id_bloc_id)');
        $this->addSql('ALTER TABLE format_zone CHANGE actif actif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE page CHANGE name name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE zone CHANGE page_id page_id INT DEFAULT NULL, CHANGE position position INT DEFAULT NULL');
    }
}
