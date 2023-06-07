<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230607082718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assure DROP FOREIGN KEY FK_C779CC29B288C3E3');
        $this->addSql('DROP INDEX IDX_C779CC29B288C3E3 ON assure');
        $this->addSql('ALTER TABLE assure DROP assurance_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assure ADD assurance_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE assure ADD CONSTRAINT FK_C779CC29B288C3E3 FOREIGN KEY (assurance_id) REFERENCES assurance (id)');
        $this->addSql('CREATE INDEX IDX_C779CC29B288C3E3 ON assure (assurance_id)');
    }
}
