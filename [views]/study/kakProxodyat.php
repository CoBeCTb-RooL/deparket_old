<?
$kak = $MODEL;
//vd(); 
?>
<h1 class="limited"><?=$kak->attrs['name']?></h1>
<div class="kak-proxodyat telo limited ">
	<div class="text center slim" style="padding: 0 150px;"><?=$kak->attrs['descr']?></div>
	
	<div class="items">
	<?php 
	foreach($kak->attrs['pics'] as $item)
	{?>
		<div class="item">
			<a href="/<?=UPLOAD_IMAGES_REL_DIR.$item->path?>" onclick="return hs.expand(this)"><img src="<?=Media::img($item->path.'&width=250&height=166')?>" alt="" /></a>
		</div>
	<?php 
	}?>
		<div class="clear"></div>
	</div>
	
</div>