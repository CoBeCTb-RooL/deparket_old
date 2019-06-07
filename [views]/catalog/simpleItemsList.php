<?php
$item = $MODEL['item'];
$items = $MODEL['items'];
$title = $MODEL['title'];
$module = $MODEL['module'];
?>


<div class="limited">
	<div class="content services slim telo">
	
		<!--крамбсы-->
		<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>
		<!--//крамбсы-->
	</div>	
		
		<h1><?=$title?></h1>
		
	<div class="content services slim telo otstup">	
		<div class="wrapper">
		<?php 
		foreach($items as $key=>$item)
		{
			$url = '/'.LANG.'/'.$module.'/'.$item->urlPiece().'';
		?>
			<div class="item">
				<div class="pic">
					<a href="<?=$url?>" title="<?=$item->attrs['name']?>"><img src="<?=Media::img2($item->attrs['pics'][0]->path.'&width=175')?>"></a>
				</div>
				<div class="info">
					<div class="title"><a href="<?=$url?>"><?=$item->attrs['name']?></a></div>
					<div class="text"><?=$item->attrs['anons']?></div>
					<a href="<?=$url?>" class="btn">ПОДРОБНЕЕ</a>
				</div>
			</div>
			<?php 
			if($key%2)
			{?>
				<div class="clear"></div>
			<?php 
			}?>
		<?php 
		}?>
			<div class="clear"></div>
		</div>
		
		<?php
		//vd($list); 
		?>
	
	</div>
</div>



