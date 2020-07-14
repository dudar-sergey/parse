<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200713123834 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE jcb_gr (id INT AUTO_INCREMENT NOT NULL, gr VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jcb_pr (id INT AUTO_INCREMENT NOT NULL, text VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, part VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, handled TINYINT(1) NOT NULL, gr VARCHAR(255) NOT NULL, sub_gr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE jcb_gr');
        $this->addSql('DROP TABLE jcb_pr');
    }
}
