# PHPWEB Copy/Paste Detector (PHPWEBCPD)

`phpwebcpd` is a Copy/Paste Detector (CPD) for PHPWEB code.
This project check the following type of files for duplicates:

- PHP
- JS
- TWIG
- CSS
- SCSS

This project is based on Sebastian Bergmann PHPCPD project (https://github.com/sebastianbergmann/phpcpd)

## Installation

Download via Composer composer require enriquesomolinos/phpweb-cpd

## Usage Example

```
$ php phpwebcpd --fuzzy tests
phpwebcpd 1.0.0

Found 1 clones with 59 duplicated lines in 1 files *.php:

  - C:\phpweb-cpd\tests\fixture\Math.php:75-134 (59 lines)
    C:\phpweb-cpd\tests\fixture\Math.php:139-198

8.45% duplicated lines out of 698 total lines of code *.php.
Average size of duplication is 59 lines, largest clone has 59 of lines

Found 1 clones with 20 duplicated lines in 2 files *.twig:

  - C:\phpweb-cpd\tests\twig\contact.twig:1-21 (20 lines)
    C:\phpweb-cpd\tests\twig\contact2.twig:1-21

52.63% duplicated lines out of 38 total lines of code *.twig.
Average size of duplication is 20 lines, largest clone has 20 of lines

Found 1 clones with 15 duplicated lines in 2 files *.js:

  - C:\phpweb-cpd\tests\js\Plane.js:1-16 (15 lines)
    C:\phpweb-cpd\tests\js\Vehicle.js:1-16

53.57% duplicated lines out of 28 total lines of code *.js.
Average size of duplication is 15 lines, largest clone has 15 of lines

Found 1 clones with 18 duplicated lines in 2 files *.css:

  - C:\phpweb-cpd\tests\css\sample.css:5-23 (18 lines)
    C:\phpweb-cpd\tests\css\sample2.css:5-23

45.00% duplicated lines out of 40 total lines of code *.css.
Average size of duplication is 18 lines, largest clone has 18 of lines

Found 1 clones with 146 duplicated lines in 2 files *.scss:

  - C:\phpweb-cpd\tests\scss\button.scss:14-160 (146 lines)
    C:\phpweb-cpd\tests\scss\button2.scss:14-160

43.71% duplicated lines out of 334 total lines of code *.scss.
Average size of duplication is 146 lines, largest clone has 146 of lines

Time: 00:00.882, Memory: 6.00 MB

```
