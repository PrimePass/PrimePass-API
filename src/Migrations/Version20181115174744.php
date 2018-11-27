<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181115174744 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("CREATE TABLE theater_info (
            id SERIAL PRIMARY KEY,
            theater_id INT REFERENCES theater(id),
            city_id INT REFERENCES city(id),
            address_id INT REFERENCES address(id),
            name VARCHAR(255) NOT NULL,
            is_active BOOLEAN NOT NULL DEFAULT 0,
            has_bombonieri BOOLEAN NOT NULL DEFAULT 0
        )");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP SEQUENCE address_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE city_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cinema_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE theater_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE theater_info_id_seq CASCADE');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE cinema');
        $this->addSql('DROP TABLE theater');
        $this->addSql('DROP TABLE theater_info');
    }
}
