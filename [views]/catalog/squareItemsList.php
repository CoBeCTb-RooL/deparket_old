<?php
$item = $MODEL['item'];
$items = $MODEL['items'];
$title = $MODEL['title'];
$module = $MODEL['module'];
?>


<div class="limited">
	<div class="content square slim telo" >
	
		<!--крамбсы-->
		<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>
		<!--//крамбсы-->
	</div>
		
		<h1><?=$title?></h1>
	
	<div class="content workshop slim telo otstup" >	
		<div class="anons-heading ">
			<?=$item->attrs['anons']?>
		</div>
		
		<div class="descr slim center"><?=$item->attrs['descr']?></div>
		
		
		
		<?php 
		if(count($items) )
		{?>
			<div class="items center">
			<?php
			$i=0; 
			foreach($items as $item)
			{?>
				
					<a class="item" href="/<?=LANG?>/<?=$module?>/<?=$item->urlPiece()?>" title="<?=htmlspecialchars($item->attrs['name'])?>">
						<div class="pics">
						<?php 
						foreach($item->attrs['pics'] as $picNum=>$pic)
						{
							if($picNum==4)break; ?>
							<img src="<?=Media::img($pic->path.'&width=152&height=152')?>" alt="" />
						<?php 
						}?>	
							<div class="clear"></div>
						</div>
						<div class="title"><?=$item->attrs['name']?></div>
					</a>
				
				<?php 
				if(!(++$i%2))
				{?>
				<div class="clear"></div>
				<?php 
				}?>
			<?php 
			}?>
			</div>
			<div class="clear"></div>
			
			
			<div style="margin-top: 30px; "><?=Funx::drawPages($MODEL['totalCount'], $MODEL['page'], $MODEL['elPP']);?></div>
		<?php 
		}
		else
		{?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Проектов нет. 
		<?php 	
		}?>
		
	</div>
</div>



