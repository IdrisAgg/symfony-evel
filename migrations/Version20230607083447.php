<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230607083447 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assure DROP FOREIGN KEY FK_C779CC29BEA9BD22');
        $this->addSql('DROP INDEX IDX_C779CC29BEA9BD22 ON assure');
        $this->addSql('ALTER TABLE assure DROP fk_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assure ADD fk_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE assure ADD CONSTRAINT FK_C779CC29BEA9BD22 FOREIGN KEY (fk_id_id) REFERENCES assurance (id)');
        $this->addSql('CREATE INDEX IDX_C779CC29BEA9BD22 ON assure (fk_id_id)');
    }
}
