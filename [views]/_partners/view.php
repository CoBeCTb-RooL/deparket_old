<?php
$item = $MODEL['item']; 
?>


<div class="partners-view">

	<div class="limited">
		<div class="content slim">
		
			<!--крамбсы-->
			<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>
			<!--//крамбсы-->
			
			
			<h1>Наши партнёры</h1>
			
			
			<div class="top-wrapper">
				<div class="text">
					<h2><?=$item->attrs['name']?></h2>
					<?=$item->attrs['descr']?>
				</div>
				<div class="pic">
					<img src="<?=Media::img($item->attrs['pic'].'&width=100')?>" alt="" />
					
				</div>
				<div class="clear"></div>
			</div>
			
		</div>
	</div>
	
	
	<?php 
	if(count($item->attrs['pics']))
	{?>
	<div class="container limited "><div class="slim krutilka-text"><?=STRELKI_TEXT?></div></div>
	<div class="container slider" id="slider" >
		<?php 
		foreach($item->attrs['pics'] as $pic)
		{?>
		<div class="item "><a href="/<?=UPLOAD_IMAGES_REL_DIR?>/<?=$pic->path?>" onclick="return hs.expand(this)" title="Увеличить"><img src="<?=Media::img($pic->path.'&height=349')?>" alt="" /></a></div>
		<?php 
		}?> 
		
	</div>
	<script>
	$(document).ready(function(){
	  $('#slider').slick({
		  autoplay: true,
		  autoplaySpeed: 2000,
		  slidesToShow: 3,
		  slidesToScroll: 2,
		  infinite: true, 
		  centerMode: true,
		  variableWidth: true,
	  });
	});
	</script>
	<?php 
	}?>
	
	
	
</div>