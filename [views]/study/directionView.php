<?php
$item = $MODEL['item'];
$crumbs = $MODEL['crumbs'];

//vd($item);

?>


<div class="limited">
	<div class="content study direction slim">
	
		<!--крамбсы-->
		<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>
		<!--//крамбсы-->
		
		
		<h1>Школа дизайна</h1>
		
		<div class="anons-heading">
			<?=$item->attrs['name']?>
		</div>
		
		
		
		<div class="item">
			<div class="pic"><a href="/<?=UPLOAD_IMAGES_REL_DIR.$item->attrs['pic']?>" onclick="return hs.expand(this)"><img src="<?=Media::img($item->attrs['pic'].'&width=171&height=171')?>" alt="<?=$item->attrs['name']?>" /></a></div>
			<div class="info">
				<div class="text"><?=$item->attrs['descr_mini']?></div>
				<input type="button" class="modal" value="ЗАПИСАТЬСЯ"/>
			</div>
			<div class="main-text"><?=$item->attrs['descr']?></div>
		</div>
		
			
		
		
		
		
		
		<div style="margin-top: 60px; ">
			<?php Slonne::view('study/kakProxodyat.php', $MODEL['kak'])?>
			<div style="text-align: center; "><?=$MODEL['kak']->attrs['descr']?></div>
		</div>
		
	</div>
</div>


