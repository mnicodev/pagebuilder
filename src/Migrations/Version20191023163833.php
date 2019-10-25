<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191023163833 extends AbstractMigration
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
        $this->addSql('ALTER TABLE bloc DROP FOREIGN KEY FK_C778955A41B196DB');
        $this->addSql('DROP INDEX IDX_C778955A41B196DB ON bloc');
        $this->addSql('ALTER TABLE bloc ADD zone_id INT DEFAULT NULL, DROP id_zone_id, CHANGE param param VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE bloc ADD CONSTRAINT FK_C778955A9F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('CREATE INDEX IDX_C778955A9F2C3FAB ON bloc (zone_id)');
        $this->addSql('ALTER TABLE application CHANGE advert_id advert_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE zone CHANGE page_id page_id INT DEFAULT NULL, CHANGE position position INT DEFAULT NULL');
        $this->addSql('ALTER TABLE content CHANGE id_bloc_id id_bloc_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE application CHANGE advert_id advert_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bloc DROP FOREIGN KEY FK_C778955A9F2C3FAB');
        $this->addSql('DROP INDEX IDX_C778955A9F2C3FAB ON bloc');
        $this->addSql('ALTER TABLE bloc ADD id_zone_id INT DEFAULT NULL, DROP zone_id, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE bloc ADD CONSTRAINT FK_C778955A41B196DB FOREIGN KEY (id_zone_id) REFERENCES zone (id)');
        $this->addSql('CREATE INDEX IDX_C778955A41B196DB ON bloc (id_zone_id)');
        $this->addSql('ALTER TABLE content CHANGE id_bloc_id id_bloc_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE format_zone CHANGE actif actif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE page CHANGE name name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE zone CHANGE page_id page_id INT DEFAULT NULL, CHANGE position position INT DEFAULT NULL');
    }
}
