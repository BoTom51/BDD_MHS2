<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221020185622 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE combination_attack_type_state (id INT AUTO_INCREMENT NOT NULL, type_combination_attack_type_state_fk_id INT NOT NULL, state_1_combination_attack_type_state_fk_id INT NOT NULL, state_2_combination_attack_type_state_fk_id INT DEFAULT NULL, INDEX IDX_F83F21CF473C8121 (type_combination_attack_type_state_fk_id), INDEX IDX_F83F21CF878D2E83 (state_1_combination_attack_type_state_fk_id), INDEX IDX_F83F21CFDDEC11E3 (state_2_combination_attack_type_state_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE combination_monster_riding_action (id INT AUTO_INCREMENT NOT NULL, riding_action_1_combination_monster_riding_action_fk_id INT NOT NULL, riding_action_2_combination_monster_riding_action_fk_id INT DEFAULT NULL, INDEX IDX_2E87F98D8A3059BD (riding_action_1_combination_monster_riding_action_fk_id), INDEX IDX_2E87F98D6979EE1F (riding_action_2_combination_monster_riding_action_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE combination_weapon_damage_type_monster_part (id INT AUTO_INCREMENT NOT NULL, part_combination_weapon_damage_type_monster_part_fk_id INT NOT NULL, damage_type_combination_weapon_damage_type_monster_part_fk_id INT NOT NULL, sensitivity_combination_weapon_damage_type_monster_part TINYINT(1) NOT NULL, INDEX IDX_EFEA5A7AB06FA47F (part_combination_weapon_damage_type_monster_part_fk_id), INDEX IDX_EFEA5A7A2D60D31D (damage_type_combination_weapon_damage_type_monster_part_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, name_element VARCHAR(10) NOT NULL, img_element VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, name_location VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monster_part (id INT AUTO_INCREMENT NOT NULL, name_monster_part VARCHAR(25) NOT NULL, img_monster_part VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monster_species (id INT AUTO_INCREMENT NOT NULL, name_monster_species VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monster_state (id INT AUTO_INCREMENT NOT NULL, name_monster_state VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE riding_action (id INT AUTO_INCREMENT NOT NULL, name_riding_action VARCHAR(20) NOT NULL, description_riding_action LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name_type VARCHAR(10) NOT NULL, img_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon_damage_type (id INT AUTO_INCREMENT NOT NULL, name_weapon_damage_type VARCHAR(20) NOT NULL, sensitive_img_weapon_damage_type VARCHAR(255) NOT NULL, not_sensitive_img_weapon_damage_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE combination_attack_type_state ADD CONSTRAINT FK_F83F21CF473C8121 FOREIGN KEY (type_combination_attack_type_state_fk_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE combination_attack_type_state ADD CONSTRAINT FK_F83F21CF878D2E83 FOREIGN KEY (state_1_combination_attack_type_state_fk_id) REFERENCES monster_state (id)');
        $this->addSql('ALTER TABLE combination_attack_type_state ADD CONSTRAINT FK_F83F21CFDDEC11E3 FOREIGN KEY (state_2_combination_attack_type_state_fk_id) REFERENCES monster_state (id)');
        $this->addSql('ALTER TABLE combination_monster_riding_action ADD CONSTRAINT FK_2E87F98D8A3059BD FOREIGN KEY (riding_action_1_combination_monster_riding_action_fk_id) REFERENCES riding_action (id)');
        $this->addSql('ALTER TABLE combination_monster_riding_action ADD CONSTRAINT FK_2E87F98D6979EE1F FOREIGN KEY (riding_action_2_combination_monster_riding_action_fk_id) REFERENCES riding_action (id)');
        $this->addSql('ALTER TABLE combination_weapon_damage_type_monster_part ADD CONSTRAINT FK_EFEA5A7AB06FA47F FOREIGN KEY (part_combination_weapon_damage_type_monster_part_fk_id) REFERENCES monster_part (id)');
        $this->addSql('ALTER TABLE combination_weapon_damage_type_monster_part ADD CONSTRAINT FK_EFEA5A7A2D60D31D FOREIGN KEY (damage_type_combination_weapon_damage_type_monster_part_fk_id) REFERENCES weapon_damage_type (id)');
        $this->addSql('ALTER TABLE monster ADD species_monster_fk_id INT NOT NULL, ADD elem_strength_monster_fk_id INT NOT NULL, ADD elem_weakness_monster_fk_id INT NOT NULL, ADD attack_type_1_monster_fk_id INT NOT NULL, ADD attack_type_2_monster_fk_id INT NOT NULL, ADD attack_type_3_monster_fk_id INT DEFAULT NULL, ADD slash_monster_fk_id INT NOT NULL, ADD blunt_monster_fk_id INT NOT NULL, ADD pierce_monster_fk_id INT NOT NULL, ADD location_monster_fk_id INT NOT NULL, ADD egg_type_monster_fk_id INT DEFAULT NULL, ADD riding_action_monster_fk_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F46E504BCA FOREIGN KEY (species_monster_fk_id) REFERENCES monster_species (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4C493B286 FOREIGN KEY (elem_strength_monster_fk_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4244D118E FOREIGN KEY (elem_weakness_monster_fk_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4E7C9DB98 FOREIGN KEY (attack_type_1_monster_fk_id) REFERENCES combination_attack_type_state (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4F6B4B1E1 FOREIGN KEY (attack_type_2_monster_fk_id) REFERENCES combination_attack_type_state (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F44F4F6A09 FOREIGN KEY (attack_type_3_monster_fk_id) REFERENCES combination_attack_type_state (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4D89C5114 FOREIGN KEY (slash_monster_fk_id) REFERENCES combination_weapon_damage_type_monster_part (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4969F1E98 FOREIGN KEY (blunt_monster_fk_id) REFERENCES combination_weapon_damage_type_monster_part (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4A35EE36 FOREIGN KEY (pierce_monster_fk_id) REFERENCES combination_weapon_damage_type_monster_part (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F479F4CE9A FOREIGN KEY (location_monster_fk_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4BC5353DA FOREIGN KEY (egg_type_monster_fk_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4DC173B6D FOREIGN KEY (riding_action_monster_fk_id) REFERENCES combination_monster_riding_action (id)');
        $this->addSql('CREATE INDEX IDX_245EC6F46E504BCA ON monster (species_monster_fk_id)');
        $this->addSql('CREATE INDEX IDX_245EC6F4C493B286 ON monster (elem_strength_monster_fk_id)');
        $this->addSql('CREATE INDEX IDX_245EC6F4244D118E ON monster (elem_weakness_monster_fk_id)');
        $this->addSql('CREATE INDEX IDX_245EC6F4E7C9DB98 ON monster (attack_type_1_monster_fk_id)');
        $this->addSql('CREATE INDEX IDX_245EC6F4F6B4B1E1 ON monster (attack_type_2_monster_fk_id)');
        $this->addSql('CREATE INDEX IDX_245EC6F44F4F6A09 ON monster (attack_type_3_monster_fk_id)');
        $this->addSql('CREATE INDEX IDX_245EC6F4D89C5114 ON monster (slash_monster_fk_id)');
        $this->addSql('CREATE INDEX IDX_245EC6F4969F1E98 ON monster (blunt_monster_fk_id)');
        $this->addSql('CREATE INDEX IDX_245EC6F4A35EE36 ON monster (pierce_monster_fk_id)');
        $this->addSql('CREATE INDEX IDX_245EC6F479F4CE9A ON monster (location_monster_fk_id)');
        $this->addSql('CREATE INDEX IDX_245EC6F4BC5353DA ON monster (egg_type_monster_fk_id)');
        $this->addSql('CREATE INDEX IDX_245EC6F4DC173B6D ON monster (riding_action_monster_fk_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4E7C9DB98');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4F6B4B1E1');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F44F4F6A09');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4DC173B6D');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4D89C5114');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4969F1E98');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4A35EE36');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4C493B286');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4244D118E');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F479F4CE9A');
        $this->addSql('ALTER TABLE combination_weapon_damage_type_monster_part DROP FOREIGN KEY FK_EFEA5A7AB06FA47F');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F46E504BCA');
        $this->addSql('ALTER TABLE combination_attack_type_state DROP FOREIGN KEY FK_F83F21CF878D2E83');
        $this->addSql('ALTER TABLE combination_attack_type_state DROP FOREIGN KEY FK_F83F21CFDDEC11E3');
        $this->addSql('ALTER TABLE combination_monster_riding_action DROP FOREIGN KEY FK_2E87F98D8A3059BD');
        $this->addSql('ALTER TABLE combination_monster_riding_action DROP FOREIGN KEY FK_2E87F98D6979EE1F');
        $this->addSql('ALTER TABLE combination_attack_type_state DROP FOREIGN KEY FK_F83F21CF473C8121');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4BC5353DA');
        $this->addSql('ALTER TABLE combination_weapon_damage_type_monster_part DROP FOREIGN KEY FK_EFEA5A7A2D60D31D');
        $this->addSql('DROP TABLE combination_attack_type_state');
        $this->addSql('DROP TABLE combination_monster_riding_action');
        $this->addSql('DROP TABLE combination_weapon_damage_type_monster_part');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE monster_part');
        $this->addSql('DROP TABLE monster_species');
        $this->addSql('DROP TABLE monster_state');
        $this->addSql('DROP TABLE riding_action');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE weapon_damage_type');
        $this->addSql('DROP INDEX IDX_245EC6F46E504BCA ON monster');
        $this->addSql('DROP INDEX IDX_245EC6F4C493B286 ON monster');
        $this->addSql('DROP INDEX IDX_245EC6F4244D118E ON monster');
        $this->addSql('DROP INDEX IDX_245EC6F4E7C9DB98 ON monster');
        $this->addSql('DROP INDEX IDX_245EC6F4F6B4B1E1 ON monster');
        $this->addSql('DROP INDEX IDX_245EC6F44F4F6A09 ON monster');
        $this->addSql('DROP INDEX IDX_245EC6F4D89C5114 ON monster');
        $this->addSql('DROP INDEX IDX_245EC6F4969F1E98 ON monster');
        $this->addSql('DROP INDEX IDX_245EC6F4A35EE36 ON monster');
        $this->addSql('DROP INDEX IDX_245EC6F479F4CE9A ON monster');
        $this->addSql('DROP INDEX IDX_245EC6F4BC5353DA ON monster');
        $this->addSql('DROP INDEX IDX_245EC6F4DC173B6D ON monster');
        $this->addSql('ALTER TABLE monster DROP species_monster_fk_id, DROP elem_strength_monster_fk_id, DROP elem_weakness_monster_fk_id, DROP attack_type_1_monster_fk_id, DROP attack_type_2_monster_fk_id, DROP attack_type_3_monster_fk_id, DROP slash_monster_fk_id, DROP blunt_monster_fk_id, DROP pierce_monster_fk_id, DROP location_monster_fk_id, DROP egg_type_monster_fk_id, DROP riding_action_monster_fk_id');
    }
}
