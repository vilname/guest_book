Настроил 
  - docker
  - vue
  - mysql (pdo)
  - routing
  - migration (phinx)
  - webpack


1. Создать пример гостевой книги.
 
Гостевую книгу описать без использования php-фреймворков, под стандарты PHP 7.2
 
Структура страницы:
Форма добавления записей в гостевую книгу по ajax-запросу.
Под формой вывести 5 последних записей из гостевой книги. Записи хранить в БД MySQL или SQLite.
 
По возможности стилизовать страницу через CSS (упрощенно).
 
Структура таблицы гостевой книги:
 
CREATE TABLE `guest_book` (
`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`dtime` DATETIME NOT NULL,
`name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
`body` TEXT NOT NULL COLLATE 'utf8_unicode_ci',
PRIMARY KEY (`id`),
INDEX `dtime` (`dtime`)
) COLLATE='utf8_unicode_ci' ENGINE=InnoDB;
 
 
2. Создайте структуру БД небольшого каталога товаров.
 
Есть некоторый список товаров, разбитый по товарным группам.
У товара есть несколько обязательных свойств и может быть некое количество дополнительных свойств в зависимости от группы товаров, в которой он находится.
Количество и типы дополнительных свойств могут быть разными.
 
 
3. JS
 
Как исправить ошибку в коде ниже
var c = {
  'b': 3,
  'c': function() {
     window.setTimeout(
        function() {
          this.d();
        }, 4);
     },
  'd': function() {
     alert(this.b);
  }
};
 
c.c();
