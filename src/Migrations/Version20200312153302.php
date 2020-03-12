<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200312153302 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tbl_client (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, celphone INT NOT NULL, fixe INT DEFAULT NULL, address VARCHAR(255) NOT NULL, mail VARCHAR(255) DEFAULT NULL, professional TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_equipment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_equipmentincomplete (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment_incomplete_intervention (equipment_incomplete_id INT NOT NULL, intervention_id INT NOT NULL, INDEX IDX_982DC401424771C3 (equipment_incomplete_id), INDEX IDX_982DC4018EAE3863 (intervention_id), PRIMARY KEY(equipment_incomplete_id, intervention_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_intervention (id INT AUTO_INCREMENT NOT NULL, os_id INT NOT NULL, equipment_id INT NOT NULL, client_id INT NOT NULL, status_id INT DEFAULT NULL, date_depot DATETIME NOT NULL, date_restitution DATETIME NOT NULL, session_user VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, observation VARCHAR(255) DEFAULT NULL, INDEX IDX_2F4B6E3D3DCA04D1 (os_id), INDEX IDX_2F4B6E3D517FE9FE (equipment_id), INDEX IDX_2F4B6E3D19EB6921 (client_id), INDEX IDX_2F4B6E3D6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_observation (id INT AUTO_INCREMENT NOT NULL, intervention_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, object VARCHAR(255) NOT NULL, paragraph LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_42173B788EAE3863 (intervention_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_os (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_technician (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, nb_intervention INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technician_intervention (technician_id INT NOT NULL, intervention_id INT NOT NULL, INDEX IDX_CBD93B74E6C5D496 (technician_id), INDEX IDX_CBD93B748EAE3863 (intervention_id), PRIMARY KEY(technician_id, intervention_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_TypeIntervention (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_intervention_intervention (type_intervention_id INT NOT NULL, intervention_id INT NOT NULL, INDEX IDX_1CE3DF39799AAC17 (type_intervention_id), INDEX IDX_1CE3DF398EAE3863 (intervention_id), PRIMARY KEY(type_intervention_id, intervention_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipment_incomplete_intervention ADD CONSTRAINT FK_982DC401424771C3 FOREIGN KEY (equipment_incomplete_id) REFERENCES tbl_equipmentincomplete (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipment_incomplete_intervention ADD CONSTRAINT FK_982DC4018EAE3863 FOREIGN KEY (intervention_id) REFERENCES tbl_intervention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tbl_intervention ADD CONSTRAINT FK_2F4B6E3D3DCA04D1 FOREIGN KEY (os_id) REFERENCES tbl_os (id)');
        $this->addSql('ALTER TABLE tbl_intervention ADD CONSTRAINT FK_2F4B6E3D517FE9FE FOREIGN KEY (equipment_id) REFERENCES tbl_equipment (id)');
        $this->addSql('ALTER TABLE tbl_intervention ADD CONSTRAINT FK_2F4B6E3D19EB6921 FOREIGN KEY (client_id) REFERENCES tbl_client (id)');
        $this->addSql('ALTER TABLE tbl_intervention ADD CONSTRAINT FK_2F4B6E3D6BF700BD FOREIGN KEY (status_id) REFERENCES tbl_status (id)');
        $this->addSql('ALTER TABLE tbl_observation ADD CONSTRAINT FK_42173B788EAE3863 FOREIGN KEY (intervention_id) REFERENCES tbl_intervention (id)');
        $this->addSql('ALTER TABLE technician_intervention ADD CONSTRAINT FK_CBD93B74E6C5D496 FOREIGN KEY (technician_id) REFERENCES tbl_technician (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE technician_intervention ADD CONSTRAINT FK_CBD93B748EAE3863 FOREIGN KEY (intervention_id) REFERENCES tbl_intervention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_intervention_intervention ADD CONSTRAINT FK_1CE3DF39799AAC17 FOREIGN KEY (type_intervention_id) REFERENCES tbl_TypeIntervention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_intervention_intervention ADD CONSTRAINT FK_1CE3DF398EAE3863 FOREIGN KEY (intervention_id) REFERENCES tbl_intervention (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tbl_intervention DROP FOREIGN KEY FK_2F4B6E3D19EB6921');
        $this->addSql('ALTER TABLE tbl_intervention DROP FOREIGN KEY FK_2F4B6E3D517FE9FE');
        $this->addSql('ALTER TABLE equipment_incomplete_intervention DROP FOREIGN KEY FK_982DC401424771C3');
        $this->addSql('ALTER TABLE equipment_incomplete_intervention DROP FOREIGN KEY FK_982DC4018EAE3863');
        $this->addSql('ALTER TABLE tbl_observation DROP FOREIGN KEY FK_42173B788EAE3863');
        $this->addSql('ALTER TABLE technician_intervention DROP FOREIGN KEY FK_CBD93B748EAE3863');
        $this->addSql('ALTER TABLE type_intervention_intervention DROP FOREIGN KEY FK_1CE3DF398EAE3863');
        $this->addSql('ALTER TABLE tbl_intervention DROP FOREIGN KEY FK_2F4B6E3D3DCA04D1');
        $this->addSql('ALTER TABLE tbl_intervention DROP FOREIGN KEY FK_2F4B6E3D6BF700BD');
        $this->addSql('ALTER TABLE technician_intervention DROP FOREIGN KEY FK_CBD93B74E6C5D496');
        $this->addSql('ALTER TABLE type_intervention_intervention DROP FOREIGN KEY FK_1CE3DF39799AAC17');
        $this->addSql('DROP TABLE tbl_client');
        $this->addSql('DROP TABLE tbl_equipment');
        $this->addSql('DROP TABLE tbl_equipmentincomplete');
        $this->addSql('DROP TABLE equipment_incomplete_intervention');
        $this->addSql('DROP TABLE tbl_intervention');
        $this->addSql('DROP TABLE tbl_observation');
        $this->addSql('DROP TABLE tbl_os');
        $this->addSql('DROP TABLE tbl_status');
        $this->addSql('DROP TABLE tbl_technician');
        $this->addSql('DROP TABLE technician_intervention');
        $this->addSql('DROP TABLE tbl_TypeIntervention');
        $this->addSql('DROP TABLE type_intervention_intervention');
    }
}
