Phinx integration into Nette Framework
--
[![Downloads this Month](https://img.shields.io/packagist/dm/elcheco/nette-phinx-bridge.svg)](https://packagist.org/packages/elcheco/nette-phinx-bridge)
[![License](https://img.shields.io/badge/license-New%20BSD-blue.svg)](https://github.com/elcheco/nette-phinx-bridge/blob/master/license)


Extension integrating Phinx commands to contributte/console in Nette Framework using the framework's config file. 

Note: 
Inspired by (https://github.com/banyacz/phinx-nette-bridge), but updated to latest libraries versions of Nette DI, Phinx and Contribute Console as the author does not communicate.


Requirements
---

- [Nette/DI](https://github.com/nette/di)
- [contributte/console](https://github.com/contributte/console)
- [robmorgan/phinx](https://github.com/cakephp/phinx)



Install
---
1) ``composer require elcheco/nette-phinx-bridge``
2) Register DI extension
 
```neon
extensions:
    phinx: ElCheco\Phinx\Extension
```



Configuration
---

```neon
phinx:
    paths: # directories must exist
        migrations: "./db/migrations"
        seeds: "./db/seeds"
    environments:
        default_migration_table: migrations
        development:
            adapter: mysql
            host: 'localhost'
            name: db_name
            user: root
            pass: '123456'
            port: 3306
            charset: utf8
    version_order: creation
```


Usage
---
```
{CONSOLE} phinx:breakpoint
{CONSOLE} phinx:create
{CONSOLE} phinx:migrate
{CONSOLE} phinx:rollback
{CONSOLE} phinx:seed:create
{CONSOLE} phinx:seed:run
{CONSOLE} phinx:status  
```

Example
---
In my case I have console on path `bin\console`:
```bash
bin\console phinx:create AddNewTable
```
prints the output:
```bash
> using migration paths 
>  - /Users/elcheco/www/project_dir/db/migrations
> using migration base class Phinx\Migration\AbstractMigration
> using default template
> created db/migrations/20180928135219_add_new_table.php
```
or for the seeds:
```bash
bin\console phinx:seed-create FillNewTable
```
it prints:
```bash
> using migration paths 
>  - /Users/elcheco/www/project_dir/db/migrations
> using seed paths 
>  - /Users/elcheco/www/project_dir/db/seeds
> using seed base class Phinx\Seed\AbstractSeed
> created ./db/seeds/FillNewTable.php
```
