<?php
$aboutUsText = Page::get(114);
$teamText = Page::get(64);
$workers = Worker::getList(); 

$_GLOBALS['META_KEYWORDS'] = $aboutUsText->attrs['meta_keywords'];
$_GLOBALS['META_DESCRIPTION'] = $aboutUsText->attrs['meta_description'];
?>

		
<div class="container about limited">
	<div class="content services slim telo">
	
		<!--крамбсы-->
		<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>
		<!--//крамбсы-->
	</div>	
	<h1><?=$aboutUsText->attrs['name']?></h1>
	
	<div class="slim content telo ">
	&nbsp;	
		<div ><?=$aboutUsText->attrs['descr']?></div>
	&nbsp;	
	</div>	
		
		
		
		<h1>НАША КОМАНДА</h1>
	<div class="slim team content telo " style="padding: 20px 0 0 0 ;">	
			
			<div class="anons-heading" style="color: #fff; "><?=$teamText->attrs['descr']?></div>
			
			

		<!--команда-->
		<style>
			.team .wrapper .item:nth-child(3n) {margin-right: 86px;   }
			.team .wrapper .item{margin: 0px 30px !important;}
			.slick-prev{ top: 100px; left: 50px; }
			.slick-next{ top: 100px; right: 50px; }
			
			.highslide-controls {display: none;}
		</style>	
		<div class="worker-slides wrapper" id="worker-slides"  style="border: 0px solid red; padding: 0 70px;  ">
			
			<?php 
			foreach($workers as $item)
			{?>
				<div style="padding: 3px 0;  "><?php Slonne::view('team/teamListElementWithPopupPartial.php', $item)?></div>
			<?php 
			}?>
				<!--<div class="clear"></div>-->
			</div>
			<script>
			$(document).ready(function(){
			  $('#worker-slides').slick({
				  autoplay: true,
				  autoplaySpeed: 2000,
				  slidesToShow: 3,
				  slidesToScroll: 4,
				  infinite: true, 
				  centerMode: true,
				  variableWidth: true,
				  
			  });
			});
			</script>
		</div>
		<!--команда-->
		
		<div class="telo otstup"></div>
		
</div>
		
		
		
