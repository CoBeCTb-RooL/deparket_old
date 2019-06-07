<?php

$MODEL['aboutText'] = Page::get(92);

$MODEL['portfolio'] = Page::get(119);

$MODEL['plitka'] = Page::getChildren(98);

$MODEL['services'] = Page::getChildren(115);

$MODEL['kakProxodyat'] = Page::get(72);

Slonne::view('index/index.php', $MODEL); 


class indexController extends MainController{}
?>