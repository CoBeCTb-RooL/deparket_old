<?php 








class OffersController extends MainController{
	
	
	
	function index()
	{
		self::list1();
	}
	
	
	
	
	function list1()
	{
		global $_GLOBALS, $_CONFIG;
		
		$_GLOBALS['TITLE'] = Slonne::getTitle('Проекты');
		 
		$getParams = Slonne::getParams();
		$elPP = 4;
		$page = intval($getParams['p']) ? intval($getParams['p'])-1 : 0;
		$limit=" LIMIT ".$page*$elPP.", ".$elPP."";
		
		$MODEL['elPP'] = $elPP;
		$MODEL['page'] = $page;
		
		$MODEL['list'] = Offer::getList($pid=null, $limit );
		$MODEL['totalCount'] = Offer::getListCount();
		
		
		Slonne::view('offers/offersList.php', $MODEL);
	}
	
	
	
	
}


?>