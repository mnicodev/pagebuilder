<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191023161541 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE advert (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, auteur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE application (id INT AUTO_INCREMENT NOT NULL, advert_id INT DEFAULT NULL, auteur VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_A45BDDC1D07ECCB6 (advert_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC1D07ECCB6 FOREIGN KEY (advert_id) REFERENCES advert (id)');
        $this->addSql('ALTER TABLE format_zone CHANGE actif actif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE page CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE bloc CHANGE id_zone_id id_zone_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE zone CHANGE page_id page_id INT DEFAULT NULL, CHANGE position position INT DEFAULT NULL');
        $this->addSql('ALTER TABLE content CHANGE id_bloc_id id_bloc_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC1D07ECCB6');
        $this->addSql('DROP TABLE advert');
        $this->addSql('DROP TABLE application');
        $this->addSql('ALTER TABLE bloc CHANGE id_zone_id id_zone_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE content CHANGE id_bloc_id id_bloc_id INT DEFAULT NULL, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE format_zone CHANGE actif actif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE page CHANGE name name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE param param VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE zone CHANGE page_id page_id INT DEFAULT NULL, CHANGE position position INT DEFAULT NULL');
    }
}
