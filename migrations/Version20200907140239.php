<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200907140239 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profils ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profils ADD CONSTRAINT FK_75831F5EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_75831F5EA76ED395 ON profils (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profils DROP FOREIGN KEY FK_75831F5EA76ED395');
        $this->addSql('DROP INDEX UNIQ_75831F5EA76ED395 ON profils');
        $this->addSql('ALTER TABLE profils DROP user_id');
    }
}
