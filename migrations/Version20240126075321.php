<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240126075321 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tools (id INT AUTO_INCREMENT NOT NULL, recipe_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_EAFADE7759D8A214 (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tools ADD CONSTRAINT FK_EAFADE7759D8A214 FOREIGN KEY (recipe_id) REFERENCES recipes (id)');
        $this->addSql('ALTER TABLE ingredients ADD quantity VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE steps DROP FOREIGN KEY FK_34220A7269574A48');
        $this->addSql('DROP INDEX IDX_34220A7269574A48 ON steps');
        $this->addSql('ALTER TABLE steps CHANGE recipe_id recipe_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE steps ADD CONSTRAINT FK_34220A7269574A48 FOREIGN KEY (recipe_id_id) REFERENCES recipes (id)');
        $this->addSql('CREATE INDEX IDX_34220A7269574A48 ON steps (recipe_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tools DROP FOREIGN KEY FK_EAFADE7759D8A214');
        $this->addSql('DROP TABLE tools');
        $this->addSql('ALTER TABLE ingredients DROP quantity');
        $this->addSql('ALTER TABLE steps DROP FOREIGN KEY FK_34220A7269574A48');
        $this->addSql('DROP INDEX IDX_34220A7269574A48 ON steps');
        $this->addSql('ALTER TABLE steps CHANGE recipe_id_id recipe_id INT NOT NULL');
        $this->addSql('ALTER TABLE steps ADD CONSTRAINT FK_34220A7269574A48 FOREIGN KEY (recipe_id) REFERENCES recipes (id)');
        $this->addSql('CREATE INDEX IDX_34220A7269574A48 ON steps (recipe_id)');
    }
}
