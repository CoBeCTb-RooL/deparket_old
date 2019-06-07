<?php 


class PortfolioController extends MainController{
	
	
	
	function index()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		
		$MODEL['item'] = Page::get(119);
		$_GLOBALS['TITLE'] = Slonne::getTitle('Портфолио');
		$_GLOBALS['META_KEYWORDS'] = $MODEL['item']->attrs['meta_keywords'];
		$_GLOBALS['META_DESCRIPTION'] = $MODEL['item']->attrs['meta_description'];
		
		
		$MODEL['crumbs'][] = '<a href="/">Главная</a>';
		$MODEL['crumbs'][] = 'Портфолио';
		
		
		Slonne::view('catalog/itemView.php', $MODEL);
	}
	
	
	
	
}


?>