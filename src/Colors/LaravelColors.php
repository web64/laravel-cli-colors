<?php

namespace Web64\Colors;


class LaravelColors{

    private $config;
    private $consoleColor;
    private $underline = false;
    private $bold = false;
    private $reverse = false;
    private $endofline = PHP_EOL;

    /**
    *    @param array $config
    */
    public function __construct($config)
    {
        $this->config = $config;
        //dump( $this->config );
        $this->consoleColor = new \JakubOnderka\PhpConsoleColor\ConsoleColor();
    }

    /**
    *    @param boolean $value
    */
    public function underline($value = true)
    {
        $this->underline = $value;
        return $this;
    }

    /**
    *    @param boolean $value
    */
    public function bold($value = true)
    {
        $this->bold = $value;
        return $this;
    }

    /**
    *    @param boolean $value
    */
    public function reverse($value = true)
    {
        $this->reverse = $value;
        return $this;
    }

    // 
    /**
    *    Remove breakline
    *
    *    @param string $value End of line character or text
    */
    public function nobr($value = '')
    {
        $this->endofline = $value;
        return $this;
    }

    public function rainbow($text, string $background_style = null)
    {
        $colors = ['red', 'green', 'yellow', 'blue', 'magenta', 'cyan', 'light_gray', 'dark_gray', 'light_red', 'light_green', 'light_yellow', 'light_blue', 'light_magenta', 'light_cyan', 'white'];
    
        $underline = $this->underline;
        $bold = $this->bold;
        $reverse = $this->reverse;

        $text_arr = str_split($text);
        foreach( $text_arr as $char)
        {
            $colorKey = array_rand($colors);
            $_style = $colors[$colorKey];
            if ( !empty($background_style) )
                $_style .= '__'.$background_style;

            $this->nobr()->underline($underline)->bold($bold)->reverse($reverse)->$_style($char);
        }

        $this->underline = false;
        $this->bold = false;
        $this->reverse = false;
    }

    /**
     *  @param array $items
     */
    public function list($items)
    {
        
    }

    /**
     *  @param string $header
     *  @param string $content
     */
    public function box($header, $content = null)
    {
        
    }

    private function _fromConfig($name, $text)
    {
        echo $this->consoleColor->apply( $this->_getStyles($this->config[$name]), $text) . $this->endofline ;
        $this->endofline = PHP_EOL;
    }

    private function _getStyles($styles)
    {
        if ( !is_array($styles) )
            $styles = [$styles];

        if ($this->underline)   $styles[] = 'underline';
        if ($this->bold)        $styles[] = 'bold';
        if ($this->reverse)     $styles[] = 'reverse';

        $this->underline = false;
        $this->bold = false;
        $this->reverse = false;

        return $styles;
    }

    public function __call($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        //echo "Calling object method '$name' " . implode(', ', $arguments). "\n";

        $name = str_replace([
            'lgray',
            'dgray',
            'lred',
            'lgreen',
            'lyellow',
            'lblue',
            'lmagenta',
            'lcyan',    
        ], [
            'light_gray',
            'dark_gray',
            'light_red',
            'light_green',
            'light_yellow',
            'light_blue',
            'light_magenta',
            'light_cyan',  
        ], $name);


        if ( !empty($this->config[$name]) )
        {
            $this->_fromConfig($name, $arguments[0]);
            return;
        }

        if ( strpos($name, "__") )
            $styles = explode("__", $name);
        else
            $styles = $name;

        echo $this->consoleColor->apply(  $this->_getStyles($styles), $arguments[0]) . $this->endofline;
        $this->endofline = PHP_EOL;
    }

    public function test()
    {
        echo "This is a test!"; 
        
        echo "Colors are supported: " . ($this->consoleColor->isSupported() ? 'Yes' : 'No') . "\n";
        echo "256 colors are supported: " . ($this->consoleColor->are256ColorsSupported() ? 'Yes' : 'No') . "\n\n";
        if ($this->consoleColor->isSupported())
        {
            foreach ($this->consoleColor->getPossibleStyles() as $style) {
                echo $this->consoleColor->apply($style, $style) . "\n";
            }
        }
        //return;
        echo "\n";
        // if ($this->consoleColor->are256ColorsSupported())
        // {
        //     echo "Foreground colors:\n";
        //     for ($i = 1; $i <= 255; $i++)
        //     {
        //         echo $this->consoleColor->apply("color_$i", str_pad($i, 6, ' ', STR_PAD_BOTH));
        //         if ($i % 15 === 0) {
        //             echo "\n";
        //         }
        //     }
        //     echo "\nBackground colors:\n";
        //     for ($i = 1; $i <= 255; $i++)
        //     {
        //         echo $this->consoleColor->apply("bg_color_$i", str_pad($i, 6, ' ', STR_PAD_BOTH));
        //         if ($i % 15 === 0) {
        //             echo "\n";
        //         }
        //     }
        //     echo "\n";  
        // }

        if ( $this->consoleColor->are256ColorsSupported() )
        {
            for ($bg = 1; $bg <= 16; $bg++)  
            {
                
                for ($c = 1; $c <= 16; $c++)      
                {
                    echo $this->consoleColor->apply(["bg_color_$bg", "color_$c"], "bg_color_$bg - color_$c -- This is a TEST!! :)\n");
                }

                echo "\n\n";
            }
        }
    }

    public function __logo()
    {
        $str = "
         _                              _    ____      _                
        | |    __ _ _ __ __ ___   _____| |  / ___|___ | | ___  _ __ ___ 
        | |   / _` | '__/ _` \ \ / / _ \ | | |   / _ \| |/ _ \| '__/ __|
        | |__| (_| | | | (_| |\ V /  __/ | | |__| (_) | | (_) | |  \__ \
        |_____\__,_|_|  \__,_| \_/ \___|_|  \____\___/|_|\___/|_|  |___/

";

        $this->nobr()->bold()->rainbow($str, 'bg_black');
    }
}