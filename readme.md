# specific questionnaire.

This site implements a specific questionnaire. 

## Some points

But demonstrates some interesting tehniques:

 * config as singleton class (static methods and variables, constants);
 * config loads core files;
 * simple template engine;
 * classifiers;
 * translation engine. but can be implemented with classifiers;
 * database wrapper with basic queries. the next abstraction layer will be CRUD.

## Prerequisites

The PHP module `pdo_mysql` or `pdo_sqlite` is required. 

## Installation

No automatic installation at the moment. Create database, import schema and data, create user:

```
$ sqlite3 database.sqlite < sql/structures.sql
$ php cli/users.php --add --username=tester --password=tested --email=some@email.com
```

## TODO

 * introduce page interface:
   * get_content() - returns default page content
   * handle($request) - returns data object for API
 * rewrite stages to pages;
 * combine stage (feature page) engine with stage template (view) and page JS event generator;