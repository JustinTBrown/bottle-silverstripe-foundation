## Requirements

- RVM, Rbenv, Ruby
- Compser
- Love ❤︎️	

## Install 

- Clone the repo: `git clone git@github.com:btlcreative/bottle-silverstripe-foundation.git [code directory]`
- IMPORTANT - `cd` into the new code directory and remove the old .git: `rm -R .git`
- Then initalize a new repo with `git init` and set up your new project.
- ```$ ln -s [code directory] [apached served directory]```
- ```$ composer self-update```
- ```$ composer install``` or `$ composer update` (you may want to run `$ composer self-update` first if it's been a while)
- ```$ bundle install```
- `$ cd [project-theme directory]` and then `$ bower update` to download Foundation 5 and it's dependencies.

## Database Setup

- Create new database
- ```Grant all on DB_NAME.* to 'DB_USER'@'localhost' identified by 'DB_PASS' with grant option; flush privileges;```
- Add local db credentials to `_config.php`

## Dev Environment

- Turn on [Live Reload Chrome plugin](https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei?hl=en)
- ```$ guard```


## Note
_This is poorly documented. Please update if you get the chance._

![Party](http://media.giphy.com/media/aTUAoYk7Tj87S/giphy.gif)
