<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181115174127 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("CREATE TABLE cinema (
            id SERIAL PRIMARY KEY,
            name VARCHAR(150) NOT NULL,
            digital INT NOT NULL DEFAULT 0,
            priority INT NOT NULL DEFAULT 0,
            created_at TIMESTAMP NOT NULL DEFAULT '2001-01-01 00:00:00'::TIMESTAMP WITHOUT TIME ZONE,
            updated_at TIMESTAMP NOT NULL DEFAULT '2001-01-01 00:00:00'::TIMESTAMP WITHOUT TIME ZONE
        )");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP SEQUENCE movie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE media_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cinema_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE movie_info_id_seq CASCADE');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE cinema');
        $this->addSql('DROP TABLE movie_info');
    }
}
