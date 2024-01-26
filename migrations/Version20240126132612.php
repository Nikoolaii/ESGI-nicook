<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240126132612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recipes_ingredient (id INT AUTO_INCREMENT NOT NULL, qqt INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipes_ingredient_recipes (recipes_ingredient_id INT NOT NULL, recipes_id INT NOT NULL, INDEX IDX_AFE802B383C8A54B (recipes_ingredient_id), INDEX IDX_AFE802B3FDF2B1FA (recipes_id), PRIMARY KEY(recipes_ingredient_id, recipes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipes_ingredient_ingredients (recipes_ingredient_id INT NOT NULL, ingredients_id INT NOT NULL, INDEX IDX_ECC77B1283C8A54B (recipes_ingredient_id), INDEX IDX_ECC77B123EC4DCE (ingredients_id), PRIMARY KEY(recipes_ingredient_id, ingredients_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recipes_ingredient_recipes ADD CONSTRAINT FK_AFE802B383C8A54B FOREIGN KEY (recipes_ingredient_id) REFERENCES recipes_ingredient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipes_ingredient_recipes ADD CONSTRAINT FK_AFE802B3FDF2B1FA FOREIGN KEY (recipes_id) REFERENCES recipes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipes_ingredient_ingredients ADD CONSTRAINT FK_ECC77B1283C8A54B FOREIGN KEY (recipes_ingredient_id) REFERENCES recipes_ingredient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipes_ingredient_ingredients ADD CONSTRAINT FK_ECC77B123EC4DCE FOREIGN KEY (ingredients_id) REFERENCES ingredients (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipes_ingredient_recipes DROP FOREIGN KEY FK_AFE802B383C8A54B');
        $this->addSql('ALTER TABLE recipes_ingredient_recipes DROP FOREIGN KEY FK_AFE802B3FDF2B1FA');
        $this->addSql('ALTER TABLE recipes_ingredient_ingredients DROP FOREIGN KEY FK_ECC77B1283C8A54B');
        $this->addSql('ALTER TABLE recipes_ingredient_ingredients DROP FOREIGN KEY FK_ECC77B123EC4DCE');
        $this->addSql('DROP TABLE recipes_ingredient');
        $this->addSql('DROP TABLE recipes_ingredient_recipes');
        $this->addSql('DROP TABLE recipes_ingredient_ingredients');
    }
}
