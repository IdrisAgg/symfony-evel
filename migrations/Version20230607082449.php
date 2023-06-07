<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230607082449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assure ADD assurance_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE assure ADD CONSTRAINT FK_C779CC29B288C3E3 FOREIGN KEY (assurance_id) REFERENCES assurance (id)');
        $this->addSql('CREATE INDEX IDX_C779CC29B288C3E3 ON assure (assurance_id)');
        $this->addSql('ALTER TABLE assure_sinistre DROP FOREIGN KEY FK_AD2AE2733256915B');
        $this->addSql('ALTER TABLE assure_sinistre DROP FOREIGN KEY FK_AD2AE2734E0AA1CD');
        $this->addSql('DROP INDEX IDX_AD2AE2733256915B ON assure_sinistre');
        $this->addSql('DROP INDEX IDX_AD2AE2734E0AA1CD ON assure_sinistre');
        $this->addSql('ALTER TABLE assure_sinistre ADD relation_id INT DEFAULT NULL, ADD rel_id INT DEFAULT NULL, DROP assure_id, DROP sinistre_id');
        $this->addSql('ALTER TABLE assure_sinistre ADD CONSTRAINT FK_AD2AE2733256915B FOREIGN KEY (relation_id) REFERENCES assure (id)');
        $this->addSql('ALTER TABLE assure_sinistre ADD CONSTRAINT FK_AD2AE2734E0AA1CD FOREIGN KEY (rel_id) REFERENCES sinistre (id)');
        $this->addSql('CREATE INDEX IDX_AD2AE2733256915B ON assure_sinistre (relation_id)');
        $this->addSql('CREATE INDEX IDX_AD2AE2734E0AA1CD ON assure_sinistre (rel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assure DROP FOREIGN KEY FK_C779CC29B288C3E3');
        $this->addSql('DROP INDEX IDX_C779CC29B288C3E3 ON assure');
        $this->addSql('ALTER TABLE assure DROP assurance_id');
        $this->addSql('ALTER TABLE assure_sinistre DROP FOREIGN KEY FK_AD2AE2733256915B');
        $this->addSql('ALTER TABLE assure_sinistre DROP FOREIGN KEY FK_AD2AE2734E0AA1CD');
        $this->addSql('DROP INDEX IDX_AD2AE2733256915B ON assure_sinistre');
        $this->addSql('DROP INDEX IDX_AD2AE2734E0AA1CD ON assure_sinistre');
        $this->addSql('ALTER TABLE assure_sinistre ADD assure_id INT DEFAULT NULL, ADD sinistre_id INT DEFAULT NULL, DROP relation_id, DROP rel_id');
        $this->addSql('ALTER TABLE assure_sinistre ADD CONSTRAINT FK_AD2AE2733256915B FOREIGN KEY (assure_id) REFERENCES assure (id)');
        $this->addSql('ALTER TABLE assure_sinistre ADD CONSTRAINT FK_AD2AE2734E0AA1CD FOREIGN KEY (sinistre_id) REFERENCES sinistre (id)');
        $this->addSql('CREATE INDEX IDX_AD2AE2733256915B ON assure_sinistre (assure_id)');
        $this->addSql('CREATE INDEX IDX_AD2AE2734E0AA1CD ON assure_sinistre (sinistre_id)');
    }
}
