
<form name="form_float" id="float-form" class="float-form" method="post"  target="iframe1"  action="/<?=LANG?>/forms/floatForm/submit" onsubmit="return Forms.FloatForm.check();" >
	<input type="hidden" name="action" value="floatForm">
	
	<div class="row">
		<input type="text" name="name" placeholder="ИМЯ*"/>
	</div>
	<div class="row">
		<input type="text" placeholder="ТЕЛЕФОН*" name="phone" >
		<input type="text" placeholder="E-MAIL*" name="email" >
	</div>
	<div class="row">
		<input type="text" placeholder="НАЗВАНИЕ КОМПАНИИ" name="companyName" >
	</div>
	
	<div class="row">
		<input type="text" placeholder="СОПРОВОДИТЕЛЬНЫЙ ТЕКСТ" name="text" >
	</div>
	
	<div class="loading" style="display: none; " >Секунду...</div>
	<div class="info" style="display: none;">123</div>
	
	<input type="submit"   value="ОТПРАВИТЬ ЗАПРОС">
</form>

<div id="float-form-success" style="display: none">
	<h1>Спасибо за заявку!</h1>
	<h2 class="center">В ближайшее время наши специалисты свяжутся с Вами!</h2>
</div>
