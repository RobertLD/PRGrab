<?php
/**
 * Plugin Name: PR Grab
 * Plugin URI: http://www.github.com/robertld
 * Description: Grabs press releases and news from OTC Market
 * Version: 1.0
 * Author: Robert DeRienzo
 * Author URI: http://www.github.com/robertld
 */
 
 // requirements
require('simple_html_dom.php');


add_action( 'the_content', 'my_thank_you_text' );

// helper functions

function getURL(){
    
    $symbol = "XTRM";
    $websiteURL = ("https://www.otcmarkets.com/stock/".$symbol."/news");
    return $websiteURL;
}
function getHTML(){
    $html = file_get_html(getURL());
    return $html;
}

function my_thank_you_text ( $content ) {
    return $content .= getNews();
}
$i =0;
function getNews(){
    $i = 0;
    $html = getHTML();
    $news = [];
    foreach ($html->find('div[_1Ji7wDDsE9]') as $new){
        if ($i > 10) {
            break;
        }   
        $news[]= [
            'linkypoo' => $new
        ];
    }
    return $news;
}


