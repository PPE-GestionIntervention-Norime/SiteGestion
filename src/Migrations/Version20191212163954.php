<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191212163954 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tbl_client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, portable INT NOT NULL, fixe INT DEFAULT NULL, adresse VARCHAR(255) NOT NULL, mail VARCHAR(255) DEFAULT NULL, professional TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_equipment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_equipmentincomplete (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment_incomplete_intervention (equipment_incomplete_id INT NOT NULL, intervention_id INT NOT NULL, INDEX IDX_982DC401424771C3 (equipment_incomplete_id), INDEX IDX_982DC4018EAE3863 (intervention_id), PRIMARY KEY(equipment_incomplete_id, intervention_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, os_id INT NOT NULL, equipment_id INT NOT NULL, client_id INT NOT NULL, date_depot DATETIME NOT NULL, date_restitution DATETIME NOT NULL, session_user VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, INDEX IDX_D11814AB3DCA04D1 (os_id), INDEX IDX_D11814AB517FE9FE (equipment_id), INDEX IDX_D11814AB19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_interventiontype (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention_type_intervention (intervention_type_id INT NOT NULL, intervention_id INT NOT NULL, INDEX IDX_1C8CE5938EA2F8F6 (intervention_type_id), INDEX IDX_1C8CE5938EAE3863 (intervention_id), PRIMARY KEY(intervention_type_id, intervention_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_observation (id INT AUTO_INCREMENT NOT NULL, intervention_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, object VARCHAR(255) NOT NULL, paragraph LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_42173B788EAE3863 (intervention_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_os (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_technician (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, nb_intervention INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technician_intervention (technician_id INT NOT NULL, intervention_id INT NOT NULL, INDEX IDX_CBD93B74E6C5D496 (technician_id), INDEX IDX_CBD93B748EAE3863 (intervention_id), PRIMARY KEY(technician_id, intervention_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipment_incomplete_intervention ADD CONSTRAINT FK_982DC401424771C3 FOREIGN KEY (equipment_incomplete_id) REFERENCES tbl_equipmentincomplete (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipment_incomplete_intervention ADD CONSTRAINT FK_982DC4018EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB3DCA04D1 FOREIGN KEY (os_id) REFERENCES tbl_os (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB517FE9FE FOREIGN KEY (equipment_id) REFERENCES tbl_equipment (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB19EB6921 FOREIGN KEY (client_id) REFERENCES tbl_client (id)');
        $this->addSql('ALTER TABLE intervention_type_intervention ADD CONSTRAINT FK_1C8CE5938EA2F8F6 FOREIGN KEY (intervention_type_id) REFERENCES tbl_interventiontype (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE intervention_type_intervention ADD CONSTRAINT FK_1C8CE5938EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tbl_observation ADD CONSTRAINT FK_42173B788EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id)');
        $this->addSql('ALTER TABLE technician_intervention ADD CONSTRAINT FK_CBD93B74E6C5D496 FOREIGN KEY (technician_id) REFERENCES tbl_technician (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE technician_intervention ADD CONSTRAINT FK_CBD93B748EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB19EB6921');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB517FE9FE');
        $this->addSql('ALTER TABLE equipment_incomplete_intervention DROP FOREIGN KEY FK_982DC401424771C3');
        $this->addSql('ALTER TABLE equipment_incomplete_intervention DROP FOREIGN KEY FK_982DC4018EAE3863');
        $this->addSql('ALTER TABLE intervention_type_intervention DROP FOREIGN KEY FK_1C8CE5938EAE3863');
        $this->addSql('ALTER TABLE tbl_observation DROP FOREIGN KEY FK_42173B788EAE3863');
        $this->addSql('ALTER TABLE technician_intervention DROP FOREIGN KEY FK_CBD93B748EAE3863');
        $this->addSql('ALTER TABLE intervention_type_intervention DROP FOREIGN KEY FK_1C8CE5938EA2F8F6');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB3DCA04D1');
        $this->addSql('ALTER TABLE technician_intervention DROP FOREIGN KEY FK_CBD93B74E6C5D496');
        $this->addSql('DROP TABLE tbl_client');
        $this->addSql('DROP TABLE tbl_equipment');
        $this->addSql('DROP TABLE tbl_equipmentincomplete');
        $this->addSql('DROP TABLE equipment_incomplete_intervention');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE tbl_interventiontype');
        $this->addSql('DROP TABLE intervention_type_intervention');
        $this->addSql('DROP TABLE tbl_observation');
        $this->addSql('DROP TABLE tbl_os');
        $this->addSql('DROP TABLE tbl_technician');
        $this->addSql('DROP TABLE technician_intervention');
    }
}
