<?php
#	необязательные подключения всякие и инициализация переменных $_GLOBALS для шаблона


$_GLOBALS['MAIN_TITLE'] = $_CONFIG['SETTINGS']['title_postfix'];
$_GLOBALS['TITLE_SEPARATOR'] = $_CONFIG['SETTINGS']['title_separator'];
$_GLOBALS['TITLE'] = $_GLOBALS['MAIN_TITLE'];



#	инициализируем юзера
if($_SESSION['user'])
{
	$_GLOBALS['user'] = User::get($_SESSION['user']['id']);
	if(!$_GLOBALS['user'])
		unset($_SESSION['user']);
}

/*
#	МЕНЮ СЛЕВА
$_GLOBALS['MENU_LEFT']=Page::getChildren(1);
#	МЕНЮ СПРАВА
$_GLOBALS['MENU_RIGHT']=Page::getChildren(44);

# 	текущий модуль
$_GLOBALS['allMenu'] = array_merge($_GLOBALS['MENU_LEFT'], $_GLOBALS['MENU_RIGHT']);
foreach($_GLOBALS['allMenu'] as $item)
{
	
	if(!$item->attrs['link'])
	{
		if($item->url() == $_SERVER['REQUEST_URI'])
			$_GLOBALS['CURRENT_MODULE'] = $item;
	}
	else
	{
		if(strpos($_SERVER['REQUEST_URI'], $item->url())!==false)
			$_GLOBALS['CURRENT_MODULE'] = $item;
	}
}*/

//vd($_GLOBALS['CURRENT_MODULE']);
//vd($tmp);

#	МЕНЮ СЛЕВА
$_GLOBALS['MENU']=Page::getChildren(113);



# 	КАКОЙ ПУНКТ МЕНЮ БУДЕТ ПОДЧЁРКНУТЫЙ
$currentUrl = $_SERVER['REQUEST_URI'];
foreach($_GLOBALS['MENU'] as $key=>$val)
{
	//vd($val->url());
	//vd($pa++);
	//vd(strpos($currentUrl, $val->url()));
	//vd($currentUrl);
	if(strpos($currentUrl, $val->url())!==false)
	{
		$_GLOBALS['CURRENT_MODULE_ID'] = $val->id;
//		break;
	}
}
//vd($_GLOBALS['CURRENT_MODULE_ID']);



define('STRELKI_TEXT', 'Нажмите на изображение, и листайте стрелками');







?>