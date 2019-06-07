<?php





$id = intval($_PARAMS[0]);
if($id)
	$ACTION = 'newsItem';
else
	$ACTION = 'newsList';
	




class NewsController extends MainController{
	
	
	static $settings = array(
		'YEARS_NAVIGATION_IN_NEWS_LIST' => true,
	);
	
	
	
	function newsList()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
				
		$_GLOBALS['TITLE'] = Slonne::getTitle($_CONST['заголовок раздела НОВОСТИ']);	
		
		$params = Slonne::getParams();
		$year = intval($params['year']);
		$elPP = 5;
		$page = intval($params['p']) ? intval($params['p'])-1 : 0;
		
	
		$crumbs[] = '<a href="/'.LANG.'">'.$_CONST['ГЛАВНАЯ'].'</a>';
		if($year)
		{
			$crumbs[] = '<a href="'.Entity2::moduleUrl(News::ESSENCE).'">'.$_CONST['заголовок раздела НОВОСТИ'].'</a>';
			$crumbs[] = $year;	
		}
		else 
			$crumbs[] = $_CONST['заголовок раздела НОВОСТИ'];
		$MODEL = $crumbs;
		
		
		$limit=" LIMIT ".$page*$elPP.", ".$elPP."";
		$clause = ($year? " AND YEAR(dt) = '".$year."'" : "") ;
		
		$news = News::getChildren(0, "", ($year? " AND YEAR(dt) = '".$year."'" : "") );
		$totalElements = count($news); 
		$news = News::getChildren(0, $limit, $clause);
	
		//vd($news);
		$MODEL['news'] = $news;
		
		#	работа с годами
		$years [] = $_CONST['ВСЕ']; 
		for($i = date('Y'); $i> (date('Y')-3); $i-- )
		{
			$years[]=$i;
		}
		
		$MODEL['years'] = $years;
		$MODEL['chosenYear'] = $year;
		$MODEL['elPP'] = $elPP;
		$MODEL['page'] = $page;
		$MODEL['totalElements'] = $totalElements;
		$MODEL['settings'] = self::$settings;
		
		
		
		Slonne::view('news/newsList.php', $MODEL);
	}
	
	
	
	
	
	
	function newsItem()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		
		$id=intval($_PARAMS[0]);
		
		$item = News::get($id);
		$_GLOBALS['TITLE'] = Slonne::getTitle($item->attrs['name']);	
		
		#	крошки
		$crumbs = array();
		$crumbs[] = '<a href="/'.LANG.'/">'.$_CONST['ГЛАВНАЯ'].'</a>';
		$crumbs[] = '<a href="/'.LANG.'/news/">'.$_CONST['заголовок раздела НОВОСТИ'].'</a>';
		if($item->attrs)
			$crumbs[] = $item->attrs['name'];
		
		$MODEL['crumbs'] = $crumbs;
		$MODEL['item'] = $item;
		$MODEL['settings'] = $settings;
			
		Slonne::view('news/newsItem.php', $MODEL);
	}
	
	
	
	
}




?>