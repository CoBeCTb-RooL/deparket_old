<?php 



if(intval($_PARAMS[0]))
	$ACTION='itemView';


//vd($ACTION);

class ParketController extends MainController{
	
	const LIST_ELEMENTS_PER_PAGE = 6;
	const TITLE = 'Художественный паркет';
	const MODULE = 'parket';
	
	function index()
	{
		self::list1();
	}
	
	
	
	
	function list1()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		
		$_GLOBALS['TITLE'] = Slonne::getTitle(self::TITLE);
		
		$MODEL['item'] = Page::get(116);
		$MODEL['items'] = Page::getChildren(116);
		$MODEL['title'] = self::TITLE;
		$MODEL['module'] = self::MODULE;
		
		$MODEL['crumbs'][] = '<a href="/">'.self::TITLE.'</a>';
		$MODEL['crumbs'][] = 'Мастерская OG';
		
		
		Slonne::view('catalog/squareItemsList.php', $MODEL);
	}
	
	
	
	function itemView()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
	
		$MODEL['item'] = Page::get($_PARAMS[0]);
		$_GLOBALS['TITLE'] = Slonne::getTitle($MODEL['item']->attrs['name'].' - Портфолио');
		
		
		$MODEL['crumbs'][] = '<a href="/">Главная</a>';
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/'.self::MODULE.'">'.self::TITLE.'</a>';
		$MODEL['crumbs'][] = $MODEL['item']->attrs['name'];
	
		Slonne::view('catalog/itemView.php', $MODEL);
	}
	
	
	
	
}


?>