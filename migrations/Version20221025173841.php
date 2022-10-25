<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221025173841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4D89C5114');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4A35EE36');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4969F1E98');
        $this->addSql('CREATE TABLE sensitivity_weapon_damage_type_monster_part (id INT AUTO_INCREMENT NOT NULL, part_sensitivity_weapon_damage_type_monster_part_fk_id INT NOT NULL, damage_type_sensitivity_weapon_damage_type_monster_part_fk_id INT NOT NULL, monster_combination_weapon_damage_type_monster_part_fk_id INT NOT NULL, sensitivity_sensitivity_weapon_damage_type_monster_part TINYINT(1) NOT NULL, INDEX IDX_6C405F75487CC562 (part_sensitivity_weapon_damage_type_monster_part_fk_id), INDEX IDX_6C405F75D573B200 (damage_type_sensitivity_weapon_damage_type_monster_part_fk_id), INDEX IDX_6C405F75F88692C8 (monster_combination_weapon_damage_type_monster_part_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sensitivity_weapon_damage_type_monster_part ADD CONSTRAINT FK_6C405F75487CC562 FOREIGN KEY (part_sensitivity_weapon_damage_type_monster_part_fk_id) REFERENCES monster_part (id)');
        $this->addSql('ALTER TABLE sensitivity_weapon_damage_type_monster_part ADD CONSTRAINT FK_6C405F75D573B200 FOREIGN KEY (damage_type_sensitivity_weapon_damage_type_monster_part_fk_id) REFERENCES weapon_damage_type (id)');
        $this->addSql('ALTER TABLE sensitivity_weapon_damage_type_monster_part ADD CONSTRAINT FK_6C405F75F88692C8 FOREIGN KEY (monster_combination_weapon_damage_type_monster_part_fk_id) REFERENCES monster (id)');
        $this->addSql('DROP TABLE combination_weapon_damage_type_monster_part');
        $this->addSql('DROP INDEX IDX_245EC6F4969F1E98 ON monster');
        $this->addSql('DROP INDEX IDX_245EC6F4D89C5114 ON monster');
        $this->addSql('DROP INDEX IDX_245EC6F4A35EE36 ON monster');
        $this->addSql('ALTER TABLE monster DROP slash_monster_fk_id, DROP blunt_monster_fk_id, DROP pierce_monster_fk_id');
        $this->addSql('ALTER TABLE monster_part DROP img_monster_part');
        $this->addSql('ALTER TABLE weapon_damage_type DROP sensitive_img_weapon_damage_type, DROP not_sensitive_img_weapon_damage_type');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE combination_weapon_damage_type_monster_part (id INT AUTO_INCREMENT NOT NULL, part_combination_weapon_damage_type_monster_part_fk_id INT NOT NULL, damage_type_combination_weapon_damage_type_monster_part_fk_id INT NOT NULL, sensitivity_combination_weapon_damage_type_monster_part TINYINT(1) NOT NULL, INDEX IDX_EFEA5A7A2D60D31D (damage_type_combination_weapon_damage_type_monster_part_fk_id), INDEX IDX_EFEA5A7AB06FA47F (part_combination_weapon_damage_type_monster_part_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE combination_weapon_damage_type_monster_part ADD CONSTRAINT FK_EFEA5A7A2D60D31D FOREIGN KEY (damage_type_combination_weapon_damage_type_monster_part_fk_id) REFERENCES weapon_damage_type (id)');
        $this->addSql('ALTER TABLE combination_weapon_damage_type_monster_part ADD CONSTRAINT FK_EFEA5A7AB06FA47F FOREIGN KEY (part_combination_weapon_damage_type_monster_part_fk_id) REFERENCES monster_part (id)');
        $this->addSql('DROP TABLE sensitivity_weapon_damage_type_monster_part');
        $this->addSql('ALTER TABLE monster ADD slash_monster_fk_id INT NOT NULL, ADD blunt_monster_fk_id INT NOT NULL, ADD pierce_monster_fk_id INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4D89C5114 FOREIGN KEY (slash_monster_fk_id) REFERENCES combination_weapon_damage_type_monster_part (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4A35EE36 FOREIGN KEY (pierce_monster_fk_id) REFERENCES combination_weapon_damage_type_monster_part (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4969F1E98 FOREIGN KEY (blunt_monster_fk_id) REFERENCES combination_weapon_damage_type_monster_part (id)');
        $this->addSql('CREATE INDEX IDX_245EC6F4969F1E98 ON monster (blunt_monster_fk_id)');
        $this->addSql('CREATE INDEX IDX_245EC6F4D89C5114 ON monster (slash_monster_fk_id)');
        $this->addSql('CREATE INDEX IDX_245EC6F4A35EE36 ON monster (pierce_monster_fk_id)');
        $this->addSql('ALTER TABLE monster_part ADD img_monster_part VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE weapon_damage_type ADD sensitive_img_weapon_damage_type VARCHAR(255) NOT NULL, ADD not_sensitive_img_weapon_damage_type VARCHAR(255) NOT NULL');
    }
}
