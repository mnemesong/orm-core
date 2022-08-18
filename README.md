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

<h2>Queries / Запросы</h2>
<h3>ENG</h3>
<p>This package provides two types of requests:</p>
<h4>1. RecordsQuery</h4>
<p>Allows you to retrieve records from a table as objects of the Structure class (See mnemesong/structure package).</p>
<h6>Methods</h6>
<ul>
    <li><code>sortedBy(string[] $fields): self</code>, <code>withoutSorting(): self</code> - Lets get
        RecordQuery with specified sort fields and their priority.</li>
    <li><code>where(SpecificationInterface $spec): self</code>, <code>andWhere(SpecificationInterface $spec): self</code>,
        <code>orWhere(SpecificationInterface $spec): self</code>- Allows you to get a RecordQuery with a specification
        search.</li>
    <li><code>withOnlyFields(string[] $fields): self</code>, <code>withAllFields(): self</code> - Allows you to get
        RecordQuery indicating which fields to look for when searching.</li>
    <li><code>withLimit(int $limit): self</code>, <code>withoutLimit(int $limit): self</code> - Allows you to get
        RecordQuery specifying the record search limit. Useful when you need to get only the first, or several
        first entries. Use sorting to operate the criteria for selecting the first records.</li>
    <li><code>find(): StructureCollection</code> - Performs a search and returns the found results as an object
        StructureCollection.</li>
</ul>
<h6>Example</h6>
<code>$checkAuthRecord = $someTable->selectRecordsQuery()<br>
->andWhere(Sp::ex('s=', 'login', $inputLogin))<br>
->andWhere(Sp::ex('s=', 'passwordHash', HashTool::hash($inputPass)))<br>
->withLimit(1)<br>
->find()<br>
->getFirstAsserted()</code>

<h4>2. ScalarsQuery</h4>
<p>Allows you to get scalar data sets for records that meet the specified specification as a Structure object
(See package mnemesong/structure).</p>
<h6>Methods</h6>
<ul>
    <li><code>where(SpecificationInterface $spec): self</code>, <code>andWhere(SpecificationInterface $spec): self</code>,
        <code>orWhere(SpecificationInterface $spec): self</code>- Allows you to get a ScalarQuery with a specification
        search.</li>
    <li><code>withAddScalar(ScalarSpecification $spec): self</code> - Allows you to get a ScalarQuery with a query
        another scalar lookup value. </li>
    <li><code>withScalarsFilteredBy(callable $filterFunc): self</code> - Allows you to get a ScalarQuery with a new
        a list of requests for rock values obtained using the filtering function. </li>
    <li><code>find(): Structure</code> - Performs a search and aggregation and returns the found results as an object
        structure. To configure the keys under which the results will be stored, use the method
        <code>ScalarSpecification->withName(string $name)</code>. Then in from the resulting Structure object
        the specified scalar value can be obtained using the Structure->get(string $name): scalar</li> method
</ul>
<h6>Example</h6>
<code>$numOfPotentialCustomers = $someTable<br>
->getScalarsQuery()<br>
->withAddScalar(Scalar::count()->as('customersCount'))<br>
->andWhere(Sp::ex('n>', 'clicksOnBuyButton', 0))<br>
->find()<br>
->get('customersCount')</code>
<hr>

<h3>RUS</h3>
<p>Данный пакет предоставляет два типа запросов:</p>
<h4>1. RecordsQuery</h4>
<p>Позволяет получать из таблицы записи в виде объектов класса Structure (См. пакет mnemesong/structure).</p>
<h6>Методы</h6>
<ul>
    <li><code>sortedBy(string[] $fields): self</code>, <code>withoutSorting(): self</code> - Позволяют получить 
        RecordQuery с указанными полями для сортировки и их приоритетом.</li>
    <li><code>where(SpecificationInterface $spec): self</code>, <code>andWhere(SpecificationInterface $spec): self</code>,
        <code>orWhere(SpecificationInterface $spec): self</code>- Позволяет получить RecordQuery со спецификацией
        поиска.</li>
    <li><code>withOnlyFields(string[] $fields): self</code>, <code>withAllFields(): self</code> - Позволяет получить 
        RecordQuery с указанием какие поля искать при поиске.</li>
    <li><code>withLimit(int $limit): self</code>, <code>withoutLimit(int $limit): self</code> - Позволяет получить
        RecordQuery с указанием лимита поиска записей. Полезно когда надо получить только первую, или несколько
        первых записей. Для опертирования признаков отбора первых записей используйте сортировку.</li>
    <li><code>find(): StructureCollection</code> - Выполнгяет поиск и выдает найденные результаты в виде объекта
        StructureCollection.</li>
</ul>
<h6>Пример</h6>
<code>$checkAuthRecord = $someTable<br>
->selectRecordsQuery()<br>
->andWhere(Sp::ex('s=', 'login', $inputLogin))<br>
->andWhere(Sp::ex('s=', 'passwordHash', HashTool::hash($inputPass)))<br>
->withLimit(1)<br>
->find()<br>
->getFirstAsserted()</code>

<h4>2. ScalarsQuery</h4>
<p>Позволяет получать наборы скалярных данных по записям отвечающим указанной спецификации в виде объекта Structure 
(См. пакет mnemesong/structure).</p>
<h6>Методы</h6>
<ul>
    <li><code>where(SpecificationInterface $spec): self</code>, <code>andWhere(SpecificationInterface $spec): self</code>,
        <code>orWhere(SpecificationInterface $spec): self</code>- Позволяет получить ScalarQuery со спецификацией
        поиска.</li>
    <li><code>withAddScalar(ScalarSpecification $spec): self</code> - Позволяет получить ScalarQuery с запросом
        еще одного скалярного значения поиска. </li>
    <li><code>withScalarsFilteredBy(callable $filterFunc): self</code> - Позволяет получить ScalarQuery с новым
        списком запросо на скаляные значения, полученным с помощью функции фильтрации. </li>
    <li><code>find(): Structure</code> - Выполняет поиск и аггрегацию и выдает найденные результаты в виде объекта
        Structure. Для настройки ключей под которыми будут храниться полученные результаты, используйте метод
        <code>ScalarSpecification->withName(string $name)</code>. Тогда в из полученного Structure объекта
        указанную скалярную величину можно будет получить методом Structure->get(string $name): scalar</li>
</ul>
<h6>Пример</h6>
<code>$numOfPotentialCustomers = $someTable<br>
->getScalarsQuery()<br>
->withAddScalar(Scalar::count()->as('customersCount'))<br>
->andWhere(Sp::ex('n>', 'clicksOnBuyButton', 0))<br>
->find()<br>
->get('customersCount')</code>
<hr>

<h2>License / Лицензия</h2>
- MIT
<hr>

<h2>Contacts / Контакты</h2>
- Anatoly Starodubtsev "Pantagruel74"
- tostar74@mail.ru