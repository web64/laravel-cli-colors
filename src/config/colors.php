<?php
/*
Available options

    Styles:
        none, bold, dark, italic, underline, blink, reverse, concealed

    Text Colors:
        default, black, red, green, yellow, blue, magenta, cyan, light_gray, dark_gray,
        light_red, light_green, light_yellow, light_blue, light_magenta, light_cyan, white

    Background Colors:
        bg_default, bg_black, bg_red, bg_green, bg_yellow, bg_blue, bg_magenta, bg_cyan, bg_white, bg_light_gray,
        bg_dark_gray, bg_light_red, bg_light_green, bg_light_yellow, bg_light_blue, bg_light_magenta, bg_light_cyan

Format:
    'themeName' => ['style1','style2'...],


Example:
    config: 'customColor' => ['underline','white','gb_light_blue'],

    usage: Color::customColor("This will output white underlined text on light blue background");


*/

return [

    // Laravel styles
    'line'      => ['light_gray'],
    'info'      => ['green'],
    'comment'   => ['light_yellow'],
    'question'  => ['black', 'bg_light_blue'],
    'error'     => ['white', 'bg_light_red'],
    'warn'      => ['yellow'],

    // Model changed styles
    'created'   => ['black', 'bg_green'],
    'updated'   => ['black', 'bg_yellow'],
    'deleted'   => ['white', 'bg_red'],

    // Background themes
    'bgRed'         => ['light_red', 'bg_red'],
    'bgGreen'       => ['light_green', 'bg_green'],
    'bgYellow'      => ['light_yellow', 'bg_yellow'],
    'bgBlue'        => ['light_blue', 'bg_blue'],
    'bgMagenta'     => ['light_magenta', 'bg_magenta'],
    'bgCyan'        => ['light_cyan', 'bg_cyan'],
    'bgGray'        => ['light_gray', 'bg_dark_gray'],
    'bgLightGray'   => ['dark_gray', 'bg_light_gray'],
    'bgLightRed'    => ['red', 'bg_light_red'],
    'bgLightGreen'  => ['green', 'bg_light_green'],
    'bgLightYellow' => ['yellow', 'bg_light_yellow'],
    'bgLightBlue'   => ['blue', 'bg_light_blue'],
    'bgLightMagenta'=> ['magenta', 'bg_light_magenta'],
    'bgLightCyan'   => ['cyan', 'bg_light_cyan'],
    'bgWhite'       => ['black', 'bg_white'],
    'bgBlack'       => ['white', 'bg_white'],
];
