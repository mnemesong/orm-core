<h1>mnemesong/orm-core</h1>

[![Latest Stable Version](http://poser.pugx.org/mnemesong/orm-core/v)](https://packagist.org/packages/mnemesong/orm-core)
[![PHPUnit](https://github.com/mnemesong/orm-core/actions/workflows/phpunit.yml/badge.svg)](https://github.com/mnemesong/orm-core/actions/workflows/phpunit.yml)
[![PHPStan-lvl9](https://github.com/mnemesong/orm-core/actions/workflows/phpstan.yml/badge.svg)](https://github.com/mnemesong/orm-core/actions/workflows/phpstan.yml)
[![PHP Version Require](http://poser.pugx.org/mnemesong/orm-core/require/php)](https://packagist.org/packages/mnemesong/orm-core)
[![License](http://poser.pugx.org/mnemesong/orm-core/license)](https://packagist.org/packages/mnemesong/orm-core)

- The documentation is written in two languages: Russian and English.
- Документация написана на двух языках: русском и английском.

<hr>

<h2>General description / Общее описание</h2>
<h3>ENG:</h3>
<p>The package provides an implementation of the basic object model for working with storages of various types:</p>
<ul>
    <li>Class for creating and loading files: RecordsQueue and ScalarsQueue.</li>
    <li>Class for creating and configuring commands: DeleteCommand, SaveCommand, UpdateCommand.</li>
    <li>Interfaces and traits: AbleToRecording, LimitExecutable, AbleToSort have special logic for
        classes and commands, as well as helper methods for testing their receivers.</li>
    <li>Highly specialized interfaces for storage activities: RecordsDeleteModelInterface,
        RecordsSaveModelInterface, RecordsSearchModelInterface, RecordsUpdateModelInterface, ScalarsSearchModelInterface.</li>
    <li>Interface for storage: StorageInterface is a way to create all types of files and commands.</li>
</ul>

<h3>RUS:</h3>
<p>Пакет предоставляет реализации базовую необходимую объектную модель для работы с хранилищами различных типов:</p>
<ul>
    <li>Классы для создания и настройки запросов: RecordsQueue и ScalarsQueue.</li>
    <li>Классы для создания и настройки комманд: DeleteCommand, SaveCommand, UpdateCommand.</li>
    <li>Интерфейсы и трейты: AbleToRecording, LimitExecutable, AbleToSort содержащие специфичную логику для
        классов и комманд, а так-же вспомогательные методы для тестирования их приемников.</li>
    <li>Узко-специализированные интерфейсы для активностей хранилищ: RecordsDeleteModelInterface,
        RecordsSaveModelInterface, RecordsSearchModelInterface, RecordsUpdateModelInterface, ScalarsSearchModelInterface.</li>
    <li>Интерфейс для хранилища: StorageInterface - способный порождать все указанные выше типы запросов и команд.</li>
</ul>
<hr>

<h2>Requirements / Требования</h2>
<ul>
    <li>PHP >= 7.4</li>
    <li>Composer >=2.0</li>
</ul>
<hr>

<h2>Installation / Установка</h2>
<p>composer require "mnemesong/orm-core"</p>
<hr>

<h2>Table manager / Менеджер таблицы</h2>
<h3>ENG</h3>
<p>A table manager is an object that allows you to interact with a table from any storage.
The Table Manager provides two ways to interact with a table.</p>
<ul>
    <li>Queries - Allows you to get records and statistical information in scalar values from a table.</li>
    <li>Commands - Responsible for actions that change the state of the table: adding, deleting and updating records.</li>
</ul>
<p>In this package, the TableManager is only an interface. TableManager implementations for each concrete type
the storages are in separate packages.</p>

<h3>RUS</h3>
<p>Менеджер таблицы - это объект, который позволяет взаимодействовать с таблицей из любого хранилища.
Менеджер таблицы предоставляет два способа для взаимодействия с таблицей.</p>
<ul>
    <li>Запросы (Queries) - Позволяют получать из таблицы записи и статистистическую информацию в скалярных величинах.</li>
    <li>Комманды (Commands) - Отвечают за действия изменяющие состояние таблицы: добавление, удаление и обновление записей.</li>
</ul>
<p>В данном пакете TableManager представлен только интерфейсом. Реализации TableManager для каждого конкретного типа
хранилища находятся в отдельных пакетах.</p>
<hr>

<h2>License / Лицензия</h2>
- MIT
<hr>

<h2>Contacts / Контакты</h2>
- Anatoly Starodubtsev "Pantagruel74"
- tostar74@mail.ru