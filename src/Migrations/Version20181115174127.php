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
            is_active BOOLEAN NOT NULL DEFAULT 0,
            created_at TIMESTAMP NOT NULL,
            updated_at TIMESTAMP NOT NULL
        )");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP SEQUENCE cinema_id_seq CASCADE');
        $this->addSql('DROP TABLE cinema');
    }
}
