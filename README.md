Mathematic Arithmetic Operations

## Usage
You have to install dependencies with composer install

if composer not installed :
First you need to [install composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx).

php-script, which should be started in console like:

`php console.php --action {action}  --file {file}`

Script will take two required parameters:

`{file}` - csv-source file with numbers, where each row contains two numbers between -100 and 100, and

`{action}` - what action should we do with numbers from `{file}`, and can take next values:

* <b>plus</b> - to count summ of the numbers on each row in the {file}
* <b>minus</b> - to count difference between first number in the row and second
* <b>multiply</b> - to multiply the numbers on each row in the {file} 
* <b>division</b> - to divide  first number in the row and second

##Stack 

* PHP7.2+
* PHP Unit 
* PHPStan
