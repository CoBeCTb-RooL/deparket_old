<?php
$u=$MODEL['user']; 

$formId = 'cabinet-reg-form';
//vd($u->Id);
?>

<?php Slonne::view('cabinet/menu.php'); ?>

<h1><?=($u->attrs ? $_CONST['РЕДАКТИРОВАНИЕ ЛИЧНЫХ ДАННЫХ'] : $_CONST['РЕГИСТРАЦИЯ'])?></h1>

<div class="cabinet" >	
		

		<form  id="<?=$formId?>" method="post" action="/<?=LANG?>/cabinet/editSubmit" target="iframe1" onsubmit="return Cabinet.checkCabinetData(<?=($u ? 'false' : 'true')?>); ">
			<?if($u){?>
			<input type="hidden" name="id" value="<?=$u->id?>">
			<?}?>
			
			<div class="inner">
				<div>
					<span class="label"><?=$_CONST['ФАМИЛИЯ']?><i class="req">*</i>:</span>
					<span class="input"><input type="text" name="surname" id="surname" placeholder="<?=$_CONST['ФАМИЛИЯ']?>" value="<?=$u->surname?>"></span>
				</div>
				<div>
					<span class="label"><?=$_CONST['ИМЯ']?><i class="req">*</i>:</span>
					<span class="input"><input type="text" name="name" id="name" placeholder="<?=$_CONST['ИМЯ']?>" value="<?=$u->name?>"></span>
				</div>
				<div>
					<span class="label"><?=$_CONST['ОТЧЕСТВО']?>:</span>
					<span class="input"><input type="text" name="fathername" id="fathername" placeholder="<?=$_CONST['ОТЧЕСТВО']?>" value="<?=$u->fathername?>"></span>
				</div>
				<hr>
				<div>
					<span class="label"><?=$_CONST['ДАТА РОЖДЕНИЯ']?>:</span>
					<span class="input"><?=Cabinet::dateOfBirthInput($u->birthdate)?></span>
				</div>
				
				
				<div>
					<span class="label"><?=$_CONST['ТЕЛЕФОН']?><i class="req">*</i>:</span>
					<span class="input"><input type="text" name="phone" id="tel" placeholder="<?=$_CONST['ТЕЛЕФОН']?>" value="<?=$u->phone?>"></span>
				</div>
				
				<div>
					<span class="label"><?=$_CONST['EMAIL']?><i class="req">*</i>:</span>
					<span class="input"><input type="text" name="email" id="email" placeholder="<?=$_CONST['EMAIL']?>" value="<?=$u->email?>" autocomplete="off"></span>
				</div>
				
		<?php 
		if(!$u)
		{?>
				<hr>
				
				<div>
					<span class="label"><?=$_CONST['ПАРОЛЬ']?><i class="req">*</i>:</span>
					<span class="input"><input type="password" name="pass" id="pass" placeholder="<?=$_CONST['ПАРОЛЬ']?>" autocomplete="off"></span>
				</div>
				<div>
					<span class="label"><?=$_CONST['ПОДТВЕРДИТЕ ПАРОЛЬ']?><i class="req">*</i>:</span>
					<span class="input"><input type="password" name="pass2" id="pass2" placeholder="<?=$_CONST['ПОДТВЕРДИТЕ ПАРОЛЬ']?>" autocomplete="off"></span>
				</div>
				
				<hr>
				<div>
					
					<table border="0">
						<tr>
							<td width="1" valign="top">
								<img src="/kcaptcha/?<?=session_name()?>=<?=session_id()?>" id="captcha-pic">
								<br><a href="javascript:void(0)" onclick="$('#captcha-pic').attr('src', '/kcaptcha/?'+(new Date()).getTime());" id="re-captcha"><?=$_CONST['LBL captcha НЕ ВИЖУ КОД']?></a>
							</td>
							<td valign="top" >
								<?=$_CONST['LBL captcha ВВЕДИТЕ ТЕКСТ НА ИЗОБРАЖЕНИИ']?><i class="req">*</i>: <br>
								<input type="text" name="captcha" id="captcha" >
							</td>
						</tr>
					</table>
				</div>
				
				<!--галочка условия-->
				<!--<div style="margin: 30px 0 0 0;" id="i-approve">
					<label ><input type="checkbox" name="agree" id="agree"><?=$_CONST['галочка Я ПОДТВЕРЖДАЮ']?></label>
				</div>-->
		<?php 
		}?>
				
				
				
			</div>
			
	
	
	
	<p>
	<input type="submit" value="<?=$u ? $_CONST["СОХРАНИТЬ"] : $_CONST["ЗАРЕГИСТРИРОВАТЬСЯ"]?>">
	<span class="loading" style="display: none ;"><?=$_CONST['ЗАГРУЗКА']?></span>
	<span class="info"></span>
	
		
		</form>
	
	
	
	<div id="<?=$formId?>-success" style="display: none;">
	<? if(!$u)
	{?>
		Вы успешно зарегистрированы! <br>На указанный Вами ящик отправлено письмо с инструкциями по активации Вашего аккаунта. 
	<?php 
	}
	else
	{?>
	 	Ваши данные успешно изменены!
	<?php 
	}?>
	</div>
</div>

