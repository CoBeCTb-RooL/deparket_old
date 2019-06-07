<?php 


if($_PARAMS[0])
	$ACTION = 'view';





class TeamController extends MainController{
	
	
	
	function index()
	{
		self::list1();
	}
	
	
	
	
	function list1()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		
		$_GLOBALS['TITLE'] = Slonne::getTitle('Наша команда');
		 
		$MODEL['list'] = Worker::getList();
		//vd($MODEL);
		/*$MODEL['crumbs'][] = '<a href="/">Главная</a>';
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/study">Школа дизайна</a>';
		$MODEL['crumbs'][] = 'Наша команда';*/
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/study" >Обучение</a>';
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/team" style="color: #e51c22; ">Преподаватели и консультанты</a>';
		
		Slonne::view('team/list.php', $MODEL);
	}
	
	
	
	/*function view()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
	
		$_GLOBALS['TITLE'] = Slonne::getTitle('Услуги');
			
		$MODEL['item'] = Worker::get($_PARAMS[0]);
		//vd($MODEL);
		$MODEL['crumbs'][] = '<a href="/">Главная</a>';
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/'.Worker::URL_SECTION.'">Сотрудники</a>';
		$MODEL['crumbs'][] = $MODEL['item']->attrs['name'];
	
		Slonne::view('team/view.php', $MODEL);
	}*/
	
	
	
}


?>