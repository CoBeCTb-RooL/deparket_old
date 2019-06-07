<?php

$cat = $MODEL['cat'];
$catType = $MODEL['catType'];



$list = $MODEL['list'];
$order = $MODEL['order'];
$desc = $MODEL['desc'];
$totalCount = $MODEL['totalCount'];
$elPP = $MODEL['elPP'];
$p = $MODEL['p'];


//vd($list);
//vd($totalCount);
//vd($p);
//vd($order);
//vd($desc);
//vd($e);
//vd($essence);
//vd($essence);
foreach($essence->fields[$type] as $key=>$field)
	if($field->displayed)
		$displayedFields[] = $field;
		
$UP_SIGN = '&#9650;';
$DOWN_SIGN = '&#9660;';

$modelForTopPartial = array('cat'=>$cat, 'catType'=>$catType, 'lang'=>$lang, 'headingPostfix'=>' : Список элементов'); 
//$modelForTopPartial = array('essence'=>$essence, 'entity'=>$e, 'type'=>$type)
?>



<?php
if(!$error)
{?>
	
	
	<a href="#view" onclick="Slonne.Catalog.Interface.treeNameClick('<?=$cat->id ?>');  return false;" style="position: absolute; margin-top: -14px;">&larr; назад</a>
	
	
	<?=Slonne::view('catalog/interface/catTopPartial.php', $modelForTopPartial)?>
	
	<span class="fa fa-th"></span> Элементы:
	
	<?php
	
	if(count($list))
	{?>
	<form id="list-form" method="post" action="/<?=ADMIN_URL_SIGN?>/catalog/interface/itemsListSaveChanges" target="frame1" onsubmit="Slonne.Catalog.Interface.listSaveChanges();  ;  ">
		<input type="hidden" name="lang" value="">
		
		<table class="t" width="100%" border="1">
			<tr>
				<th style="width: 1px;">#</th>
				<th width="1"><a href="#order" onclick="Slonne.Catalog.Interface.itemsList('<?=$e->id ?>', '<?=$type?>', 'active', '<?=($order == 'active' && !$desc ? 1 : 0)?>'); return false; ">Акт. <?=($order=='active' ? ($desc ? $DOWN_SIGN : $UP_SIGN) : '')?></a></th>
				<th width="1"></th>
				<th width="1"><a href="#order" onclick="Slonne.Catalog.Interface.itemsList('<?=$e->id ?>', '<?=$type?>', 'id', '<?=($order == 'id' && !$desc ? 1 : 0)?>'); return false; ">id <?=($order=='id' ? ($desc ? $DOWN_SIGN : $UP_SIGN) : '')?></a></th>
				<th width="1"><a href="#order" onclick="Slonne.Catalog.Interface.itemsList('<?=$e->id ?>', '<?=$type?>', 'name', '<?=($order == 'name' && !$desc ? 1 : 0)?>'); return false; ">Наименование <?=($order=='name' ? ($desc ? $DOWN_SIGN : $UP_SIGN) : '')?></a></th>
	
		<?php
		//vd($cat);
		foreach($cat->class->props as $key=>$prop)
		{?>
			<th><?=$prop->nameOnSite?></th>
		<?php 
		}?>
	
				<th width="1"><a href="#order" onclick="Slonne.Catalog.Interface.itemsList('<?=$e->id ?>', '<?=$type?>', 'idx', '<?=($order == 'idx' && !$desc ? 1 : 0)?>'); return false; ">Сорт. <?=($order=='idx' ? ($desc ? $DOWN_SIGN : $UP_SIGN) : '')?></a></th>
				<th class="del" width="1">Удалить</th>
			</tr>
	<?php
	$i = 0;
	foreach($list as $key=>$e)
	{
		++$i;
		?>
			<tr id="row-<?=$e->id?>" class=" <?=!$e->active ? 'inactive' : ''?>"  ondblclick="Slonne.Catalog.Interface.itemEdit('<?=$e->id?>', '<?=$e->pid?>', Slonne.Catalog.Interface.LANG);" >
				<td class="middle center"><?=$i?></td>
				<td class="center active-cb-wrapper">
					<img src="/<?=ADMIN_DIR?>/img/tree-loading.gif" class="loading" style="display: none">
					<input type="checkbox" id="active-<?=$e->id?>" name="active[<?=$e->id?>]" <?=($e->active ? ' checked="checked" ' : '')?> onclick="Slonne.Catalog.Interface.changeActive(<?=$e->id?>)">
				</td>
				<td class="center"><a href="#edit" onclick="Slonne.Catalog.Interface.itemEdit('<?=$e->id?>', '<?=$e->pid?>', Slonne.Catalog.Interface.LANG); return false;">ред.</a></td>
				<td class="center">
					<?=$e->id?>
					<? if($e->untouchable)
					{?>
						<br><i class="fa fa-lock"></i>
					<?php 	
					}?>
				</td>
				<td ><b><?=$e->name?></b></td>
				
		<?php
		//vd($e->propValues);
		foreach($cat->class->props as $key=>$prop)
		{?>
			<td><?=$prop->backendListOutput($e->propValuesObjs[$prop->code])?></td>
		<?php 
		}?>
				
				<td ><input type="text" name="idx[<?=$e->id?>]" size="2" value="<?=$e->idx?>" /></td>
				<td class="del center" ><input type="checkbox" name="del[<?=$e->id?>]" /></td>
			</tr>
	<?php 
	} 
	?>
		</table>
		
		
		<input id="save-idx-list-btn" type="submit" value="Сохранить изменения" />	
	</form>		
	
	<p>
	<?=drawPages($totalCount, $p, $elPP, $onclick="Slonne.Catalog.Interface.itemsList(Slonne.Catalog.Interface.LIST_SETTINGS.pid, Slonne.Catalog.Interface.LIST_SETTINGS.type, Slonne.Catalog.Interface.LIST_SETTINGS.order, Slonne.Catalog.Interface.LIST_SETTINGS.desc, ###)", $class="pages");?>
	
	
	<?php 
	}
	else
		echo 'Список пуст. ';
	?>
	
	
<?php 	
}
else 
{
	echo $error;
}
?>

