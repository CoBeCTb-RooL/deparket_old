<?php
$item = $MODEL['item'];
$crumbs = $MODEL['crumbs'];

//vd($item);

?>


<div class="limited">
	<div class="content slim telo">
	
		<!--крамбсы-->
		<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>
		<!--//крамбсы-->
		
	</div>	
		<h1><?=$item->attrs['name']?></h1>
	
	<div class="content workshop slim telo otstup">	
		<div class="anons-heading">
			<!--<?=$item->attrs['name']?>-->
		</div>
		
		<?=$item->attrs['descr']?>
		&nbsp;
	</div>
	
</div>



<?php 
if(count($item->attrs['pics']))
{?>
<div class="container limited telo "><div class="slim krutilka-text"><?=STRELKI_TEXT?></div></div>
<div class="telo otstup light-brown" ></div>
	<div class="container slider telo light-brown" id="slider" >
	<?php 
	foreach($item->attrs['pics'] as $pic)
	{?>
	<div class="item "><a href="/<?=UPLOAD_IMAGES_REL_DIR?>/<?=$pic->path?>" onclick="return hs.expand(this, {captionText: 'Используйте стрелки клавиатуры, чтобы листать'})" title="Увеличить"><img src="<?=Media::img($pic->path.'&height=349')?>" alt="" /></a></div>
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

<div class="telo otstup light-brown"></div>








