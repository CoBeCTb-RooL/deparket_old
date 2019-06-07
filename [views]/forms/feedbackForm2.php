<?php 
$formId = 'feedback-form2'; 
?>
<div class="form">
	<form id="<?=$formId?>" method="post" target="iframe1" action="/<?=LANG?>/forms/feedback2/submit" onsubmit="return Forms.FeedbackForm2.check();" >
		<h1>Оставьте контакты</h1>
		<div class="subhead">
			И мы Вам перезвоним<br>в ближайшее время
		</div>	
		
		<span class="row"><span class="label"><?=$_CONST['ИМЯ']?>: </span><input type="text" name="name" placeholder="<?=$_CONST['ИМЯ']?>" /></span>
		<span class="row"><span class="label"><?=$_CONST['ТЕЛЕФОН']?>: </span><input type="text" name="tel"  placeholder="<?=$_CONST['ТЕЛЕФОН']?>" /></span>
		
		
		<div class="loading"  style="display: none;"><?=$_CONST['ЗАГРУЗКА']?></div>
		<input type="submit"  value="Перезвонить мне" >
		<div class="info" ></div>	
	</form>
	
	<div id="<?=$formId?>-success"  style="display: none;">
		<?php
			$p = Page::get(10);
			echo $p->attrs['descr']; 
		?>
	</div>
</div>