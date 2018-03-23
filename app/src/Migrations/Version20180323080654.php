<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180323080654 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE jsondata_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE jsondata (id INT NOT NULL, data JSON NOT NULL, created_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT \'NOW\' NOT NULL, download_amount INT DEFAULT 0 NOT NULL, url VARCHAR(100) NOT NULL, deleted BOOLEAN DEFAULT \'false\' NOT NULL, delete_after_first_access BOOLEAN DEFAULT \'false\' NOT NULL, type VARCHAR(255) NOT NULL, password VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE jsondata_id_seq CASCADE');
        $this->addSql('DROP TABLE jsondata');
    }
}