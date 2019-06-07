<?php

$_GLOBALS['TITLE'] = Slonne::getTitle('О компании');

$MODEL['crumbs'][] = '<a href="/'.LANG.'">Главная</a>';
$MODEL['crumbs'][] = 'О компании';

Slonne::view('about/about.php', $MODEL);


class aboutController extends MainController{
}

?>