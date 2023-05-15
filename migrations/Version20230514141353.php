<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230514141353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD type VARCHAR(20) DEFAULT NULL, ADD name VARCHAR(50) NOT NULL, ADD firstname VARCHAR(50) DEFAULT NULL, ADD birth_date DATE DEFAULT NULL, ADD reason LONGTEXT DEFAULT NULL, ADD created_at DATE NOT NULL, ADD last_modification DATE DEFAULT NULL, ADD modify_by VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP type, DROP name, DROP firstname, DROP birth_date, DROP reason, DROP created_at, DROP last_modification, DROP modify_by');
    }
}
