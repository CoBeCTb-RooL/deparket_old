<?php 



if(intval($_PARAMS[0]))
	$ACTION='itemView';


//vd($ACTION);

class CatalogController extends MainController{
	
	const LIST_ELEMENTS_PER_PAGE = 6;
	
	
	function index()
	{
		self::list1();
	}
	
	
	
	
	function list1()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		
		$MODEL['item'] = Page::get($_REQUEST['parentId']);
		$_GLOBALS['META_KEYWORDS'] = $MODEL['item']->attrs['meta_keywords'];
		$_GLOBALS['META_DESCRIPTION'] = $MODEL['item']->attrs['meta_description'];
		
		$_GLOBALS['TITLE'] = Slonne::getTitle($MODEL['item']->attrs['name']);
		
		$MODEL['items'] = Page::getChildren($_REQUEST['parentId']);
		$MODEL['title'] = $MODEL['item']->attrs['name'];
		$MODEL['module'] = $MODEL['item']->attrs['param'];
		
		$MODEL['crumbs'][] = '<a href="/'.LANG.'">Главная</a>';
		$MODEL['crumbs'][] = $MODEL['item']->attrs['name'];
		
		
		Slonne::view('catalog/squareItemsList.php', $MODEL);
	}
	
	
	
	function itemView()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
	
		$MODEL['item'] = Page::get($_PARAMS[0]);
		$MODEL['parent'] = Page::get($MODEL['item']->pid);
		$_GLOBALS['TITLE'] = Slonne::getTitle($MODEL['item']->attrs['name']);
		$_GLOBALS['META_KEYWORDS'] = $MODEL['item']->attrs['meta_keywords'];
		$_GLOBALS['META_DESCRIPTION'] = $MODEL['item']->attrs['meta_description'];
		
		//vd($MODEL['item']);
		$MODEL['crumbs'][] = '<a href="/">Главная</a>';
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/'.$MODEL['parent']->attrs['param'].'">'.$MODEL['parent']->attrs['name'].'</a>';
		$MODEL['crumbs'][] = $MODEL['item']->attrs['name'];
	
		Slonne::view('catalog/itemView.php', $MODEL);
	}
	
	
	
	
}


?>