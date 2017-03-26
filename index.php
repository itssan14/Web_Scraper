<?php

require("view/index.view.php");
include_once ('DOM/simple_html_dom.php') ;
$page = "http://www.etauto.com";
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//GETTING HTML PAGE
$html= new simple_html_dom();
$html -> load_file($page);
global $articles;


/*-----HEADLINES------*/
$headline= $html->find('li[class=story-box clearfix] h1',0) ;
$headline->class="headline";
echo '<h3><b>',$headline->innertext,'</b></h2>';
$headimg= $html->find('li[class=story-box clearfix] div.image',0) ;
echo $headimg;


/*-----ARTICLES------*/
$x=0;
$k=0;
for($j=10,$i=0; $j>=$i ;$i++)
{   
    /*ARTICLE TITLE*/
    $title = $html->find('li[class=story-box clearfix] h2',$i);
    echo '<h3><b>',$title ->innertext,'</b></h3>';
    if ($i!=4 && $i!=6)
    {
        $n = $i%2;
        if ($i!=0 && $n==0 || $i==5) 
        {   
            $x++;
            /*-----IMAGE FETCH-----*/
            $image = $html->find('li[class=story-box clearfix] div.image a',$x);
            echo $image;
            /*-----CONTENT FETCH-----*/
            $content = $html->find('li[class=story-box clearfix] p',$k);
            echo '<div class="content">',$content->innertext,'</div>';
            $k++;
        }
    } 
}
