<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220418120732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_coffee (id INT AUTO_INCREMENT NOT NULL, coffee_id INT NOT NULL, order_ref_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_900A396678CD6D6E (coffee_id), INDEX IDX_900A3966E238517C (order_ref_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_coffee ADD CONSTRAINT FK_900A396678CD6D6E FOREIGN KEY (coffee_id) REFERENCES coffee (id)');
        $this->addSql('ALTER TABLE order_coffee ADD CONSTRAINT FK_900A3966E238517C FOREIGN KEY (order_ref_id) REFERENCES `order` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_coffee DROP FOREIGN KEY FK_900A3966E238517C');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_coffee');
    }
}
