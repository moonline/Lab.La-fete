<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190721015228 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__event AS SELECT id, public_id, title, description, organizer FROM event');
        $this->addSql('DROP TABLE event');
        $this->addSql('CREATE TABLE event (id VARCHAR(255) NOT NULL COLLATE BINARY, title VARCHAR(255) DEFAULT NULL COLLATE BINARY, description CLOB DEFAULT NULL COLLATE BINARY, organizer VARCHAR(255) DEFAULT NULL COLLATE BINARY, edit_key VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO event (id, edit_key, title, description, organizer) SELECT id, public_id, title, description, organizer FROM __temp__event');
        $this->addSql('DROP TABLE __temp__event');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__event AS SELECT id, edit_key, title, description, organizer FROM event');
        $this->addSql('DROP TABLE event');
        $this->addSql('CREATE TABLE event (id VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, description CLOB DEFAULT NULL, organizer VARCHAR(255) DEFAULT NULL, public_id VARCHAR(255) DEFAULT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO event (id, public_id, title, description, organizer) SELECT id, edit_key, title, description, organizer FROM __temp__event');
        $this->addSql('DROP TABLE __temp__event');
    }
}
