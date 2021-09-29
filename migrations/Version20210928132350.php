<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210928132350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fruits_legumes_commande (fruits_legumes_id INT NOT NULL, commande_id INT NOT NULL, INDEX IDX_9C8A6A152C147EA9 (fruits_legumes_id), INDEX IDX_9C8A6A1582EA2E54 (commande_id), PRIMARY KEY(fruits_legumes_id, commande_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fruits_legumes_commande ADD CONSTRAINT FK_9C8A6A152C147EA9 FOREIGN KEY (fruits_legumes_id) REFERENCES fruits_legumes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fruits_legumes_commande ADD CONSTRAINT FK_9C8A6A1582EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande ADD livraison_id INT NOT NULL, ADD articles_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D8E54FB25 FOREIGN KEY (livraison_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D1EBAF6CC FOREIGN KEY (articles_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D8E54FB25 ON commande (livraison_id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D1EBAF6CC ON commande (articles_id)');
        $this->addSql('ALTER TABLE fruits_legumes ADD vendeur_id INT NOT NULL');
        $this->addSql('ALTER TABLE fruits_legumes ADD CONSTRAINT FK_A0A3B5CA858C065E FOREIGN KEY (vendeur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_A0A3B5CA858C065E ON fruits_legumes (vendeur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE fruits_legumes_commande');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D8E54FB25');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D1EBAF6CC');
        $this->addSql('DROP INDEX IDX_6EEAA67D8E54FB25 ON commande');
        $this->addSql('DROP INDEX IDX_6EEAA67D1EBAF6CC ON commande');
        $this->addSql('ALTER TABLE commande DROP livraison_id, DROP articles_id');
        $this->addSql('ALTER TABLE fruits_legumes DROP FOREIGN KEY FK_A0A3B5CA858C065E');
        $this->addSql('DROP INDEX IDX_A0A3B5CA858C065E ON fruits_legumes');
        $this->addSql('ALTER TABLE fruits_legumes DROP vendeur_id');
    }
}
