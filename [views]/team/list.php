<?php
$list = $MODEL['list']; 
?>

<style>
.highslide-controls {display: none;}
</style>

<div class="limited">
	<div class="content team slim">
	
		<!--крамбсы-->
		<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>
		<!--//крамбсы-->
		
		
		<h1>НАША КОМАНДА</h1>
		
		<div class="anons-heading">
			Здесь вам представлены специалисты студии авторского дизайна «OG».<br> 
	Наши дизайнеры по интерьеру всегда помогут вам реализовать задуманное, <br>
	создать неповторимый стиль который подойдет именно вам.
		</div>
		
		<div class="wrapper">
		<?php 
		foreach($list as $item)
		{?>
			<?php Slonne::view('team/teamListElementWithPopupPartial.php', $item)?>
		<?php 
		}?>
			<div class="clear"></div>
		</div>
		
		<?php
		//vd($list); 
		?>
	
	</div>
</div>



