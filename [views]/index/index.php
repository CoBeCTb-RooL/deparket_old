<?php
$aboutText = $MODEL['aboutText'];
$plitka = $MODEL['plitka'];
$portfolio = $MODEL['portfolio'];
$services = $MODEL['services'];
$kakProxodyat = $MODEL['kakProxodyat'];
?>


<div class="index">
	
	
	
	
	<div class="container about " >
		<div class="limited" style="border: 0px solid green; ">
			<h1>О НАШЕЙ КОМПАНИИ</h1>
		</div>	
			<div class="text telo limited" style="padding: 10px 0 0 0;">
				<div class="left" style="width: 580px; display: table-cell; vertical-align: top; padding: 0 0 0 30px;  ">
					<?=$aboutText->attrs['descr']?>
					<a href="/<?=LANG?>/about" class="btn">ПОДРОБНЕЕ</a>
				</div>
				
				<div class="pics" style="display: table-cell; vertical-align: top; padding: 20px 0 0 20px;">
					<a class="item item-1" href="/<?=LANG?>/about" style="background-image: url(<?=Media::img($plitka[0]->attrs['pic'].'&width=425&height=280')?>)"><span><b style="font-size: 60px;">17 лет </b><br/> <span> успешной работы </span></span></a>
					<a class="item item-2" href="/<?=LANG?>/about" style="background-image: url(<?=Media::img($plitka[1]->attrs['pic'].'&width=380&height=280')?>);  ">ВЫСОКОТОЧНОЕ ПРОФЕССИОНАЛЬНОЕ ОБОРУДОВАНИЕ</a>
					<div class="clear"></div>
					
					<a class="item item-3" href="/<?=LANG?>/services/125_dizayn-proekt" style="background-image: url(<?=Media::img($plitka[2]->attrs['pic'].'&width=220&height=220')?>);  " >ВИЗУАЛИЗАЦИЯ ПРОЕКТА</a>
					<!-- Меню
					//<a class="item item-4" href="/<?=LANG?>/workshop" style="background-image: url(<?=Media::img($plitka[3]->attrs['pic'].'&width=220&height=220')?>)">МАСТЕР КЛАССЫ ПО ДИЗАЙНУ И ДЕКОРУ ИНТЕРЬЕРА</a>
					//<a class="item item-5 modal" href="#" onclick="return false; " style="background-image: url(<?=Media::img($plitka[4]->attrs['pic'].'&width=353&height=220')?>)"><b>ЗАКАЗАТЬ</b> КОНСУЛЬТАЦИЮ ДИЗАЙНЕРА</a> -->
					<div class="clear"></div>
				</div>
				
			</div>
		</div>
	





	
	
	
	<div class="container uslugi  ">
		<h1 class="limited">ЧТО МЫ ПРЕДЛАГАЕМ</h1>
		<div class="limited telo">
			&nbsp;
			<div class="anons-heading">Мы  делаем деревянные напольные покрытия для жизни и бизнеса <br/>«от эскизного наброска до реализации проекта под ключ»</div>
			<div class="items">
			<?php 
			$i=0;
			foreach($services as $item)
			{
				$url = '/'.LANG.'/services/'.$item->urlPiece().'';
				if(++$i>=4) break; ?>
				<div class="item">
					<a href="<?=$url?>" class="pic" title="<?=$item->attrs['name']?>">
						<img src="<?=Media::img($item->attrs['pics'][0]->path.'&width=339&height=243')?>" alt="" />
					</a>
					<a href="<?=$url?>" class="title"><?=$item->attrs['name']?></a>
					<div class="text"><?=$item->attrs['anons']?></div>
					<!-- <input type="button" class="red " value="ПОДРОБНЕЕ" /> -->
					
					<a href="<?=$url?>" class="btn">ПОДРОБНЕЕ</a>
				</div>
			<?php 
			}?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	
	
	
	<div class="limited">
		<h1>ПОРТФОЛИО</h1>
	</div>
	<div class="container portfolio telo light-brown" style="padding: 20px 0 20px 0; ">
		
		<?php 
		if(count($portfolio->attrs['pics']))
		{?>
		<div class="container slider" id="slider" >
			<?php 
			foreach($portfolio->attrs['pics'] as $pic)
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
		
		<div style="text-align: center; margin: 20px auto 0 auto; "><a href="/<?=LANG?>/portfolio" class="btn " style="margin: 0; " >СМОТРЕТЬ ПОРТФОЛИО</a></div>
	</div>
	
	

	
	
	<!--<div class="container study" style="margin: 40px 0 0 0; ">
		<div class="limited uspei">
			<h1>ШКОЛА ДИЗАЙНА</h1>
			<div class="anons-heading"><?=$studyText->attrs['anons']?></div>
			
			<div ><?=$uspeiText->attrs['descr']?></div>
			
			<div class="items">
			<?php
			foreach($uspeiItems as $item)
			{?>
				<div class="item" style="margin-bottom: 0; ">
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
	</div>-->
	
	
	
	
	<div style="margin-bottom: 34px;">
		<?php Slonne::view('study/kakProxodyat.php', $kakProxodyat)?>
	</div>


	
</div>


