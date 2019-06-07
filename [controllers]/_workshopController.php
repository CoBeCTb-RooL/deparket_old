<?php 


if($_PARAMS[0])
	$ACTION='itemView';




class WorkshopController extends MainController{
	
	const LIST_ELEMENTS_PER_PAGE = 6;
	
	function index()
	{
		self::itemsList();
	}
	
	
	
	
	function itemsList()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		
		$_GLOBALS['TITLE'] = Slonne::getTitle('Мастерская OG');
		
		$MODEL['items'] = Page::getChildren(7);
		
		$MODEL['crumbs'][] = '<a href="/">Главная</a>';
		$MODEL['crumbs'][] = 'Мастерская OG';
		
		
		Slonne::view('workshop/itemsList.php', $MODEL);
	}
	
	
	
	function itemView()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
	
	
		$MODEL['item'] = Page::get($_PARAMS[0]);

		$_GLOBALS['TITLE'] = Slonne::getTitle($MODEL['item']->attrs['name'].' - Мастерская OG');
		
		$MODEL['next'] = $MODEL['item']->getNext();
			if($MODEL['next']) $MODEL['next']->cat = $MODEL['cat'];
		$MODEL['prev'] = $MODEL['item']->getPrev();
			if($MODEL['prev']) $MODEL['prev']->cat = $MODEL['cat'];
			
		
		$MODEL['crumbs'][] = '<a href="/">Главная</a>';
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/workshop">Мастерская OG</a>';
		$MODEL['crumbs'][] = $MODEL['item']->attrs['name'];
	
		Slonne::view('workshop/itemView.php', $MODEL);
	}
	
	
	
	
}


?>