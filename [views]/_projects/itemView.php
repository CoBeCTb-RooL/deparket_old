<?php
$item = $MODEL['item'];
$crumbs = $MODEL['crumbs'];

//vd($item);

?>


<div class="limited">
	<div class="content projects slim">
	
		<!--крамбсы-->
		<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>
		<!--//крамбсы-->
		
		
		<h1>Портфолио</h1>
		
		<div class="anons-heading">
			Студия авторского дизайна «OG»  делает проекты для жизни и бизнеса<br> «от эскизного наброска до реализации проекта под ключ»
		</div>
		
		<div class="two-columns">
			<div class="left">
				<h2><?=$item->attrs['name']?></h2>
				<?=$item->attrs['descr']?>
			</div>
			<div class="right"><?=$item->attrs['descr_meta']?></div>
			<div class="clear"></div>
		</div>
		
	</div>
</div>



<?php 
if(count($item->attrs['pics']))
{?>
<div class="container limited "><div class="slim krutilka-text"><?=STRELKI_TEXT?></div></div>
<div class="container slider" id="slider">
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



<div class="container limited">
	<div class="nav">

		<div class="left">
		<?php 
		if($MODEL['prev'])
		{?>
			<a href="<?=$MODEL['prev']->url()?>">&larr; Предыдущий проект </a>
		<?php 
		}?>
		</div>
			
		<div class="center"><a href="<?=$item->catUrl()?>">Назад в каталог</a></div>	
			
		<div class="right">
		<?php 
		if($MODEL['next'])
		{?>
			<a href="<?=$MODEL['next']->url()?>">Следующий проект &rarr;</a>
		<?php 
		}?>
		</div>
		<div class="clear"></div>	
	</div>
</div>









