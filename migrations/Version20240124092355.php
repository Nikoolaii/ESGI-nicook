<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240124092355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users_recipes (users_id INT NOT NULL, recipes_id INT NOT NULL, INDEX IDX_5369967F67B3B43D (users_id), INDEX IDX_5369967FFDF2B1FA (recipes_id), PRIMARY KEY(users_id, recipes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users_recipes ADD CONSTRAINT FK_5369967F67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_recipes ADD CONSTRAINT FK_5369967FFDF2B1FA FOREIGN KEY (recipes_id) REFERENCES recipes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users_recipes DROP FOREIGN KEY FK_5369967F67B3B43D');
        $this->addSql('ALTER TABLE users_recipes DROP FOREIGN KEY FK_5369967FFDF2B1FA');
        $this->addSql('DROP TABLE users_recipes');
    }
}
