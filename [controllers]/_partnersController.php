<?php 


if($_PARAMS[0])
	$ACTION = 'view';





class PartnersController extends MainController{
	
	
	
	function index()
	{
		self::list1();
	}
	
	
	
	
	function list1()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		
		$_GLOBALS['TITLE'] = Slonne::getTitle('Услуги');
		 
		$MODEL['list'] = Service::getList();
		//vd($MODEL);
		$MODEL['crumbs'][] = '<a href="/">Главная</a>';
		$MODEL['crumbs'][] = 'Услуги';
		
		Slonne::view('services/servicesList.php', $MODEL);
	}
	
	
	
	function view()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
	
		$_GLOBALS['TITLE'] = Slonne::getTitle('Наши партнёры');
			
		$MODEL['item'] = Page::get($_PARAMS[0]);
		//vd($MODEL);
		$MODEL['crumbs'][] = '<a href="/">Главная</a>';
		$MODEL['crumbs'][] = '<a href="javascript:history.go(-1); ">Наши партнёры</a>';
		$MODEL['crumbs'][] = $MODEL['item']->attrs['name'];
	
		Slonne::view('partners/view.php', $MODEL);
	}
	
	
	
}


?>