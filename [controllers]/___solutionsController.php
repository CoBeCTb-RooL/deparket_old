<?php 





$id = intval($_PARAMS[0]);
if($id)
	$ACTION = 'solutionsItem';
	




class SolutionsController extends MainController{
	
	
	
	
	function solutionsItem()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		
		$_GLOBALS['TITLE'] = Slonne::getTitle('Решения');
		 
		$item = Page::get($_PARAMS[0]);
		$_GLOBALS['TITLE'] = Slonne::getTitle($item->attrs['name']);
		#	подРешения
		$item->subs = Page::getChildren($item->id);
		#	доп инфо
		if($item->attrs['param'])
			$item->dopInfo = Page::getChildren($item->attrs['param']);
			
		$MODEL['item'] = $item;
		
		$crumbs[] = '<a href="/">'.$_CONST['ГЛАВНАЯ'].'</a>';
		$crumbs[] = 'Решения</a>';
		$MODEL['crumbs'] = $crumbs;
		
		Slonne::view('solutions/solutionsItem.php', $MODEL);
	}
	
	
	
	
	
	
	
	
	
}


?>