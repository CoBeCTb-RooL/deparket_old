<?php
class Worker extends Entity2 
{
	const ESSENCE = 'workers';
	
	CONST LIST_ORDER = 'idx';
	const URL_SECTION = 'team';

	
	function get($id)
	{
		return parent::adapt(__CLASS__, (Entity2::get(self::ESSENCE, $id, Entity2::TYPE_ELEMENTS, LANG)));
	}
	

	function getList($pid, $limit, $additionalClauses, $order = self::LIST_ORDER)
	{
		$params = array(
			'essenceCode'=>self::ESSENCE,
			'pid'=>$pid,
			'limit'=>$limit,
			'type'=>Entity2::TYPE_ELEMENTS, 
			'order'=>$order, 
			'lang'=>LANG, 
			'additionalClauses'=>'',
			'activeOnly'=>true,
		);

		$entities = Entity2::getList($params); 
		foreach($entities as $key=>$val)
			$ret[] = parent::adapt(__CLASS__, $val);

		return $ret;
	}
	
	
	
	function getListCount($pid, $limit, $additionalClauses, $order = self::LIST_ORDER)
	{
		$params = array(
				'essenceCode'=>self::ESSENCE,
				'pid'=>$pid,
				'limit'=>$limit,
				'type'=>Entity2::TYPE_ELEMENTS,
				'order'=>$order,
				'lang'=>LANG,
				'additionalClauses'=>'',
				'activeOnly'=>true,
		);
	
		return Entity2::getCount($params);
	}
	

	
	#	переопределение метода с учётом поля link сущности pages
	function url()
	{
		return '/'.LANG.'/'.self::URL_SECTION.'/'.$this->urlPiece();
	}
	

	
	
	function getTree($id)
	{
		$p = Page::get($id);
		if(!$p)
			return;
		
		$arr[$id] = $p;
		$pid = $p->pid;
		while($pid)
		{
			$page = Page::get($pid);
			$arr[$page->id] = $page;
			$pid=$page->pid;
		}
		
		return array_reverse($arr, true);
	}
	
	
} 
?>