<?php 
$formId = 'cabinet-auth-form'; 
?>
<div class="cabinet form">
	<h1><?=$_CONST['АВТОРИЗАЦИЯ']?></h1>
	<form id="<?=$formId?>" method="post"  action="/<?=LANG?>/cabinet/authSubmit" onsubmit="Cabinet.checkAuthForm('<?=$formId?>'); return false; " target="iframe1" >
	
		<span class="row"><span class="label"><?=$_CONST['EMAIL']?>: </span><input type="text" name="email" placeholder="<?=$_CONST['EMAIL']?>" /></span>
		<span class="row"><span class="label"><?=$_CONST['ПАРОЛЬ']?>: </span><input type="password" name="password"  placeholder="<?=$_CONST['ПАРОЛЬ']?>" /></span>
		
		
		<span><input type="submit"  value="<?=$_CONST['ВОЙТИ']?>"> <?=$_CONST['ИЛИ']?> <a href="/<?=LANG?>/cabinet/edit"><?=$_CONST['ЗАРЕГИСТРИРОВАТЬСЯ']?></a></span>
		<div class="loading" style="display: none; "><?=$_CONST['ЗАГРУЗКА']?></div>
		<div class="info"></div>

	</form>
</div>