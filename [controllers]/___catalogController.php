<?php



$params = Slonne::getParams();


$id = intval($_PARAMS[0]);
if($id)
	$ACTION = 'item';
else
	$ACTION = 'catsList';
	

//vd($ACTION);


class CatalogController extends MainController{
	
	
	
	
	function catsList()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
				
		$_GLOBALS['TITLE'] = Slonne::getTitle("Каталог");	
		
		
		$getParams = Slonne::getParams();
		//vd($getParams);
		$cats = $_GLOBALS['CATS'];
		//vd($cats);
		
		if($getParams['item'])
		{
			$item = Wares::get($getParams['item']);
			if($item)
				$getParams['cat'] = $item->pid;
		}
		
		
		//vd($getParams);
		if($getParams['cat'])
		{
			foreach($cats as $key=>$val)
			{
				if($val->id == $getParams['cat'])
				{
					$cat = $val->subs[0];
					//$cat = $val;
					//vd($val);
					break;
				}
				
				foreach($val->subs as $key2=>$val2)
				{
					if($val2->id == $getParams['cat'])
					{
						$cat = $val2;
						break;
					}
				}
			}
		}
		else
		{
			$cat = $_GLOBALS['CATS'][0]->subs[0];
		}
		
				
		if($cat)
		{
			
			if($cat->pid)
			{
				foreach($cats as $key=>$val)
					if($val->id == $cat->pid)
						$globalCat=$val;
			}
			else 
				$globalCat = $cat;
		}
		else
			$cat = $globalCat = $_GLOBALS['CATS'][0];
		
		$MODEL['cats'] = $cats;
		$MODEL['globalCat'] = $globalCat;
		$MODEL['cat'] = $cat;
		$MODEL['items'] = Wares::getElements($cat->id);
		$MODEL['item'] = $item;
		
		
		
		
		Slonne::view('catalog/cat.php', $MODEL);
	}
	
	
	
	
	
	
	function item()
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