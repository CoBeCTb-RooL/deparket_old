<?php
class Wares extends Entity2 
{
	const ESSENCE = 'wares';
	
	CONST LIST_ORDER = 'idx';

	
	function get($id)
	{
		return parent::adapt(__CLASS__, (Entity2::get(self::ESSENCE, $id, Entity2::TYPE_ELEMENTS, LANG)));
	}
	
	
	function getBlock($id)
	{
		return parent::adapt(__CLASS__, (Entity2::get(self::ESSENCE, $id, Entity2::TYPE_BLOCKS, LANG)));
	}

	
	function getBlocks($pid, $limit, $additionalClauses, $order = self::LIST_ORDER)
	{
		$params = array(
			'essenceCode'=>self::ESSENCE,
			'pid'=>$pid,
			'limit'=>$limit,
			'type'=>Entity2::TYPE_BLOCKS, 
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
	
	
	function getElements($pid, $limit, $additionalClauses, $order = self::LIST_ORDER)
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
	
	
	
	
	
	

	
	#	переопределение метода с учётом поля link сущности pages
	function url($module='catalog', $lang)
	{
		$lang = $lang ? $lang : LANG;
		$link = Entity2::url($module, $lang);
		return $link;
	}
	

	
	
	function getTree($id)
	{
		$p = self::get($id);
		if(!$p)
			return;
		
		$arr[$id] = $p;
		$pid = $p->pid;
		while($pid)
		{
			$page = self::get($pid);
			$arr[$page->id] = $page;
			$pid=$page->pid;
		}
		
		return array_reverse($arr, true);
	}
	
	
} 
?>