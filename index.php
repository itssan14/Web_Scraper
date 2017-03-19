<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

include_once ('DOM/simple_html_dom.php') ;
//GETTING HTML PAGE
$html = file_get_html ('http://www.etauto.com');

//HEADLINES
foreach ($html -> find('li[class=story-box clearfix]') as $target)
{
    $article['title'] = $target->find ('h1', 0);
    $article['img'] = $target ->find('div.image a img.unveil',1);
    foreach ($article as $result)
    {
        echo $result;
    }
}

//ARTICLES
foreach ($html -> find('li[class=story-box clearfix]') as $target)
{
    $article1['title'] = $target->find ('h2', 0);
    $article1['img'] = $target ->find('div.image a', 0);
    $article1['paragraph'] = $target ->find('p', 0);
    foreach ($article1 as $ret)
    {
        echo $ret;
    }

}

//WIDGETS - COL 1
foreach ($html -> find('div.widget',1) as $sld)
{
    echo $sld;
}

//WIDGETS - COL 2
foreach ($html -> find('div.wdgt', 2) as $sld)
{
    echo $sld;
}






