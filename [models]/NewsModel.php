<?php
class News extends Entity2 
{
	const ESSENCE = 'news';
	
	const LIST_ORDER = 'dt DESC';

	
	function get($id)
	{
		return parent::adapt(__CLASS__, (Entity2::get(self::ESSENCE, $id, Entity2::TYPE_ELEMENTS, LANG)));
	}
	

	function getChildren($pid, $limit, $additionalClauses, $order = self::LIST_ORDER)
	{
		$params = array(
			'essenceCode'=>self::ESSENCE,
			'pid'=>$pid,
			'limit'=>$limit,
			'type'=>Entity2::TYPE_ELEMENTS, 
			'order'=>$order, 
			'lang'=>LANG, 
			'additionalClauses'=>$additionalClauses,
			'activeOnly'=>true,
		);

		$entities = Entity2::getList($params); 
		foreach($entities as $key=>$val)
			$ret[] = parent::adapt(__CLASS__, $val);

		return $ret;
	}
	
	

	
} 
?>