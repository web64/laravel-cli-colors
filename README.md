# Laravel CLI COLORS
<p align="center">
    <img src="http://cdn.web64.com/nlp-norway/laravel-colors-2.png" width="400">
</p>

Laravel CLI Colors is a simple package, based on the [jakub-onderka/php-console-color](https://github.com/JakubOnderka/PHP-Console-Color) library, that makes it easy to output text in various colors and styles.

Laravel already comes with some built in styles for the Command class but I often output debug information in other classes and also wanted more flexibility in how to style the output, so I created this package.


Note that the colors and styling features available will depend on your OS and console settings.

## Installation
```bash
composer require web64/laravel-cli-colors
```

To publish the colors.php config file run
```bash
php artisan vendor:publish --provider="Web64\Colors\ColorsServiceProvider" --tag="config"
```
Run this command to see a sample of how use can use Laravel CLI Colors.
```bash
php artisan colors:test 
```

## Quick Start
```php
use Web64\Colors\Facades\Colors;

Colors::red('Red Text');
```
## Default Colors
### Text Colors:
default, black, red, green, yellow, blue, magenta, cyan, light_gray, dark_gray, light_red, light_green, light_yellow, light_blue, light_magenta, light_cyan, white

### Background Colors:
bg_default, bg_black, bg_red, bg_green, bg_yellow, bg_blue, bg_magenta, bg_cyan, bg_white, bg_light_gray, bg_dark_gray, bg_light_red, bg_light_green, bg_light_yellow, bg_light_blue, bg_light_magenta, bg_light_cyan

```php
Colors::light_blue('Light blue text');
Colors::bg_light_blue('Light blue background');
```
## Custom Styles
In the colors.php configuration file you can define your own custom styles. The key of the array will be the name of the static method on the Colors facade and the value is an array of styles to be applied.
```php
// config.php
return [
    'myStyle' => ['bold','blue', 'bg_white'],
    ...
];
```

```php
Colors::myStyle('Bold blue text with white background');
```

# Pre-defined styles
The colors.php config file already has a list of pre-defined styles. Feel free to change, remove or add styles to this configuration file.
```php
// Laravel-style output
Colors::info('Green text');
Colors::question('Black text on light blue background');

// Model changed styles
Colors::created("Green bg to indicate model was created");
Colors::updated("Yellow bg to indicate model was updated");
Colors::deleted("Red bg to indicate model was deleted");

```

# View & Validate Custom Styles
Run this command to see how your custom styles look and if they are any errors.
```bash
php artisan colors:test --config
```

## Inline Styles
To test out styles quickly you can add several styles inline and separate them with a double underscore (__).
```php
Colors::bold__underline__reverse__blue__bg_light_gray("Text..");
```
When you find a style you like you, can add them to the colors.php config.

## Formatting
You can format the text with bold, underline, italic and reverse.
```php
Colors::bold()->red('Bold red text');
Colors::underline()->blue('Underlined blue text');
Colors::italic()->green('Italic green text');
Colors::reverse()->default('Reversed default text and background color');
```

Adding nobr() prevents a newline character from being added, so you can change styles on the same line.
```php
Colors::nobr()->red('U');
Colors::nobr()->white('S');
Colors::blue('A');
``` 

## Shortcuts
Instead of 'light_' and 'dark_' you can just prefix 'l' or 'd'.

For bold, underline and reverse, you can use shortcuts: 'b', 'u' and 'rev'
```php
Colors::b__u__dgray__bg_lcyan('Text');
// Same as 
Colors::bold__underline__dark_gray__bg_light_cyan('Text');
```


## Helper
A helper function is available if you don't want to use the facade.

The first argument is a string or array of styles, with the text to output as the second argument.
```php
colors('red', 'Hello World!');
colors('b__u__red', 'Hello World!');
colors(['bold', 'underline', 'red'], 'Hello World!');
```
## Fun Stuff
Display random colors for each character using the rainbow() function.
```php
// Random text colors:
Colors::rainbow('Text');

// Random background colors:
Colors::reverse()->rainbow('Text');
```

## Samples
![Default Config](https://cdn.web64.com/github/colors-config.png)
![Text Colors](https://cdn.web64.com/github/colors-text.png)
![Background Colors](https://cdn.web64.com/github/colors-background.png)

## Contribute
Let me know if you have any ideas on how to improve this package! 

Leave an issue here or reach out to me on Twitter [@OlavHjertaker](https://twitter.com/OlavHjertaker)