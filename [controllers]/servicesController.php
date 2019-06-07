<?php 


if($_PARAMS[0])
	$ACTION = 'view';





class ServicesController extends MainController{
	

	function index()
	{
		self::list1();
	}
	
	
	
	
	function list1()
	{
		
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		
		$MODEL['item'] = Page::get($_REQUEST['parentId']);
		$_GLOBALS['TITLE'] = Slonne::getTitle($MODEL['item']->attrs['name']);
		$_GLOBALS['META_KEYWORDS'] = $MODEL['item']->attrs['meta_keywords'];
		$_GLOBALS['META_DESCRIPTION'] = $MODEL['item']->attrs['meta_description'];
		
		$MODEL['items'] = Page::getChildren($_REQUEST['parentId']);
		$MODEL['title'] = $MODEL['item']->attrs['name'];
		$MODEL['module'] = $MODEL['item']->attrs['param'];
		
		$MODEL['crumbs'][] = '<a href="/'.LANG.'">Главная</a>';
		$MODEL['crumbs'][] = 'Услуги';
		
		
		Slonne::view('catalog/simpleItemsList.php', $MODEL);
	}
	
	
	
	function view()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
	
		$MODEL['item'] = Page::get($_PARAMS[0]);
		$_GLOBALS['TITLE'] = Slonne::getTitle($MODEL['item']->attrs['name']);
		$_GLOBALS['META_KEYWORDS'] = $MODEL['item']->attrs['meta_keywords'];
		$_GLOBALS['META_DESCRIPTION'] = $MODEL['item']->attrs['meta_description'];
		
		$MODEL['parent'] = Page::get($MODEL['item']->pid);
		
		$MODEL['crumbs'][] = '<a href="/'.LANG.'">Главная</a>';
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/'.$MODEL['parent']->attrs['param'].'">'.$MODEL['parent']->attrs['name'].'</a>';
		$MODEL['crumbs'][] = $MODEL['item']->attrs['name'];
	
		Slonne::view('catalog/itemView.php', $MODEL);
	}
	
	
	
}


?>