<?php
// namespace App\Console\Commands;
namespace Web64\Colors\Commands;

use Illuminate\Console\Command;
use Web64\Colors\Facades\Colors;

class ColorsTest extends Command
{
    protected $signature = 'colors:test {--config}';
    protected $description = 'Example usage of the Colors package';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        echo "\nCurrent Config based styles:\n";
        echo "-------------------------------------\n";
        $colorConfigs = config('colors');
        foreach($colorConfigs as $name => $config_styles)
        {
            Colors::$name("Color::{$name}()");
        }

        if ( $this->option('config') )  return;


        echo "\n\nDefault Text Colors:\n";
        echo "-------------------------------------\n";
        $colors = ['default', 'black', 'red', 'green', 'yellow', 'blue', 'magenta', 'cyan', 'light_gray', 'dark_gray', 'light_red', 'light_green', 'light_yellow', 'light_blue', 'light_magenta', 'light_cyan', 'white'];
        foreach($colors as $style)
            Colors::$style("Colors::{$style}()");


        echo "\n\nDefault Background Colors:\n";
        echo "-------------------------------------\n";
        $backgrounds = ['bg_default', 'bg_black', 'bg_red', 'bg_green', 'bg_yellow', 'bg_blue', 'bg_magenta', 'bg_cyan', 'bg_light_gray', 'bg_dark_gray', 'bg_light_red', 'bg_light_green', 'bg_light_yellow', 'bg_light_blue', 'bg_light_magenta', 'bg_light_cyan', 'bg_white'];
        foreach($backgrounds as $style)
            Colors::$style("Colors::{$style}()");

        echo "\n\nDefault Styles:\n";
        echo "-------------------------------------\n";
        $styles = [ 'bold', 'italic', 'reverse', 'underline'];
        foreach($styles as $style)
            Colors::$style()->text("Colors::{$style}()->text()");

        echo "\n\nShortcut Example:\n";
        echo "-------------------------------------\n";
        Colors::lblue("Colors::lblue('Short version of light_blue')");
        Colors::bold__underline__reverse__blue("Colors::bold__underline__reverse__blue('Long version')");
        Colors::b__u__rev__blue("Colors::b__u__rev__blue('Short version')");

        
        echo "\n\nShortcut Examples:\n";
        echo "-------------------------------------\n";
        Colors::underline()->magenta("Colors::underline()->magenta('With Underline')");
        Colors::lgreen("Colors::lgreen('light green default')");
        Colors::bold()->lgreen("Colors::bold()->lgreen('light green with BOLD!')");
        Colors::reverse()->lblue("Colors::reverse()->lblue('light blue reversed')");
        Colors::underline()->bold()->reverse()->lcyan("Colors::underline()->bold()->reverse()->lcyane('lcyane BOLD underline reverse')");

        echo "\n\nnobr() - echo text without breakline by adding ->nobr():\n";
        echo "-------------------------------------\n";
        Colors::nobr()->red('L');
        Colors::nobr()->green('A');
        Colors::nobr()->yellow('R');
        Colors::nobr()->blue('A');
        Colors::nobr()->magenta('V');
        Colors::nobr()->cyan('E');
        Colors::nobr()->light_gray('L');

        echo "\n\nRainbow() - Random color for each character\n";
        echo "-------------------------------------\n";
        echo "Colors::rainbow('LARAVEL COLORS!!!')\n";
        Colors::rainbow("LARAVEL COLORS!!!");
        echo "\nColors::underline()->bold()->reverse()->rainbow('Rainbow Text!')\n";
        Colors::underline()->bold()->reverse()->rainbow("Rainbow Text!");

        echo "\n\nRainbow() - Marquee Demo\n";
        echo "-------------------------------------\n";
        $_start = time();
        do{
            echo "\r";
            Colors::reverse()->rainbow("LARAVEL CLI COLORS!!!", null, false);
            
            sleep(0.7);
        }while( (time() - $_start) < 5);
        echo PHP_EOL . PHP_EOL;

        $this->logo();
    }

    private function logo()
    {
        $str = "________________________________________________________________________________
         _                              _    ____      _                        
        | |    __ _ _ __ __ ___   _____| |  / ___|___ | | ___  _ __ ___         
        | |   / _` | '__/ _` \ \ / / _ \ | | |   / _ \| |/ _ \| '__/ __|        
        | |__| (_| | | | (_| |\ V /  __/ | | |__| (_) | | (_) | |  \__ \        
        |_____\__,_|_|  \__,_| \_/ \___|_|  \____\___/|_|\___/|_|  |___/        
________________________________________________________________________________
";

        Colors::nobr()->bold()->rainbow($str, 'bg_black');
    }


    public function box_test()
    {
        // https://unicode-table.com/en/#enclosed-alphanumerics ~ 2500
        echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━┓\n";
        echo "┃      Header                     ┃  1  ┃\n";
        echo "┣━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╋━━━━━┫\n";
        echo "┃      Some more text             ┃  2  ┃\n";
        echo "┃      Some more text             ┃  3  ┃\n";
        echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┻━━━━━┛\n";
    }
}
