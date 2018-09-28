Phinx integration into Nette Framework
--
[![Downloads this Month](https://img.shields.io/packagist/dm/elcheco/nette-phinx-bridge.svg)](https://packagist.org/packages/elcheco/nette-phinx-bridge)
[![License](https://img.shields.io/badge/license-New%20BSD-blue.svg)](https://github.com/elcheco/nette-phinx-bridge/blob/master/license.md)


Extension integrating Phinx commands to contributte/console in Nette Framework using the framework's config file.


Requirements
---

- [Nette/DI](https://github.com/nette/di)
- [contributte/console](https://github.com/contributte/console)
- [robmorgan/phinx](https://github.com/cakephp/phinx)



Install
---
1) ``composer require elcheco/nette-phinx-bridge``
2) Register DI extension 
``` 
extensions:
    phinx: ElCheco\Phinx\Extension
```



Configuration
---

```
phinx:
    paths:
        migrations: "./db/migrations"
    default_migration_table: migrations
    environments:
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
{CONSOLE} phinx:seed-create
{CONSOLE} phinx:seed-run
{CONSOLE} phinx:status  
```
