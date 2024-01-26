<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240126080351 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recipes (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, img_link VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_A369E2B59D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recipes ADD CONSTRAINT FK_A369E2B59D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredients_recipes DROP FOREIGN KEY FK_C1E222F1FDF2B1FA');
        $this->addSql('ALTER TABLE steps DROP FOREIGN KEY FK_34220A7269574A48');
        $this->addSql('ALTER TABLE tools_recipes DROP FOREIGN KEY FK_5C250658FDF2B1FA');
        $this->addSql('ALTER TABLE users_recipes DROP FOREIGN KEY FK_5369967FFDF2B1FA');
        $this->addSql('ALTER TABLE recipes DROP FOREIGN KEY FK_A369E2B59D86650F');
        $this->addSql('DROP TABLE recipes');
    }
}
