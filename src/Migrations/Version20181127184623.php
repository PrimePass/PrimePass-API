<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181127184623 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("CREATE TABLE movie_info(
            id SERIAL PRIMARY KEY, 
            movie_id INT REFERENCES movie(id), 
            name VARCHAR(100) NOT NULL, 
            duration VARCHAR(55) NOT NULL, 
            description TEXT NOT NULL, 
            category VARCHAR(35) NOT NULL, 
            actor VARCHAR(255) NOT NULL, 
            director VARCHAR(255) NOT NULL, 
            recommended_age VARCHAR(50) NOT NULL, 
            rating DOUBLE PRECISION NOT NULL, 
            status BOOLEAN NOT NULL DEFAULT 0, 
            launch_date VARCHAR(255) NOT NULL, 
            created_at TIMESTAMP NOT NULL, 
            updated_at TIMESTAMP NOT NULL
        )");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP SEQUENCE movie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE media_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE movie_info_id_seq CASCADE');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE movie_info');
    }
}
