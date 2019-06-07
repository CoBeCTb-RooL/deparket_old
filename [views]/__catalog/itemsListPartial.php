<?php
$items = $MODEL['items'];


?>
<div class="items-wrapper">
<?php
foreach($items as $key=>$item)
{$url = Entity2::moduleUrl('catalog').'/item_'.$item->urlPiece();
	?>
	<div class="item">
		<a href="<?=$url?>" class="pic-wrapper " style="background-image: url(/<?=UPLOAD_IMAGES_REL_DIR?>/<?=$item->attrs['pic']?>); ">
			<div class="ramk"></div>
		</a>
		<div class="title"><?=$item->attrs['name']?></div>
		<!--<img src="/img/separator.png" alt="" class="separator">
		<div class="srok">Срок разработки проекта - 25 дней</div>
		<div class="text">
			Общая площадь: <b>386 м кв.</b><br>
			местоположение: <b>г. Астана</b><br>
			год реализации: <b>2013</b><br>
			Фото:<b> Глеб Крамчанинов</b>
		</div>-->
		<!--<button class="btn ">Подробнее</button>-->
		<br/>
		<a href="<?=$url?>" class="btn ">Подробнее</a>
	</div>
<?php 
} 
?>
</div>