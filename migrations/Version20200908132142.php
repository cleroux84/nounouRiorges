<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200908132142 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profils (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, numero_rue_adresse VARCHAR(255) DEFAULT NULL, code_postal INT DEFAULT NULL, complement_adresse VARCHAR(255) DEFAULT NULL, ville_adresse VARCHAR(255) DEFAULT NULL, telephone INT DEFAULT NULL, presentation_text VARCHAR(1000) DEFAULT NULL, animaux VARBINARY(255) DEFAULT NULL, photo1 VARCHAR(255) DEFAULT NULL, photo2 VARCHAR(255) DEFAULT NULL, photo3 VARCHAR(255) DEFAULT NULL, photo4 VARCHAR(255) DEFAULT NULL, photo_identite VARCHAR(255) DEFAULT NULL, agrement_date DATE DEFAULT NULL, place_dispo INT DEFAULT NULL, tarif_horaire INT DEFAULT NULL, tarif_entretien INT DEFAULT NULL, experience INT DEFAULT NULL, horaires VARCHAR(255) DEFAULT NULL, formation_premier_secours VARBINARY(255) DEFAULT NULL, bafa VARBINARY(255) DEFAULT NULL, formation_petite_enfance VARBINARY(255) DEFAULT NULL, permis_conduire VARBINARY(255) DEFAULT NULL, vehicule VARBINARY(255) DEFAULT NULL, langues_parlees VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_75831F5EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profils ADD CONSTRAINT FK_75831F5EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profils DROP FOREIGN KEY FK_75831F5EA76ED395');
        $this->addSql('DROP TABLE profils');
        $this->addSql('DROP TABLE user');
    }
}
