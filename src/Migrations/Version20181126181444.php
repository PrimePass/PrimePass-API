<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181126181444 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, username VARCHAR(25) NOT NULL, password VARCHAR(500) NOT NULL, is_active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9F85E0677 ON users (username)');
        $this->addSql('ALTER TABLE movie DROP created_at');
        $this->addSql('ALTER TABLE movie DROP updated_at');
        $this->addSql('ALTER TABLE movie ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE movie ALTER velox_id SET NOT NULL');
        $this->addSql('ALTER TABLE movie ALTER velox_id TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE movie ALTER ingresso_db SET NOT NULL');
        $this->addSql('ALTER TABLE movie ALTER imdb_id SET NOT NULL');
        $this->addSql('ALTER TABLE movie ALTER imdb_id TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE movie ALTER status TYPE INT');
        $this->addSql('ALTER TABLE movie ALTER status DROP DEFAULT');
        $this->addSql('ALTER TABLE address ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE address ALTER name TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE address ALTER district TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE address ALTER zip_code TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE media ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE media ALTER movie_id SET NOT NULL');
        $this->addSql('ALTER TABLE session ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE session ALTER movie_id SET NOT NULL');
        $this->addSql('ALTER TABLE session ALTER theater_id SET NOT NULL');
        $this->addSql('ALTER TABLE session ALTER type TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE session ALTER type_screen TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE session ALTER room TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE session ALTER room DROP DEFAULT');
        $this->addSql('ALTER TABLE session ALTER type_room TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE session ALTER price TYPE NUMERIC(10, 0)');
        $this->addSql('ALTER TABLE session ALTER price DROP DEFAULT');
        $this->addSql('ALTER TABLE session ALTER date_hour DROP DEFAULT');
        $this->addSql('ALTER TABLE session ALTER created_at DROP DEFAULT');
        $this->addSql('ALTER TABLE session ALTER updated_at DROP DEFAULT');
        $this->addSql('ALTER TABLE city ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE city ALTER name TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE city ALTER state TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE cinema ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE cinema ALTER name TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE cinema ALTER is_active DROP DEFAULT');
        $this->addSql('ALTER TABLE cinema ALTER created_at DROP DEFAULT');
        $this->addSql('ALTER TABLE cinema ALTER updated_at DROP DEFAULT');
        $this->addSql('ALTER TABLE theater ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE theater ALTER cinema_id SET NOT NULL');
        $this->addSql('ALTER TABLE theater ALTER booking_cinema TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE theater ALTER booking_id TYPE INT USING (booking_id::INT)');
        $this->addSql('ALTER TABLE theater ALTER booking_id DROP DEFAULT');
        $this->addSql('ALTER TABLE theater ALTER booking_id TYPE INT USING (booking_id::INT)');
        //$this->addSql('DROP INDEX IDX_38EF105A8F93B6FC');
        $this->addSql('ALTER TABLE movie_info ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE movie_info ALTER movie_id SET NOT NULL');
        $this->addSql('ALTER TABLE movie_info ALTER name TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE movie_info ALTER duration TYPE INT');
        $this->addSql('ALTER TABLE movie_info ALTER duration DROP DEFAULT');
        $this->addSql('ALTER TABLE movie_info ALTER category TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE movie_info ALTER director TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE movie_info ALTER rating TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE movie_info ALTER rating DROP DEFAULT');
        $this->addSql('ALTER TABLE movie_info ALTER status TYPE INT');
        $this->addSql('ALTER TABLE movie_info ALTER status DROP DEFAULT');
        $this->addSql('ALTER TABLE movie_info ALTER launch_date DROP DEFAULT');
        $this->addSql('ALTER TABLE movie_info ALTER created_at DROP DEFAULT');
        $this->addSql('ALTER TABLE movie_info ALTER updated_at DROP DEFAULT');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_38EF105A8F93B6FC ON movie_info (movie_id)');
        //$this->addSql('DROP INDEX IDX_2DA8B7F9D70E4479');
        //$this->addSql('DROP INDEX IDX_2DA8B7F98BAC62AF');
        //$this->addSql('DROP INDEX IDX_2DA8B7F9F5B7AF75');
        $this->addSql('ALTER TABLE theater_info ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE theater_info ALTER theater_id SET NOT NULL');
        $this->addSql('ALTER TABLE theater_info ALTER city_id SET NOT NULL');
        $this->addSql('ALTER TABLE theater_info ALTER address_id SET NOT NULL');
        $this->addSql('ALTER TABLE theater_info ALTER is_active TYPE INT');
        $this->addSql('ALTER TABLE theater_info ALTER is_active DROP DEFAULT');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2DA8B7F9D70E4479 ON theater_info (theater_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2DA8B7F98BAC62AF ON theater_info (city_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2DA8B7F9F5B7AF75 ON theater_info (address_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE movie ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT \'now()\' NOT NULL');
        $this->addSql('ALTER TABLE movie ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT \'now()\' NOT NULL');
        $this->addSql('CREATE SEQUENCE movie_id_seq');
        $this->addSql('SELECT setval(\'movie_id_seq\', (SELECT MAX(id) FROM movie))');
        $this->addSql('ALTER TABLE movie ALTER id SET DEFAULT nextval(\'movie_id_seq\')');
        $this->addSql('ALTER TABLE movie ALTER velox_id DROP NOT NULL');
        $this->addSql('ALTER TABLE movie ALTER velox_id TYPE VARCHAR(10)');
        $this->addSql('ALTER TABLE movie ALTER ingresso_db DROP NOT NULL');
        $this->addSql('ALTER TABLE movie ALTER imdb_id DROP NOT NULL');
        $this->addSql('ALTER TABLE movie ALTER imdb_id TYPE VARCHAR(20)');
        $this->addSql('ALTER TABLE movie ALTER status TYPE INT');
        $this->addSql('ALTER TABLE movie ALTER status SET DEFAULT 0');
        $this->addSql('DROP INDEX UNIQ_38EF105A8F93B6FC');
        $this->addSql('CREATE SEQUENCE movie_info_id_seq');
        $this->addSql('SELECT setval(\'movie_info_id_seq\', (SELECT MAX(id) FROM movie_info))');
        $this->addSql('ALTER TABLE movie_info ALTER id SET DEFAULT nextval(\'movie_info_id_seq\')');
        $this->addSql('ALTER TABLE movie_info ALTER movie_id DROP NOT NULL');
        $this->addSql('ALTER TABLE movie_info ALTER name TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE movie_info ALTER duration TYPE SMALLINT');
        $this->addSql('ALTER TABLE movie_info ALTER duration DROP DEFAULT');
        $this->addSql('ALTER TABLE movie_info ALTER category TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE movie_info ALTER director TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE movie_info ALTER rating TYPE NUMERIC(10, 0)');
        $this->addSql('ALTER TABLE movie_info ALTER rating SET DEFAULT \'0.00\'');
        $this->addSql('ALTER TABLE movie_info ALTER status TYPE INT');
        $this->addSql('ALTER TABLE movie_info ALTER status SET DEFAULT 0');
        $this->addSql('ALTER TABLE movie_info ALTER launch_date SET DEFAULT \'now()\'');
        $this->addSql('ALTER TABLE movie_info ALTER created_at SET DEFAULT \'now()\'');
        $this->addSql('ALTER TABLE movie_info ALTER updated_at SET DEFAULT \'now()\'');
        $this->addSql('CREATE INDEX IDX_38EF105A8F93B6FC ON movie_info (movie_id)');
        $this->addSql('CREATE SEQUENCE media_id_seq');
        $this->addSql('SELECT setval(\'media_id_seq\', (SELECT MAX(id) FROM media))');
        $this->addSql('ALTER TABLE media ALTER id SET DEFAULT nextval(\'media_id_seq\')');
        $this->addSql('ALTER TABLE media ALTER movie_id DROP NOT NULL');
        $this->addSql('CREATE SEQUENCE cinema_id_seq');
        $this->addSql('SELECT setval(\'cinema_id_seq\', (SELECT MAX(id) FROM cinema))');
        $this->addSql('ALTER TABLE cinema ALTER id SET DEFAULT nextval(\'cinema_id_seq\')');
        $this->addSql('ALTER TABLE cinema ALTER name TYPE VARCHAR(150)');
        $this->addSql('ALTER TABLE cinema ALTER is_active SET DEFAULT 0');
        $this->addSql('ALTER TABLE cinema ALTER created_at SET DEFAULT \'now()\'');
        $this->addSql('ALTER TABLE cinema ALTER updated_at SET DEFAULT \'now()\'');
        $this->addSql('CREATE SEQUENCE theater_id_seq');
        $this->addSql('SELECT setval(\'theater_id_seq\', (SELECT MAX(id) FROM theater))');
        $this->addSql('ALTER TABLE theater ALTER id SET DEFAULT nextval(\'theater_id_seq\')');
        $this->addSql('ALTER TABLE theater ALTER cinema_id DROP NOT NULL');
        $this->addSql('ALTER TABLE theater ALTER booking_cinema TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE theater ALTER booking_id TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE theater ALTER booking_id DROP DEFAULT');
        $this->addSql('DROP INDEX UNIQ_2DA8B7F9D70E4479');
        $this->addSql('DROP INDEX UNIQ_2DA8B7F98BAC62AF');
        $this->addSql('DROP INDEX UNIQ_2DA8B7F9F5B7AF75');
        $this->addSql('CREATE SEQUENCE theater_info_id_seq');
        $this->addSql('SELECT setval(\'theater_info_id_seq\', (SELECT MAX(id) FROM theater_info))');
        $this->addSql('ALTER TABLE theater_info ALTER id SET DEFAULT nextval(\'theater_info_id_seq\')');
        $this->addSql('ALTER TABLE theater_info ALTER theater_id DROP NOT NULL');
        $this->addSql('ALTER TABLE theater_info ALTER city_id DROP NOT NULL');
        $this->addSql('ALTER TABLE theater_info ALTER address_id DROP NOT NULL');
        $this->addSql('ALTER TABLE theater_info ALTER is_active TYPE INT');
        $this->addSql('ALTER TABLE theater_info ALTER is_active SET DEFAULT 0');
        $this->addSql('CREATE INDEX IDX_2DA8B7F9D70E4479 ON theater_info (theater_id)');
        $this->addSql('CREATE INDEX IDX_2DA8B7F98BAC62AF ON theater_info (city_id)');
        $this->addSql('CREATE INDEX IDX_2DA8B7F9F5B7AF75 ON theater_info (address_id)');
        $this->addSql('CREATE SEQUENCE city_id_seq');
        $this->addSql('SELECT setval(\'city_id_seq\', (SELECT MAX(id) FROM city))');
        $this->addSql('ALTER TABLE city ALTER id SET DEFAULT nextval(\'city_id_seq\')');
        $this->addSql('ALTER TABLE city ALTER name TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE city ALTER state TYPE VARCHAR(2)');
        $this->addSql('CREATE SEQUENCE address_id_seq');
        $this->addSql('SELECT setval(\'address_id_seq\', (SELECT MAX(id) FROM address))');
        $this->addSql('ALTER TABLE address ALTER id SET DEFAULT nextval(\'address_id_seq\')');
        $this->addSql('ALTER TABLE address ALTER name TYPE VARCHAR(150)');
        $this->addSql('ALTER TABLE address ALTER district TYPE VARCHAR(60)');
        $this->addSql('ALTER TABLE address ALTER zip_code TYPE VARCHAR(15)');
        $this->addSql('CREATE SEQUENCE session_id_seq');
        $this->addSql('SELECT setval(\'session_id_seq\', (SELECT MAX(id) FROM session))');
        $this->addSql('ALTER TABLE session ALTER id SET DEFAULT nextval(\'session_id_seq\')');
        $this->addSql('ALTER TABLE session ALTER movie_id DROP NOT NULL');
        $this->addSql('ALTER TABLE session ALTER theater_id DROP NOT NULL');
        $this->addSql('ALTER TABLE session ALTER type TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE session ALTER type_screen TYPE VARCHAR(3)');
        $this->addSql('ALTER TABLE session ALTER room TYPE INT');
        $this->addSql('ALTER TABLE session ALTER room DROP DEFAULT');
        $this->addSql('ALTER TABLE session ALTER type_room TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE session ALTER price TYPE NUMERIC(10, 0)');
        $this->addSql('ALTER TABLE session ALTER price SET DEFAULT \'0.00\'');
        $this->addSql('ALTER TABLE session ALTER date_hour SET DEFAULT \'now()\'');
        $this->addSql('ALTER TABLE session ALTER created_at SET DEFAULT \'now()\'');
        $this->addSql('ALTER TABLE session ALTER updated_at SET DEFAULT \'now()\'');
    }
}
