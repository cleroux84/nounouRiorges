<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200908074629 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profils ADD email VARCHAR(255) DEFAULT NULL, ADD numero_rue_adresse VARCHAR(255) DEFAULT NULL, ADD code_postal INT DEFAULT NULL, ADD complement_adresse VARCHAR(255) DEFAULT NULL, ADD ville_adresse VARCHAR(255) DEFAULT NULL, ADD telephone INT DEFAULT NULL, ADD presentation_text VARCHAR(1000) DEFAULT NULL, ADD animaux VARBINARY(255) DEFAULT NULL, ADD photo1 VARCHAR(255) DEFAULT NULL, ADD photo2 VARCHAR(255) DEFAULT NULL, ADD photo3 VARCHAR(255) DEFAULT NULL, ADD photo4 VARCHAR(255) DEFAULT NULL, ADD photo_identite VARCHAR(255) DEFAULT NULL, ADD agrement_date DATE DEFAULT NULL, ADD place_dispo INT DEFAULT NULL, ADD tarif_horaire INT DEFAULT NULL, ADD tarif_entretien INT DEFAULT NULL, ADD experience INT DEFAULT NULL, ADD horaires VARCHAR(255) DEFAULT NULL, ADD formation_premier_secours VARBINARY(255) DEFAULT NULL, ADD bafa VARBINARY(255) DEFAULT NULL, ADD formation_petite_enfance VARBINARY(255) DEFAULT NULL, ADD permis_conduire VARBINARY(255) DEFAULT NULL, ADD vehicule VARBINARY(255) DEFAULT NULL, ADD langues_parlees VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profils DROP email, DROP numero_rue_adresse, DROP code_postal, DROP complement_adresse, DROP ville_adresse, DROP telephone, DROP presentation_text, DROP animaux, DROP photo1, DROP photo2, DROP photo3, DROP photo4, DROP photo_identite, DROP agrement_date, DROP place_dispo, DROP tarif_horaire, DROP tarif_entretien, DROP experience, DROP horaires, DROP formation_premier_secours, DROP bafa, DROP formation_petite_enfance, DROP permis_conduire, DROP vehicule, DROP langues_parlees');
    }
}
