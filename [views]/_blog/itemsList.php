<?php
$cats = $MODEL['cats']; 
$currentCat = $MODEL['currentCat'];
$items = $MODEL['items'];
$mainItem = $MODEL['mainItem'];

?>


<div class="limited">
	<div class="content blog slim">
	
		<!--крамбсы-->
		<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>
		<!--//крамбсы-->
		
		
		<h1><?=$currentCat->attrs['name']?></h1>
		
		<!--<div class="anons-heading">
			Студия авторского дизайна «OG»  делает проекты для жизни и бизнеса<br> «от эскизного наброска до реализации проекта под ключ»
		</div>-->
		
		<div class="cat-links-wrapper">
		<?php 
		foreach($cats as $cat)
		{?>
			<a href="<?=$cat->catUrl()?>" class="cat-link <?=$cat->id==$currentCat->id ? 'active' : ''?>"><?=$cat->attrs['name']?></a>
		<?php 
		}?>
		</div>
		
		<?php 
		if(count($items) )
		{?>
		
			<?php
			if($mainItem)
			{?>
				<div class="main-item">
					<div class="info">
						<div class="date"><?=Funx::mkDate($mainItem->attrs['dt'])?></div>
						<a href="<?=$mainItem->url()?>" class="title"><?=$mainItem->attrs['name']?></a>
						<div class="anons"><?=$mainItem->attrs['anons']?></div>
					</div>
					<div class="pic" style="background-image: url(<?=Media::img($mainItem->attrs['pic'])?>)"></div>
				</div>
			<?php 
			}?>
			
			<div class="items">
			<?php 
			foreach($items as $item)
			{//vd($item)?>
				<div class="item">
					<div class="info">
						<div class="date"><?=Funx::mkDate($item->attrs['dt'])?></div>
						<a href="<?=$item->url()?>" class="title"><?=$item->attrs['name']?></a>
						<div class="anons"><?=$item->attrs['anons']?></div>
					</div>
					<a href="<?=$item->url()?>" title="<?=$item->attrs['name']?>"><div class="pic" style="background-image: url(<?=Media::img($item->attrs['pic'])?>)"></div></a>
				</div>
			<?php 
			}?>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			
			
			<div style="margin-top: 30px; "><?=Funx::drawPages($MODEL['totalCount'], $MODEL['page'], $MODEL['elPP']);?></div>
		<?php 
		}
		else
		{?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Статей нет. 
		<?php 	
		}?>
		
	</div>
</div>



