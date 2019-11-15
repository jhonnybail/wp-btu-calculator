<?php

function generate_calculator ($attrs = []) {

    //Custom Attributes
    //extract(shortcode_atts(array("attr" => ""), $atts));

    require( __DIR__ . '/template/calculator.php');
    
}

add_shortcode('btu_calculator', 'generate_calculator');