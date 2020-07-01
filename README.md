# PHPWEB Copy/Paste Detector (PHPWEBCPD)

`phpwebcpd` is a Copy/Paste Detector (CPD) for PHPWEB code. This includes PHP and Twig files

This project is based on Sebastian Bergmann PHPCPD project (https://github.com/sebastianbergmann/phpcpd)

## Installation

Download via Composer

## Usage Example

```
$ php phpwebcpd.phar --fuzzy wordpress-4.9.8
phpwebcpd 1.0.0

Found 66 clones with 3014 duplicated lines in 40 files *.php:

  - /home/sb/wordpress-4.9.8/wp-includes/Requests/IRI.php:358-708 (350 lines)
    /home/sb/wordpress-4.9.8/wp-includes/SimplePie/IRI.php:404-754
.
.
.
  - /home/sb/wordpress-4.9.8/wp-includes/SimplePie/File.php:133-144 (11 lines)
    /home/sb/wordpress-4.9.8/wp-includes/SimplePie/File.php:215-226

0.86% duplicated lines out of 349460 total lines of code *.php.
Average size of duplication is 45 lines, largest clone has 350 of lines

Found 2 clones with 41 duplicated lines in 2 files *.twig:

  - C:\dev\dr\phpweb-cpd\tests\standard_layout.twig:5-32 (27 lines)
    C:\dev\dr\phpweb-cpd\tests\standard_layout2.twig:19-46
.
.
.
  - C:\dev\dr\phpweb-cpd\tests\standard_layout.twig:37-51 (14 lines)
    C:\dev\dr\phpweb-cpd\tests\standard_layout2.twig:75-89

29.50% duplicated lines out of 139 total lines of code *.twig.
Average size of duplication is 20 lines, largest clone has 27 of lines


Time: 1.79 seconds, Memory: 272.00MB
```
