<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181115173747 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("CREATE TABLE movie_info (
            id SERIAL PRIMARY KEY,
            movie_id INT REFERENCES movie(id),
            name VARCHAR(100) NOT NULL,
            duration SMALLINT NOT NULL,
            description TEXT NOT NULL,
            category VARCHAR(100) NOT NULL,
            actor VARCHAR(255) NOT NULL,
            director VARCHAR(100) NOT NULL,
            recommended_age INT NOT NULL,
            rating NUMERIC NOT NULL DEFAULT 0.00,
            status INT NOT NULL DEFAULT 0,
            launch_date TIMESTAMP NOT NULL DEFAULT '2001-01-01 00:00:00'::TIMESTAMP WITHOUT TIME ZONE,
            created_at TIMESTAMP NOT NULL DEFAULT '2001-01-01 00:00:00'::TIMESTAMP WITHOUT TIME ZONE,
            updated_at TIMESTAMP NOT NULL DEFAULT '2001-01-01 00:00:00'::TIMESTAMP WITHOUT TIME ZONE
        )");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE movie_info DROP CONSTRAINT FK_38EF105A8F93B6FC');
        $this->addSql('DROP SEQUENCE movie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE movie_info_id_seq CASCADE');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE movie_info');
    }
}
