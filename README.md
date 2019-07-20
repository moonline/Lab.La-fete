# La Fete Webapp

## Development

### Setup

1. Install PHP, Composer, Symfony, php-xdebug, SQLite, php-X.Y-sqlite, [ SQLite-browser ]
	* https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/php-development-environment.html
	* https://www.ionos.com/community/hosting/php/install-and-use-php-composer-on-ubuntu-1604/
	* https://symfony.com/download
	* https://www.zyxware.com/articles/5765/how-to-install-php-debugger
	* https://linuxhint.com/install_sqlite_browser_ubuntu_1804/
	* https://stackoverflow.com/questions/948899/how-to-enable-sqlite3-for-php
	* [ https://sqlitebrowser.org/ ]
2. Clone source
3. Install dependencies


### Create database & test data

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```
```bash
generate_test_data.sh
```


### Start development server

```bash
symfony server:start
```
http://localhost:8000



## Development environment (vs-code)

## Usefull extensions
* DotENV
* PHP Debug
* PHP IntelliSense
* Twig
* Preview

## Debugging

https://scotch.io/@chenster/debugging-php-in-visual-studio-code205
http://www.accella.net/knowledgebase/debugging-php-with-visual-studio-code/