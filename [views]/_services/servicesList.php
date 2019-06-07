<?php
$list = $MODEL['list']; 
?>


<div class="limited">
	<div class="content services slim telo">
	
		<!--крамбсы-->
		<!--<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>-->
		<!--//крамбсы-->
	</div>	
		
		<h1>Услуги</h1>
		
	<div class="content services slim telo otstup">	
		<div class="wrapper">
		<?php 
		foreach($list as $key=>$item)
		{?>
			<div class="item">
				<div class="pic">
					<a href="<?=$item->url()?>" title="<?=$item->attrs['name']?>"><img src="<?=Media::img2($item->attrs['pic_mini'].'&width=175')?>"></a>
				</div>
				<div class="info">
					<div class="title"><a href="<?=$item->url()?>"><?=$item->attrs['name']?></a></div>
					<div class="text"><?=$item->attrs['anons']?></div>
					<a href="<?=$item->url()?>" class="btn">ПОДРОБНЕЕ</a>
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



