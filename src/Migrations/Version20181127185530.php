<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181127185530 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("CREATE TABLE session (
            id SERIAL PRIMARY KEY, 
            movie_id INT REFERENCES movie(id), 
            type VARCHAR(20) NOT NULL, 
            screen VARCHAR(10) NOT NULL, 
            room VARCHAR(15) NOT NULL, 
            price DOUBLE PRECISION NOT NULL, 
            status BOOLEAN NOT NULL DEFAULT 0,
            hour TIMESTAMP NOT NULL,  
            created_at TIMESTAMP NOT NULL, 
            updated_at TIMESTAMP NOT NULL
        )");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP SEQUENCE movie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE media_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE session_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE movie_info_id_seq CASCADE');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE movie_info');
    }
}
