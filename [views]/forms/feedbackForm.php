<?php 
$formId = 'feedback-form'; 
?>
<div class="form">
	<form id="<?=$formId?>" method="post" target="iframe1" action="/<?=LANG?>/forms/feedback/submit" onsubmit="return Forms.FeedbackForm.check();" >
		<h1>Участвуйте в акции</h1>
		<div class="subhead">
			Заполните поля для обратной связи <br>и наш менеджер свяжется с вами <br>в ближайшее время
		</div>	
		
		<span class="row"><span class="label"><?=$_CONST['ИМЯ']?>: </span><input type="text" name="name" placeholder="<?=$_CONST['ИМЯ']?>" /></span>
		<span class="row"><span class="label"><?=$_CONST['ТЕЛЕФОН']?>: </span><input type="text" name="tel"  placeholder="<?=$_CONST['ТЕЛЕФОН']?>" /></span>
		<span class="row"><span class="label"><?=$_CONST['EMAIL']?>: </span><input type="text" name="email" placeholder="<?=$_CONST['EMAIL']?>" /></span>
		
		<div class="loading"  style="display: none;"><?=$_CONST['ЗАГРУЗКА']?></div>
		<input type="submit"  value="Участвовать в акции" >
		<div class="info" ></div>	
	</form>
	
	<div id="<?=$formId?>-success"  style="display: none;">
		<?php
			$p = Page::get(10);
			echo $p->attrs['descr']; 
		?>
	</div>
</div>