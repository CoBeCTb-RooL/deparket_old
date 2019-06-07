<?php 



if($_PARAMS[0])
	$ACTION='directionView';




class StudyController extends MainController{
	
	const LIST_ELEMENTS_PER_PAGE = 6;
	
	function index()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		
		$_GLOBALS['TITLE'] = Slonne::getTitle('Портфолио');
		
		$MODEL['text'] = Page::get(70);
		$MODEL['uspeiText'] = Page::get(71);
		$MODEL['directions'] = Direction::getList();
		$MODEL['uspeiItems'] = Direction::getList($pid=null, $limit = ' LIMIT 4 ', ' AND uspeite=1 ');
		$MODEL['kak'] = Page::get(72);
		//vd($MODEL['uspeiItems']);
		//vd($MODEL['directions']);

		/*$MODEL['crumbs'][] = '<a href="/">Главная</a>';
		$MODEL['crumbs'][] = 'Школа дизайна';*/
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/study" style="color: #e51c22; ">Обучение</a>';
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/team">Преподаватели и консультанты</a>';
		
		

		Slonne::view('study/index.php', $MODEL);
	}
	
	
	
	
	
	function directionView()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
	
	
		$MODEL['item'] = Direction::get($_PARAMS[0]);
		$MODEL['kak'] = Page::get(72);
		
		$MODEL['crumbs'][] = '<a href="/">Главная</a>';
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/study">Школа дизайна</a>';
		$MODEL['crumbs'][] = $MODEL['item']->attrs['name'];
	
		Slonne::view('study/directionView.php', $MODEL);
	}
	
	
	
	
}


?>