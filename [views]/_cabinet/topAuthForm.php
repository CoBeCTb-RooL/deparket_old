<?php $formId = 'top-auth-form' ?>
<form method="post" action="" target="iframe1" id="<?=$formId?>" onsubmit="Cabinet.checkAuthForm('<?=$formId?>'); return false; ">
	<div class="inner">
		<div class="row"><span class="label">E-mail: </span><input type="text" name="email" placeholder="E-mail" /></div>
		<div class="row"><span class="label">Пароль: </span><input type="password" name="password" placeholder="Пароль"  /></div>
		
		<input type="submit" value="Войти">
		<div class="loading"></div>
		<div class="info"></div>
	</div>
</form>