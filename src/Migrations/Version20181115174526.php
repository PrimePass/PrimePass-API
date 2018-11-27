<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181115174526 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("CREATE TABLE city (
            id SERIAL PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            state VARCHAR(2) NOT NULL
        )");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP SEQUENCE address_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE city_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cinema_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE theater_id_seq CASCADE');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE cinema');
        $this->addSql('DROP TABLE theater');
    }
}
