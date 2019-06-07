<?php 
$formId = 'contacts-form'; 
?>
<div class="module_content contact_form">
	<div id="note"></div>
	<div id="fields">
		<form id="<?=$formId?>" method="post" target="iframe1" action="/<?=LANG?>/forms/contacts/submit" onsubmit="return Forms.ContactsForm.check();" >
			<div class="row row20">
				<div class="col-sm-12"><input type="text" name="name" placeholder="<?=$_CONST['ИМЯ']?>*" /></div>
				<div class="col-sm-12"><input type="text" name="email"  placeholder="<?=$_CONST['EMAIL']?>" /></div>
				<div class="col-sm-12"><input type="text" name="subject"  placeholder="Тема" ></div>  	
			</div> 
			
			<textarea name="message" id="message" placeholder="Напишите Ваше сообщение..."></textarea> 
			<input value="<?=$_CONST['ОТПРАВИТЬ']?>" type="submit">
			
			<div class="loading"  style="display: none;"><?=$_CONST['ЗАГРУЗКА']?></div>
			
			<div class="info" ></div>	
		</form>

		<div id="<?=$formId?>-success"  style="display: none;">
			<?php
				$p = Page::get(10);
				echo $p->attrs['descr']; 
			?>
		</div>
	</div>
</div>




