<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200305155917 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tbl_intervention ADD status_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tbl_intervention ADD CONSTRAINT FK_2F4B6E3D6BF700BD FOREIGN KEY (status_id) REFERENCES tbl_status (id)');
        $this->addSql('CREATE INDEX IDX_2F4B6E3D6BF700BD ON tbl_intervention (status_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tbl_intervention DROP FOREIGN KEY FK_2F4B6E3D6BF700BD');
        $this->addSql('DROP INDEX IDX_2F4B6E3D6BF700BD ON tbl_intervention');
        $this->addSql('ALTER TABLE tbl_intervention DROP status_id');
    }
}
