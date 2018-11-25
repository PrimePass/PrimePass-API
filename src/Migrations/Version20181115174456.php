<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181115174456 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql('CREATE TABLE address (
            id SERIAL PRIMARY KEY,
            name VARCHAR(150) NOT NULL,
            "number" INT NOT NULL DEFAULT 0,
            district VARCHAR(60) NOT NULL,
            zip_code VARCHAR(15) NOT NULL
        )');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP SEQUENCE movie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE address_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE media_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cinema_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE theater_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE movie_info_id_seq CASCADE');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE cinema');
        $this->addSql('DROP TABLE theater');
        $this->addSql('DROP TABLE movie_info');
    }
}
