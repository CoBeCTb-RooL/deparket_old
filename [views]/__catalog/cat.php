<?php
$cats = $MODEL['cats'];
$cat = $MODEL['cat'];
$globalCat = $MODEL['globalCat'];
$item = $MODEL['item'];
//vd($cat);
//vd($MODEL);
//vd($globalCat);
?>

	

<div class="cat">
	<h1 class="with-arrow">
		<?=$globalCat->attrs['name']?>
		<a href="#more" onclick="$('.hidden-global-cats').slideToggle(); return false; " class="arrow"><img src="/img/tag-right.png" alt="" /></a>
		<div class="hidden-global-cats">
		<?php
		foreach($cats as $key=>$val)
		{	
			if($val->id == $globalCat->id) continue; ?>
			<a href="<?=Entity2::moduleUrl('catalog').'/cat_'.$val->urlPiece() ?>"><?=$val->attrs['name']?></a><br/>
		<?php 	
		}?>
		</div>
	</h1>
	
	
	<div class="subcats">
	<?
	foreach($globalCat->subs as $key=>$subcat)
	{?>
		<a href="<?=Entity2::moduleUrl('catalog').'/cat_'.$subcat->urlPiece()?>" class="<?=($subcat->id == $cat->id ? 'active' : '')?>"><?=$subcat->attrs['name']?></a>
	<?php 	
	}?>
	</div>
	
	
	<?
	if($item)
		Slonne::view('catalog/itemPartial.php', $MODEL);
	else
		Slonne::view('catalog/itemsListPartial.php', $MODEL);
	?>
	
</div>