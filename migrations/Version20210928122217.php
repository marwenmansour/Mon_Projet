<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210928122217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fruits_legumes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE fruits');
        $this->addSql('DROP TABLE légumes');
        $this->addSql('DROP TABLE utilisateur');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fruits (nom VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`, origine VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`, prix INT UNSIGNED NOT NULL, peride_de_consommation VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`, INDEX origine (origine)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE légumes (légumes VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`, origine VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`, prix INT UNSIGNED NOT NULL, peride_de_consommation VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`, INDEX origine (origine), PRIMARY KEY(légumes)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`, prenom VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`, ville VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`, code_postale INT NOT NULL, pays VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE fruits_legumes');
    }
}
