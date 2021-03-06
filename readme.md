# Тестова робота

## Використано

 * PHP
 * MySQL
 * Laravel
 * Bower
 * Gulp
 * JQuery
    * JQuery UI (Sortable)
 * Bootstrap
 * AngularJS
 * MySQL Workbench

## Задание
 Вводная часть
 В организации работают сотрудники (50+ тыс.), каждый сотрудник (кроме генерального директора) имеет ровно одного начальника. О каждом сотруднике нужно хранить следующую информацию:
 - ФИО
 - должность
 - дата приема на работу
 - оклад


 #### Уровень 1
 **1)** реализовать хранение списка сотрудников в базе данных

 **2)** создать страницу на которой реализовать вывод сотрудников в виде иерархического дерева (с указанием занимаемой должности)

 **3)** заполнить базу данных случайно сгенерированными данными (минимум 1000 сотрудников, минимум 5 уровней иерархии)

 **4)** создавать базу с помощью Laravel / Symfony migrations

 **5)** для наполнения базы данных использовать Laravel / Symfony seeder

 **6)** использовать twitter bootstrap для базового визуального оформления страницы

 **7)** создать страницу на которой реализовать вывод сотрудников в виде списка (grid) с возможностью сортировки по всем полям

 **8)** на странице списка сотрудников реализовать возможность поиска по любому полю

 **9)** на странице списка сотрудников сортировка (и поиск если реализован) выполнять без перезагрузки всей страницы (ajax)

 #### Уровень 2
 **10)** используя стандартные средства Laravel / Symfony создать область сайта, которая будет доступна только после ввода логина и пароля

 **11)** функционал, описанный в пунктах 7+, 8+ и 9+ должны быть доступны только для залогиненного пользователя

 **12)** в этой доступной по логину и паролю области реализовать возможность редактирования списка сотрудников (всех полей, в том числе изменения начальника) – т.е. стандартный функционал CRUD (список сотрудников уже реализован в пункте 11*) + добавить возможность загрузки фотограции сотрудника и отображения ее уменьшенной версии в списке сотрудников и оригинала на странице редактирования сотрудника

 **13)** при удалении сотрудника осуществить переподчинение подчиненных удаляемого сотрудника напрямую начальнику удаляемого сотрудника (дополнительный бонус если используя механизм, предлагаемый разработчиками Laravel / Symfony)

 **14)** реализовать механизм lazy loading для дерева сотрудников, т.е. по умолчанию показывать первые два уровня иерархии и по клику подгружать ветку дерева

 **15)** реализовать смену начальника с помощью drag-n-drop прямо в дереве сотрудников

 **16)** создать структуру базы данных в MySQL Workbench и найти способ автоматически сгенерировать файлы миграции, приложить файл проекта из MySQL Workbench