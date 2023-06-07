<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230607081919 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assure_sinistre ADD relation_id INT DEFAULT NULL, ADD rel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE assure_sinistre ADD CONSTRAINT FK_AD2AE2733256915B FOREIGN KEY (relation_id) REFERENCES assure (id)');
        $this->addSql('ALTER TABLE assure_sinistre ADD CONSTRAINT FK_AD2AE2734E0AA1CD FOREIGN KEY (rel_id) REFERENCES sinistre (id)');
        $this->addSql('CREATE INDEX IDX_AD2AE2733256915B ON assure_sinistre (relation_id)');
        $this->addSql('CREATE INDEX IDX_AD2AE2734E0AA1CD ON assure_sinistre (rel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assure_sinistre DROP FOREIGN KEY FK_AD2AE2733256915B');
        $this->addSql('ALTER TABLE assure_sinistre DROP FOREIGN KEY FK_AD2AE2734E0AA1CD');
        $this->addSql('DROP INDEX IDX_AD2AE2733256915B ON assure_sinistre');
        $this->addSql('DROP INDEX IDX_AD2AE2734E0AA1CD ON assure_sinistre');
        $this->addSql('ALTER TABLE assure_sinistre DROP relation_id, DROP rel_id');
    }
}
