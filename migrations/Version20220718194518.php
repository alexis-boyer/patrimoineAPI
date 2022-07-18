<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220718194518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE building (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address LONGTEXT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE level (id INT AUTO_INCREMENT NOT NULL, building_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, elevation INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_9AEACC134D2A7E12 (building_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, level_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, number VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_729F519B5FB14BA7 (level_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `usage` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usage_room (usage_id INT NOT NULL, room_id INT NOT NULL, INDEX IDX_D93543802150E69A (usage_id), INDEX IDX_D935438054177093 (room_id), PRIMARY KEY(usage_id, room_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE level ADD CONSTRAINT FK_9AEACC134D2A7E12 FOREIGN KEY (building_id) REFERENCES building (id)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B5FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id)');
        $this->addSql('ALTER TABLE usage_room ADD CONSTRAINT FK_D93543802150E69A FOREIGN KEY (usage_id) REFERENCES `usage` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usage_room ADD CONSTRAINT FK_D935438054177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE level DROP FOREIGN KEY FK_9AEACC134D2A7E12');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519B5FB14BA7');
        $this->addSql('ALTER TABLE usage_room DROP FOREIGN KEY FK_D935438054177093');
        $this->addSql('ALTER TABLE usage_room DROP FOREIGN KEY FK_D93543802150E69A');
        $this->addSql('DROP TABLE building');
        $this->addSql('DROP TABLE level');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE `usage`');
        $this->addSql('DROP TABLE usage_room');
    }
}
