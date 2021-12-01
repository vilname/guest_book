<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class MyMigration extends AbstractMigration
{
    public function up()
    {
        $sql = "
            CREATE TABLE `guest_book` (
            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `dtime` DATETIME NOT NULL,
            `name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
            `body` TEXT NOT NULL COLLATE 'utf8_unicode_ci',
            PRIMARY KEY (`id`),
            INDEX `dtime` (`dtime`)
            ) COLLATE='utf8_unicode_ci' ENGINE=InnoDB;
        ";

        $this->execute($sql);
    }

    public function down()
    {
        $sql = 'DROP TABLE `guest_book`';
        $this->execute($sql);
    }
}
