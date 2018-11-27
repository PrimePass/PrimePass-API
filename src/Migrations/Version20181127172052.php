<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181127172052 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('
            CREATE SEQUENCE address_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        ');

        $this->addSql('
            CREATE SEQUENCE city_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        ');

        $this->addSql('
            CREATE SEQUENCE cinema_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        ');

        $this->addSql('
            CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        ');

        $this->addSql('
            CREATE SEQUENCE theater_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        ');

        $this->addSql('
            CREATE SEQUENCE theater_info_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        ');

        $this->addSql('CREATE TABLE address (
            id SERIAL PRIMARY KEY,
            name VARCHAR(255) NOT NULL, 
            number VARCHAR(255) NOT NULL, 
            district VARCHAR(255) NOT NULL, 
            zip_code VARCHAR(255) NOT NULL, 
            latitude DOUBLE PRECISION NOT NULL, 
            longitude DOUBLE PRECISION NOT NULL
        )');

        $this->addSql('CREATE TABLE city (
            id SERIAL PRIMARY KEY, 
            name VARCHAR(255) NOT NULL, 
            state VARCHAR(255) NOT NULL
        )');

        $this->addSql('CREATE TABLE cinema (
            id SERIAL PRIMARY KEY, 
            name VARCHAR(255) NOT NULL, 
            is_active BOOLEAN NOT NULL, 
            created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, 
            updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL
        )');

        $this->addSql('CREATE TABLE users (
            id SERIAL PRIMARY KEY, 
            username VARCHAR(25) NOT NULL, 
            password VARCHAR(500) NOT NULL, 
            is_active BOOLEAN NOT NULL,
        )');

        $this->addSql('
            CREATE UNIQUE INDEX UNIQ_1483A5E9F85E0677 ON users (username)
        ');

        $this->addSql('CREATE TABLE theater (
            id SERIAL PRIMARY KEY, 
            cinema_id INT NOT NULL, 
            booking_cinema VARCHAR(255) NOT NULL, 
            booking_id INT NOT NULL
        )');

        $this->addSql('
            CREATE INDEX IDX_46DD8154B4CB84B6 ON theater (cinema_id)
        ');

        $this->addSql('CREATE TABLE theater_info (
            id SERIAL PRIMARY KEY, 
            theater_id INT NOT NULL, 
            city_id INT NOT NULL, 
            address_id INT NOT NULL, 
            name VARCHAR(255) NOT NULL, 
            is_active BOOLEAN NOT NULL, 
            has_bombonieri BOOLEAN NOT NULL
        )');

        $this->addSql('
            CREATE UNIQUE INDEX UNIQ_2DA8B7F9D70E4479 ON theater_info (theater_id)
        ');

        $this->addSql('
            CREATE UNIQUE INDEX UNIQ_2DA8B7F98BAC62AF ON theater_info (city_id)
        ');

        $this->addSql('
            CREATE UNIQUE INDEX UNIQ_2DA8B7F9F5B7AF75 ON theater_info (address_id)
        ');

        $this->addSql('
            ALTER TABLE theater ADD CONSTRAINT FK_46DD8154B4CB84B6 FOREIGN KEY (cinema_id) REFERENCES cinema (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        ');

        $this->addSql('
            ALTER TABLE theater_info ADD CONSTRAINT FK_2DA8B7F9D70E4479 FOREIGN KEY (theater_id) REFERENCES theater (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        ');

        $this->addSql('
            ALTER TABLE theater_info ADD CONSTRAINT FK_2DA8B7F98BAC62AF FOREIGN KEY (city_id) REFERENCES city (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        ');

        $this->addSql('
            ALTER TABLE theater_info ADD CONSTRAINT FK_2DA8B7F9F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        ');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE theater_info DROP CONSTRAINT FK_2DA8B7F9F5B7AF75');
        $this->addSql('ALTER TABLE theater_info DROP CONSTRAINT FK_2DA8B7F98BAC62AF');
        $this->addSql('ALTER TABLE theater DROP CONSTRAINT FK_46DD8154B4CB84B6');
        $this->addSql('ALTER TABLE theater_info DROP CONSTRAINT FK_2DA8B7F9D70E4479');
        $this->addSql('DROP SEQUENCE address_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE city_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cinema_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE theater_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE theater_info_id_seq CASCADE');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE cinema');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE theater');
        $this->addSql('DROP TABLE theater_info');
    }
}
