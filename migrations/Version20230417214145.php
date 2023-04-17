<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230417214145 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE partenaire_et_client (id INT AUTO_INCREMENT NOT NULL, image LONGTEXT NOT NULL, lien LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, icone LONGTEXT NOT NULL, lien LONGTEXT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_description (id INT AUTO_INCREMENT NOT NULL, introduction_id INT DEFAULT NULL, text LONGTEXT NOT NULL, INDEX IDX_2DDD331587D2B3A9 (introduction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_onglet (id INT AUTO_INCREMENT NOT NULL, onglets_header_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, lien LONGTEXT NOT NULL, INDEX IDX_16A3F0CEC9E38B30 (onglets_header_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sous_description ADD CONSTRAINT FK_2DDD331587D2B3A9 FOREIGN KEY (introduction_id) REFERENCES introduction (id)');
        $this->addSql('ALTER TABLE sous_onglet ADD CONSTRAINT FK_16A3F0CEC9E38B30 FOREIGN KEY (onglets_header_id) REFERENCES onglets_header (id)');
        $this->addSql('ALTER TABLE introduction DROP sous_description');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sous_description DROP FOREIGN KEY FK_2DDD331587D2B3A9');
        $this->addSql('ALTER TABLE sous_onglet DROP FOREIGN KEY FK_16A3F0CEC9E38B30');
        $this->addSql('DROP TABLE partenaire_et_client');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE sous_description');
        $this->addSql('DROP TABLE sous_onglet');
        $this->addSql('ALTER TABLE introduction ADD sous_description LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }
}
