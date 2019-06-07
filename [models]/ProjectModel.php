<?php
class Project extends Entity2 
{
	const ESSENCE = 'projects';
	
	CONST LIST_ORDER = 'idx';
	const MODULE = 'projects';

	
	function get($id, $type)
	{
		return parent::adapt(__CLASS__, (Entity2::get(self::ESSENCE, $id, $type, LANG)));
	}
	

	function getList($pid, $type, $limit, $additionalClauses, $order = self::LIST_ORDER)
	{
		$params = array(
			'essenceCode'=>self::ESSENCE,
			'pid'=>$pid,
			'limit'=>$limit,
			'type'=>$type, 
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
	
	
	
	function getCount($pid, $type, $limit, $additionalClauses, $order = self::LIST_ORDER)
	{
		$params = array(
				'essenceCode'=>self::ESSENCE,
				'pid'=>$pid,
				'limit'=>$limit,
				'type'=>$type,
				'order'=>$order,
				'lang'=>LANG,
				'additionalClauses'=>'',
				'activeOnly'=>true,
		);
	
		return Entity2::getCount($params);
	}
	
	
	
	
	function getNext()
	{
		$params = array(
				'essenceCode'=>$this->essenceCode,
				'pid'=>$this->pid,
				'limit'=>' limit 1',
				'type'=>$this->type,
				'order'=>' idx ',
				'lang'=>LANG,
				'additionalClauses'=>" AND idx>'".intval($this->idx)."' ",
				'activeOnly'=>true,
		);
		$entities = Entity2::getList($params);
		if($entities )
			$ret = parent::adapt(__CLASS__, $entities[0]);
		return $ret;
	}

	
	function getPrev()
	{
		$params = array(
				'essenceCode'=>$this->essenceCode,
				'pid'=>$this->pid,
				'limit'=>' limit 1',
				'type'=>$this->type,
				'order'=>' idx DESC ',
				'lang'=>LANG,
				'additionalClauses'=>" AND idx<'".intval($this->idx)."' ",
				'activeOnly'=>true,
		);
		$entities = Entity2::getList($params);
		if($entities )
			$ret = parent::adapt(__CLASS__, $entities[0]);
		return $ret;
	}
	
	
	
	#	переопределение метода с учётом поля link сущности pages
	/*function url($lang)
	{
		$lang = $lang ? $lang : LANG;
		$link = $this->attrs['link'] ? str_replace('%LANG%', $lang, $this->attrs['link']) : Entity2::url(self::MODULE, $lang);
		return $link;
	}*/
	
	
	function url()
	{
		return '/'.LANG.'/'.self::MODULE.'/'.$this->cat->urlPiece().'/'.$this->urlPiece();
	}
	
	
	function catUrl()
	{
		return '/'.LANG.'/'.self::MODULE.'/'.$this->urlPiece();
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