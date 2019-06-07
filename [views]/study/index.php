<?php
$text = $MODEL['text'] ;
$directions = $MODEL['directions'];
$uspeiText = $MODEL['uspeiText'];
$uspeiItems = $MODEL['uspeiItems'];
?>





<div class="container content study">
	<div class="limited ">
		<div class="slim">
			
			<!--крамбсы-->
			<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>
			<!--//крамбсы-->
			
			
			<h1>ШКОЛА ДИЗАЙНА</h1>
			<div class="anons-heading"><?=$text->attrs['anons']?></div>
			
			<div ><?=$text->attrs['descr']?></div>
			
			<div class="directions">
				<ul>
				<?php 
				foreach($directions as $item)
				{?>
					<li><a href="<?=$item->url()?>"><?=$item->attrs['name']?></a></li>
				<?php 
				}?>
				</ul>
			</div>
			
			
			<div class="uspei">
				<h1>УСПЕЙ ЗАПИСАТЬСЯ</h1>
				<div class="anons-heading"><?=$uspeiText->attrs['anons']?></div>
				<div><?=$uspeiText->attrs['descr']?></div>
				
				<div class="items">
				<?php
				foreach($uspeiItems as $item)
				{?>
					<div class="item">
						<a href="<?=$item->url()?>" class="title"><?=$item->attrs['name']?></a>
						<div class="blocks">
							<div class="pic"><a href="<?=$item->url()?>" title="<?=$item->attrs['name']?>"><img src="<?=Media::img($item->attrs['pic'].'&width=171&height=171')?>" alt="<?=$item->attrs['name']?>" /></a></div>
							<div class="info">
								<div class="text"><?=$item->attrs['anons']?></div>
								<input type="button" class="modal" value="ЗАПИСАТЬСЯ"/>
							</div>
						</div>
					</div>
				<?php 
				}?>
					<div class="clear"></div>
				</div>
			</div>
	
		</div>
		
		
		<div style="margin-top: -20px; ">
			<?php Slonne::view('study/kakProxodyat.php', $MODEL['kak'])?>
			<div style="text-align: center; "><?=$MODEL['kak']->attrs['descr']?></div>
		</div>
		
		
	</div>
</div>