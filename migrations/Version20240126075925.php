<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240126075925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tools (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tools_recipes (tools_id INT NOT NULL, recipes_id INT NOT NULL, INDEX IDX_5C250658752C489C (tools_id), INDEX IDX_5C250658FDF2B1FA (recipes_id), PRIMARY KEY(tools_id, recipes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tools_recipes ADD CONSTRAINT FK_5C250658752C489C FOREIGN KEY (tools_id) REFERENCES tools (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tools_recipes ADD CONSTRAINT FK_5C250658FDF2B1FA FOREIGN KEY (recipes_id) REFERENCES recipes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tools_recipes DROP FOREIGN KEY FK_5C250658752C489C');
        $this->addSql('ALTER TABLE tools_recipes DROP FOREIGN KEY FK_5C250658FDF2B1FA');
        $this->addSql('DROP TABLE tools');
        $this->addSql('DROP TABLE tools_recipes');
    }
}
