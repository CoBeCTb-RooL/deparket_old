<?php
$news = $MODEL['news'];
$years = $MODEL['years'];
$chosenYear = $MODEL['chosenYear'];
$title = $MODEL['title'];


$title = !$chosenYear ? $_CONST['ПОСЛЕДНИЕ НОВОСТИ'] : ''.$_CONST['НОВОСТИ ЗА'].' <b>'.$chosenYear.'</b> '.$_CONST['ГОД'].':';
?>


<div class="news-section">
	
	<!--крамбсы-->
	<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $crumbs);?>
	<!--//крамбсы-->
	
	<h1><?=$_CONST['заголовок раздела НОВОСТИ']?></h1>
	
	<?php
	if($MODEL['settings']['YEARS_NAVIGATION_IN_NEWS_LIST'])
	{?>
		<!--список годов-->
		<div class="years">
			<h3><?=$_CONST['заголовок АРХИВ НОВОСТЕЙ']?></h3>
			<div class="years-wrapper">
			<?php
			foreach($years as $key=>$val) 
			{?>
				<a class="<?=($chosenYear == $val || (!intval($chosenYear) && $val == 'Все') ? "active" : "")?>" href="<?=Entity2::moduleUrl(News::ESSENCE)?>/year_<?=$val?>"><?=$val?></a>
			<?php 	
			}
			?>
			</div>
		</div>
		<!--//список годов-->
	<?php 
	} 
	?>
	
	<!--список  новостей-->
	<div class="news-wrapper">
		
		<h3><?=$title?></h3>
		<?php 
		if(count($news))
		{?>
		<div class="news-list">
			<?php 
			foreach($news as $key=>$val)
			{
				$link = $val->url();
				?>
			<div class="item">
				<a href="<?=$link?>"><img src="<?=Media::img($val->attrs['pic'].'&width=130')?>"></a>
				<h2><a href="<?=$link?>"><?=$val->attrs['name']?></a></h2>
				<span class="anons"><?=$val->attrs['anons']?></span>
				
				<div class="clear"></div>
				<span class="date"><?=Funx::mkDate($val->attrs['dt'])?></span>
			</div>
			<?php 
			}
			?>
		</div>
		<?=Funx::drawPages($MODEL['totalElements'], $MODEL['page'], $MODEL['elPP']);?>
		<?php 
		}
		else
		{?>
			<?=$_CONST['НОВОСТЕЙ НЕТ']?>
		<?php 	
		} ?>
		
		
		
		<div class="clear"></div>
	</div>
</div>
	<!--//список  новостей-->