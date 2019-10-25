<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191023161003 extends AbstractMigration
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
        $this->addSql('ALTER TABLE bloc CHANGE id_zone_id id_zone_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE zone DROP FOREIGN KEY FK_A0EBC007D2DBCA94');
        $this->addSql('DROP INDEX IDX_A0EBC007D2DBCA94 ON zone');
        $this->addSql('ALTER TABLE zone ADD page_id INT DEFAULT NULL, DROP id_page_id, CHANGE position position INT DEFAULT NULL');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC007C4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('CREATE INDEX IDX_A0EBC007C4663E4 ON zone (page_id)');
        $this->addSql('ALTER TABLE content CHANGE id_bloc_id id_bloc_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bloc CHANGE id_zone_id id_zone_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE content CHANGE id_bloc_id id_bloc_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE format_zone CHANGE actif actif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE page CHANGE name name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE zone DROP FOREIGN KEY FK_A0EBC007C4663E4');
        $this->addSql('DROP INDEX IDX_A0EBC007C4663E4 ON zone');
        $this->addSql('ALTER TABLE zone ADD id_page_id INT DEFAULT NULL, DROP page_id, CHANGE position position INT DEFAULT NULL');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC007D2DBCA94 FOREIGN KEY (id_page_id) REFERENCES page (id)');
        $this->addSql('CREATE INDEX IDX_A0EBC007D2DBCA94 ON zone (id_page_id)');
    }
}
