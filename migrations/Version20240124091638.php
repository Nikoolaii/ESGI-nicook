<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240124091638 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favorite_recipes (favorite_id INT NOT NULL, recipes_id INT NOT NULL, INDEX IDX_FE3D4CDBAA17481D (favorite_id), INDEX IDX_FE3D4CDBFDF2B1FA (recipes_id), PRIMARY KEY(favorite_id, recipes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favorite_users (favorite_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_A20B8ECDAA17481D (favorite_id), INDEX IDX_A20B8ECD67B3B43D (users_id), PRIMARY KEY(favorite_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE favorite_recipes ADD CONSTRAINT FK_FE3D4CDBAA17481D FOREIGN KEY (favorite_id) REFERENCES favorite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favorite_recipes ADD CONSTRAINT FK_FE3D4CDBFDF2B1FA FOREIGN KEY (recipes_id) REFERENCES recipes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favorite_users ADD CONSTRAINT FK_A20B8ECDAA17481D FOREIGN KEY (favorite_id) REFERENCES favorite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favorite_users ADD CONSTRAINT FK_A20B8ECD67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favorite_recipes DROP FOREIGN KEY FK_FE3D4CDBAA17481D');
        $this->addSql('ALTER TABLE favorite_recipes DROP FOREIGN KEY FK_FE3D4CDBFDF2B1FA');
        $this->addSql('ALTER TABLE favorite_users DROP FOREIGN KEY FK_A20B8ECDAA17481D');
        $this->addSql('ALTER TABLE favorite_users DROP FOREIGN KEY FK_A20B8ECD67B3B43D');
        $this->addSql('DROP TABLE favorite_recipes');
        $this->addSql('DROP TABLE favorite_users');
    }
}
