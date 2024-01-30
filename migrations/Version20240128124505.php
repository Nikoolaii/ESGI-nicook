<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240128124505 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipe_ingredient ADD recipe_id INT NOT NULL, ADD ingredient_id INT NOT NULL');
        $this->addSql('ALTER TABLE recipe_ingredient ADD CONSTRAINT FK_22D1FE1359D8A214 FOREIGN KEY (recipe_id) REFERENCES recipes (id)');
        $this->addSql('ALTER TABLE recipe_ingredient ADD CONSTRAINT FK_22D1FE13933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredients (id)');
        $this->addSql('CREATE INDEX IDX_22D1FE1359D8A214 ON recipe_ingredient (recipe_id)');
        $this->addSql('CREATE INDEX IDX_22D1FE13933FE08C ON recipe_ingredient (ingredient_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipe_ingredient DROP FOREIGN KEY FK_22D1FE1359D8A214');
        $this->addSql('ALTER TABLE recipe_ingredient DROP FOREIGN KEY FK_22D1FE13933FE08C');
        $this->addSql('DROP INDEX IDX_22D1FE1359D8A214 ON recipe_ingredient');
        $this->addSql('DROP INDEX IDX_22D1FE13933FE08C ON recipe_ingredient');
        $this->addSql('ALTER TABLE recipe_ingredient DROP recipe_id, DROP ingredient_id');
    }
}
