<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20231005145832 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Updating tables Trick and Media with chosenImage';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE trick ADD chosen_image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91E5A829B17 FOREIGN KEY (chosen_image_id) REFERENCES media (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D8F0A91E5A829B17 ON trick (chosen_image_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE trick DROP FOREIGN KEY FK_D8F0A91E5A829B17');
        $this->addSql('DROP INDEX UNIQ_D8F0A91E5A829B17 ON trick');
        $this->addSql('ALTER TABLE trick DROP chosen_image_id');
    }
}
