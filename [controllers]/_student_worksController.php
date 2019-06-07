<?php 



if($_PARAMS[1])
	$ACTION='itemView';




class _student_worksController extends MainController{
	
	const LIST_ELEMENTS_PER_PAGE = 6;
	
	function index()
	{
		self::itemsList();
	}
	
	
	
	
	function itemsList()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		
		$_GLOBALS['TITLE'] = Slonne::getTitle('Работы студентов');
		
		$MODEL['cats'] = Page::getChildren(45);

		if($_PARAMS[0])
			foreach($MODEL['cats'] as $cat)
				if($cat->id == intval($_PARAMS[0]))
					$currentCat = $cat;

		$currentCat = $currentCat ? $currentCat : $MODEL['cats'][0];
		$MODEL['currentCat']  = $currentCat;
		
		$getParams = Slonne::getParams();
		$elPP = self::LIST_ELEMENTS_PER_PAGE ;
		$page = intval($getParams['p']) ? intval($getParams['p'])-1 : 0;
		$limit=" LIMIT ".$page*$elPP.", ".$elPP."";
		//vd($limit);
		$MODEL['elPP'] = $elPP;
		$MODEL['page'] = $page;
		$MODEL['items'] = Page::getChildren($currentCat->id, $limit);
		foreach($MODEL['items'] as $item)
			$item->cat = $currentCat;
		$MODEL['totalCount'] = Page::getCount($currentCat->id);
		//vd($MODEL['totalCount'] );
		
		$MODEL['crumbs'][] = '<a href="/">Главная</a>';
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/student_works">Работы студентов</a>';
		$MODEL['crumbs'][] = $MODEL['currentCat']->attrs['name'];
		
		Slonne::view('student_works/itemsList.php', $MODEL);
	}
	
	
	
	function itemView()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
	
	
		$MODEL['item'] = Page::get($_PARAMS[1]);
		$MODEL['cat'] = Page::get($MODEL['item']->pid);
		if($MODEL['item'])
			$MODEL['item']->cat = $MODEL['cat'];
		$_GLOBALS['TITLE'] = Slonne::getTitle($MODEL['item']->attrs['name'].' - Работы студентов');
		
		
		$MODEL['next'] = $MODEL['item']->getNext();
			if($MODEL['next']) $MODEL['next']->cat = $MODEL['cat'];
		$MODEL['prev'] = $MODEL['item']->getPrev();
			if($MODEL['prev']) $MODEL['prev']->cat = $MODEL['cat'];
			
		//vd($MODEL['prev']);
		
		$MODEL['crumbs'][] = '<a href="/">Главная</a>';
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/student_works">Работы студентов</a>';
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/student_works/'.$MODEL['cat']->urlPiece().'">'.$MODEL['cat']->attrs['name'].'</a>';
		$MODEL['crumbs'][] = $MODEL['item']->attrs['name'];
	
		Slonne::view('student_works/itemView.php', $MODEL);
	}
	
	
	
	
}


?>