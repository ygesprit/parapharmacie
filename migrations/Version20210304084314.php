<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210304084314 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE routineproducts');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE routineproducts (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, routine_id INT DEFAULT NULL, nameproduct VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_76BFA7774584665A (product_id), UNIQUE INDEX product_routine_unique (product_id, routine_id), INDEX IDX_76BFA777F27A94C7 (routine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE routineproducts ADD CONSTRAINT FK_76BFA7774584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE routineproducts ADD CONSTRAINT FK_76BFA777F27A94C7 FOREIGN KEY (routine_id) REFERENCES routine (id)');
    }
}
