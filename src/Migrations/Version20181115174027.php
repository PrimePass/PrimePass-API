<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181115174027 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("CREATE TABLE media (
            id SERIAL PRIMARY KEY,
            movie_id INT REFERENCES movie(id),
            url VARCHAR(255) NOT NULL,
            type INT NOT NULL
        )");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE movie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE media_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE movie_info_id_seq CASCADE');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE movie_info');
    }
}
