<?php
$cats = $MODEL['cats']; 
$currentCat = $MODEL['currentCat'];
$items = $MODEL['items'];


?>


<div class="limited">
	<div class="content projects slim">
	
		<!--крамбсы-->
		<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>
		<!--//крамбсы-->
		
		
		<h1>РАБОТЫ СТУДЕНТОВ</h1>
		
		<!--<div class="anons-heading">
			Студия авторского дизайна «OG»  делает проекты для жизни и бизнеса<br> «от эскизного наброска до реализации проекта под ключ»
		</div>-->
		
		<div class="cat-links-wrapper">
		<?php 
		foreach($cats as $cat)
		{?>
			<a href="/<?=LANG?>/student_works/<?=$cat->urlPiece()?>" class="cat-link <?=$cat->id==$currentCat->id ? 'active' : ''?>"><?=$cat->attrs['name']?></a>
		<?php 
		}?>
		</div>
		
		<?php 
		if(count($items) )
		{?>
			<div class="items">
			<?php 
			foreach($items as $item)
			{//vd($item)?>
				
					<a class="item" href="/<?=LANG?>/student_works/<?=$currentCat->urlPiece()?>/<?=$item->urlPiece()?>" title="<?=$item->attrs['name']?>">
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
				if(!(++$i%3))
				{?>
				<div class="clear"></div>
				<?php 
				}?>
			<?php 
			}?>
			</div>
			<div class="clear"></div>
			
			<?php
			//vd($MODEL['totalCount']); 
			?>
			
			<div style="margin-top: 30px; "><?=Funx::drawPages($MODEL['totalCount'], $MODEL['page'], $MODEL['elPP']);?></div>
		<?php 
		}
		else
		{?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Работ нет. 
		<?php 	
		}?>
		
	</div>
</div>



