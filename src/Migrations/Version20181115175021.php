<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181115175021 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("CREATE TABLE session (
            id SERIAL PRIMARY KEY,
            movie_id INT REFERENCES movie(id),
            theater_id INT REFERENCES theater(id),
            type VARCHAR(50) NOT NULL,
            type_screen VARCHAR(3) NOT NULL,
            room INT NOT NULL,
            type_room VARCHAR(50) NOT NULL,
            price MONEY NOT NULL DEFAULT 0.00,
            date_hour TIMESTAMP NOT NULL DEFAULT NOW(),
            created_at TIMESTAMP NOT NULL DEFAULT NOW(),
            updated_at TIMESTAMP NOT NULL DEFAULT NOW()
        )");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP SEQUENCE movie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE address_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE media_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE session_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE city_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cinema_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE theater_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE movie_info_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE theater_info_id_seq CASCADE');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE cinema');
        $this->addSql('DROP TABLE theater');
        $this->addSql('DROP TABLE movie_info');
        $this->addSql('DROP TABLE theater_info');
    }
}
