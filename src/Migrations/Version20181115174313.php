<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181115174313 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("CREATE TABLE theater (
            id SERIAL PRIMARY KEY,
            cinema_id INT REFERENCES cinema(id),
            booking_cinema VARCHAR(100) NOT NULL,
            booking_id VARCHAR(100) NOT NULL
        )");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP SEQUENCE movie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE media_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cinema_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE theater_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE movie_info_id_seq CASCADE');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE cinema');
        $this->addSql('DROP TABLE theater');
        $this->addSql('DROP TABLE movie_info');
    }
}
