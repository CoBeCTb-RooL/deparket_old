<?php
$item = $MODEL['item']; 
?>


	<div class="limited">
		<div class="content slim telo ">
		
			<!--крамбсы-->
			<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>
			<!--//крамбсы-->
		</div>	
		<h1><?=$item->attrs['name']?></h1>
		<div class="content services slim telo otstup">
			
			<div class="anons-heading"><?=$item->attrs['anons']?></div>
			
			
			<div class="top-wrapper">
				<div class="text"><?=$item->attrs['descr']?></div>
				<div class="pic">
					<img src="<?=Media::img($item->attrs['main_pic'].'&width=500')?>" alt="" />
					<div class="title"><?=$item->attrs['name']?></div>
					<a href="#" class="modal btn red" onclick="return false; ">ПОЛУЧИТЬ КОНСУЛЬТАЦИЮ ДИЗАЙНЕРА</a>
				</div>
				<div class="clear"></div>
			</div>
			
		</div>
	</div>
	
	
	<?php 
	if(count($item->attrs['pics']))
	{?>
	<div class="container limited telo "><div class="slim krutilka-text"><?=STRELKI_TEXT?></div></div>
	<div class="container slider telo" id="slider" >
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
	
	<div class="limited">
		<div class="content slim telo otstup" >
		
			<?=$item->attrs['descr2'];?>
			
			<a href="#" class="btn  modal" onclick="return false; " style="display: block; max-width: 190px; margin: 0 0 1px 0;    ">ВСТРЕТИТЬСЯ С ДИЗАЙНЕРОМ</a>
			&nbsp;
		</div>
	</div>
	

