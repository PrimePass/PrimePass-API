<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181115173450 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("CREATE TABLE movie (
            id SERIAL PRIMARY KEY,
            velox_id VARCHAR(10) DEFAULT NULL,
            ingresso_db INT DEFAULT NULL,
            imdb_id VARCHAR(20) DEFAULT NULL,
            status BOOLEAN NOT NULL DEFAULT 0,
            created_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00'::TIMESTAMP WITHOUT TIME ZONE,
            updated_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00'::TIMESTAMP WITHOUT TIME ZONE
        )");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE movie_id_seq CASCADE');
        $this->addSql('DROP TABLE movie');
    }
}
