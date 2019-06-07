<?php 



if(intval($_PARAMS[1]))
	$ACTION='itemView';




class BlogController extends MainController{
	
	const LIST_ELEMENTS_PER_PAGE = 3;
	
	function index()
	{
		self::list1();
	}
	
	
	
	
	function list1()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		
		$_GLOBALS['TITLE'] = Slonne::getTitle('Интересное');
		
		$MODEL['cats'] = Blog::getList($pid=null, Entity2::TYPE_BLOCKS);

		if($_PARAMS[0])
			foreach($MODEL['cats'] as $cat)
				if($cat->id == intval($_PARAMS[0]))
					$currentCat = $cat;

		$currentCat = $currentCat ? $currentCat : $MODEL['cats'][0];
		$MODEL['currentCat']  = $currentCat;
		
		if($currentCat)
		{
			$getParams = Slonne::getParams();
			$elPP = self::LIST_ELEMENTS_PER_PAGE ;
			$page = intval($getParams['p']) ? intval($getParams['p'])-1 : 0;
			if($page)
				$limit=" LIMIT ".($page*$elPP+1).", ".$elPP."";
			else
				$limit=" LIMIT ".($page*$elPP).", ".($elPP+1)."";
			//vd($limit);
			$MODEL['elPP'] = $elPP;
			$MODEL['page'] = $page;
			$MODEL['items'] = Blog::getList($currentCat->id, Entity2::TYPE_ELEMENTS, $limit, '', ' idx desc ');
			foreach($MODEL['items'] as $item)
				$item->cat = $currentCat;
			
			if(!$page)
			{
				$MODEL['mainItem'] = $MODEL['items'][0];
				$tmp=null; 
				foreach($MODEL['items'] as $key=>$val)
					if($key)
						$tmp[] = $val;
				$MODEL['items'] = $tmp;
			}
			
			$MODEL['totalCount'] = Blog::getCount($currentCat->id, Entity2::TYPE_ELEMENTS, $limit='') - 1;
		}
		
		$MODEL['crumbs'][] = '<a href="/">Главная</a>';
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/'.Blog::MODULE.'/">Интересное</a>';
		$MODEL['crumbs'][] = $MODEL['currentCat']->attrs['name'];
		
		
		Slonne::view('blog/itemsList.php', $MODEL);
	}
	
	
	
	function itemView()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
	
	
		$MODEL['item'] = Blog::get($_PARAMS[1], Entity2::TYPE_ELEMENTS);
		if($MODEL['item'])
			$MODEL['item']->cat = Blog::get($MODEL['item']->pid, Entity2::TYPE_BLOCKS);
		
		$_GLOBALS['TITLE'] = Slonne::getTitle($MODEL['item']->attrs['name'].' - Блог');
		
		
		$MODEL['next'] = $MODEL['item']->getNext();
			if($MODEL['next']) $MODEL['next']->cat = $MODEL['item']->cat;
		$MODEL['prev'] = $MODEL['item']->getPrev();
			if($MODEL['prev']) $MODEL['prev']->cat = $MODEL['item']->cat;
			
		
		$MODEL['crumbs'][] = '<a href="/">Главная</a>';
		$MODEL['crumbs'][] = '<a href="/'.LANG.'/'.Blog::MODULE.'">Интересное</a>';
		$MODEL['crumbs'][] = '<a href="'.$MODEL['item']->cat->catUrl().'">'.$MODEL['item']->cat->attrs['name'].'</a>';
		//$MODEL['crumbs'][] = $MODEL['item']->attrs['name'];
	
		Slonne::view('blog/itemView.php', $MODEL);
	}
	
	
	
	
}


?>