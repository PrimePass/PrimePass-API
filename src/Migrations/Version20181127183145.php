<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20181127183145 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("CREATE TABLE movie (
            id SERIAL PRIMARY KEY, 
            velox_id VARCHAR(150) DEFAULT NULL, 
            ingresso_id INT DEFAULT NULL, 
            imdb_id VARCHAR(150) DEFAULT NULL, 
            status BOOLEAN NOT NULL
        )");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP SEQUENCE movie_id_seq CASCADE');
        $this->addSql('DROP TABLE movie');
    }
}
