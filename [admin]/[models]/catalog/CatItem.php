<?php 
class CatItem{
	
	const TBL = 'cat__items';
	
	var   $id
		, $pid
		, $name
		, $active
		, $dateCreated
		, $catTypeCode
		, $idx
		
		, $propValues
		, $propValuesObjs
		, $cat
		;
		
	
	const TREE_ELEMENTS_PER_PAGE = 10; 
	
	
		
	function getList($params)
	{
		//vd($params);
		$ret = array();
		
		$lang = $params['lang'] ? $params['lang'] : LANG;
		$tbl=CatItem::TBL;		
		
		$sql="SELECT * FROM `".$tbl."` WHERE 1 ".self::getListInnerSql($params);
		//vd($sql);
		$qr=DB::query($sql);
		echo mysql_error();
		while($next=mysql_fetch_array($qr, MYSQL_ASSOC))
		{
			$e = self::init($next);
			$ret[] = $e; 
		}
		
		return $ret;
	}
	
	
	
	
	function getCount($params)
	{
		$tbl=Category::TBL;			
		
		$sql="SELECT COUNT(*) FROM `".$tbl."` WHERE 1 ".self::getListInnerSql($params);
		$qr=DB::query($sql);
		echo mysql_error();
		$next = mysql_fetch_array($qr);
		//vd($next);
		
		return $next[0];
	}
	
	
	
	
	
	
	function getChildElementsCount($catType, $id)
	{
		$sql="SELECT COUNT(*) FROM `".self::TBL."` WHERE 1 AND catTypeCode='".strPrepare($catType)."' AND pid=".intval($id)."";
		$qr=DB::query($sql);
		echo mysql_error();
		$next = mysql_fetch_array($qr);
		//vd($next);
		
		return $next[0];
	}
	
	
	
	
	
	function getListInnerSql($params)
	{
		$params['lang'] = $params['lang'] ? $params['lang'] : LANG;
		$params['order'] = $params['order'] ? $params['order'] : "  idx";
		
		$sql.=" 
		".(isset($params['pid']) ? "AND (pid=".strPrepare($params['pid']).")" : "")." 
		".(isset($params['activeOnly']) ? ($params['activeOnly'] ? "AND active='1'" : "" ) : "")."
		".(isset($params['catType']) ? "AND (catTypeCode='".strPrepare($params['catType'])."')" : "")."  
		".($params['additionalClauses'])." 
		".($params['order'] ? " ORDER BY ".$params['order'] : "")." 
		".strPrepare($params['limit'])."
		";
		
		return $sql;
	}
	
	
	
	
	function init($arr)
	{
		$m = new self();
		
		$m->id = $arr['id'];
		$m->pid = $arr['pid'];
		$m->name = $arr['name'];
		$m->dateCreated = $arr['dateCreated'];
		$m->catTypeCode = $arr['catTypeCode'];
		$m->idx = $arr['idx'];
		$m->active = $arr['active'];
		
        return $m;
	}
	
	
	

	
	
	function get($id)
	{
		if($id =intval($id))
		{
			$sql = "SELECT * FROM `".self::TBL."` WHERE id = ".$id;
			$qr=DB::query($sql);
			echo mysql_error();
			if($next = mysql_fetch_array($qr, MYSQL_ASSOC))
				return self::init($next);
		}
	}
	
	
	
	
	
	function insert()
	{
		$this->idx = 9999;
		$sql = "
		INSERT INTO `".self::TBL."` 
		SET 
		dateCreated=NOW(),
		".$this->alterSql()."
		
		";
		//vd($sql);
		$qr=DB::query($sql);
		echo mysql_error();
		return mysql_insert_id();
	}
	
	
	
	function update()
	{
		$sql = "
		UPDATE `".self::TBL."` 
		SET 
		".$this->alterSql()."
		WHERE id=".intval($this->id)."
		";
		vd($sql);
		$qr=DB::query($sql);
		echo mysql_error();
	}
	
	
	
	
	function alterSql()
	{
		$str.="
		`active`='".($this->active ? 1 : 0)."'
		, idx=".intval($this->idx)."
		, `pid`='".intval($this->pid)."'
		, `name`='".strPrepare($this->name)."'
		, `catTypeCode`='".strPrepare($this->catTypeCode)."'
		";
		
		return $str;
	}
	
	
	
	
	function delete($id)
	{
		if($id = intval($id))
		{
			$sql = "
			DELETE FROM `".self::TBL."` WHERE id=".$id;
			DB::query($sql);
			echo mysql_error(); 
		}
	}
	
	
	
	
	
	
	
	function setIdx($id, $val)
	{
		if($id=intval($id))
		{
			$sql = "UPDATE `".self::TBL."` SET idx='".intval($val)."' WHERE id=".$id;
			DB::query($sql);
			echo mysql_error();
		}
	}
	
	
	
	function drawTreeSelect($catType, $pid/*чьих детей отображать*/, $self_id, $idToBeSelected, $level=0 )
	{
		global $_CONFIG;
		
		$lang = $_CONFIG['LANGS'][$lang] ? $lang : LANG;
		$pid=intval($pid);
		$level=intval($level);
		//$type = $essence->jointFields ? Entity2::TYPE_ELEMENTS : Entity2::TYPE_BLOCKS;
		
		$cat = Category::get($pid);	
		if($cat->id == $self_id && $self_id)
			return $ret;
		
		if($cat->id )
		{
			$ret.='
				<option '.($idToBeSelected==$cat->id?' selected="selected"  ':'').' value="'.$cat->id.'">';
				for($i=1; $i<$level; $i++)
				{
					$ret.='------';
				}
				$ret.='| ('.$cat->id.') '.$cat->name;
				$ret.='
				</option>';
		}
		
		#	достаём детей
		$params = array(
						'catType'=>$catType,
						'pid'=>$pid,
						'limit'=>'',
						'type'=>$type, 
						'order'=>'', 
						'lang'=>$lang, 
						'additionalClauses'=>'and 1',
						'activeOnly'=>false,
					);
		$children = Category::getList($params);
		foreach($children as $key=>$child)
		{
			$ret.=self::drawTreeSelect($catType, $child->id, $self_id,  $idToBeSelected,  ($level+1));
		} 
	
		return $ret;
	}
	
	
	
	
	function validate()
	{
		$problems = array();
		//vd($this->propValues);
		if(!$this->name = strPrepare($this->name))
			$problems[] = Slonne::setError("name", 'Введите <b>название</b>!');
		
		
		#	валидация свойств
		foreach($this->cat->class->props as $key=>$prop)
		{
			if($tmp = $prop->validateValue($this->propValues[$prop->code]))
				$problems[] = $tmp;
		}
		
		return $problems;
	}
	
	
	
	
	
	function initValues()
	{
		#	достаём все значения итема! все, включая толпу мультиселектов
		$propValues = CatPropValue::getListByItemId($this->id);
		
		#	В ЭТОМ МАССИВЕ БУДУТ ЛЕЖАТ ВСЕ ЗНАЧЕНИЯ, КРОМЕ МУЛЬТИСЕЛЕКТОВ!
		$valuesArr = null;
		#	расладываем значения в ассоц массив, где ключ - код (чтобы взять значения всех, кроме МУЛЬТИСЕЛЕКТОВ)
		foreach($propValues as $key=>$prop)
		{
			$valuesArr[$prop->propCode] = $prop->value;
			$valuesObjsArr[$prop->propCode] = $prop;
		}
		
		foreach($this->cat->class->props as $key=>$prop)
		{
			$value = null;
			$value = $propValues[$prop->id]->value;
			
			if($prop->type=='select' && $prop->multiple)	#	раскладываем мультиселекты
			{
				foreach($propValues as $key=>$propValue)
				{
					if($prop->code == $propValue->propCode)
					{
						$this->propValues[$prop->code][] = $propValue->value;
						$this->propValuesObjs[$prop->code][] = $propValue;
					}
				}
			}
			else	#	все остальные
			{
				$this->propValues[$prop->code] = $valuesArr[$prop->code];
				$this->propValuesObjs[$prop->code] = $valuesObjsArr[$prop->code];
			}
			
		}

	}

	
	
	
}
?>