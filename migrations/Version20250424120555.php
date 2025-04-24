<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250424120555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE exemplaire (id INT AUTO_INCREMENT NOT NULL, usure_id INT NOT NULL, stock_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_5EF83C921117BEE5 (usure_id), INDEX IDX_5EF83C92DCD6110 (stock_id), INDEX IDX_5EF83C9237D925CB (livre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exemplaire ADD CONSTRAINT FK_5EF83C921117BEE5 FOREIGN KEY (usure_id) REFERENCES usure (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exemplaire ADD CONSTRAINT FK_5EF83C92DCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exemplaire ADD CONSTRAINT FK_5EF83C9237D925CB FOREIGN KEY (livre_id) REFERENCES livre (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE exemplaire DROP FOREIGN KEY FK_5EF83C921117BEE5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exemplaire DROP FOREIGN KEY FK_5EF83C92DCD6110
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exemplaire DROP FOREIGN KEY FK_5EF83C9237D925CB
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE exemplaire
        SQL);
    }
}
