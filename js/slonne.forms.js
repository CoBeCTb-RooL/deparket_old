/*
 * Все формы на сайте
 * Все формы сабмитятся в iframe. 
 * ВАЖНО!!! 
 * префикс у ид полей - ИД ФОРМЫ , ТИРЕ и НЭЙМ!!
 * */
var Forms={}



/************************************************************************************/
/************************************************************************************/
/************************************************************************************/
/************************************************************************************/
Forms.FloatForm = {
	formId: 'float-form',	
	fields: [
      			{'name': "name", 'msg': _CONST['ERROR введите имя']},
      			{'name': "phone", 'msg': _CONST['ERROR введите телефон']},
      			{'name': "email", 'msg': _CONST['ERROR Укажите Ваш e-mail']}
    		],	
	
    check:function()
	{
    	//return true
		return Forms.process(this.formId, this.fields)
	}
}





Forms.FeedbackForm2 = {
	formId: 'feedback-form2',	
	fields: [
      			{'name': "name", 'msg': _CONST['ERROR введите имя']},
    			{'name': "tel", 'msg': _CONST['ERROR введите телефон']}	
    		],	
	
    check:function()
	{
    	//return true
		return Forms.process(this.formId, this.fields)
	}
}





Forms.ContactsForm = {
		formId: 'contacts-form',	
		fields: [
	      			{'name': "name", 'msg': _CONST['ERROR введите имя']},
	      			{'name': "surname", 'msg': _CONST['ERROR введите фамилию']},
	    			{'name': "email", 'msg': _CONST['ERROR введите email']}	
	    		],	
		
	    check:function()
		{
	    	//return true
			return Forms.process(this.formId, this.fields)
		}
	}







/////////////////////////////////////////////////////////////////////////////////////////////////////
Forms.getErrors = function(formId, fields)
{
	if(!formId)
	{
		alert('eRRoR! No FoRM iD!')
		return
	}
	var errors=[]
	for(var i in fields)
	{
		var field = fields[i];
		if($('#'+formId+' input[name="'+field.name+'"]').val() == '')
			errors.push(field)
	}
	return errors
}




Forms.process = function(formId, fields)
{
	if(!formId)
	{
		alert('eRRoR! No FoRM iD!')
		return
	}
	//alert('#'+formId+' input, #'+formId+' select')
	//	стираем предыдущие ерроры 
	$('#'+formId+' input, #'+formId+' select').each(function(n,element){
		$(element).removeClass('error')
	});
	
	$('#'+formId+' .info').html('')
	
	//	поля и их ошибки
	var errors = []
	
	//	проверка
	errors = Forms.getErrors(formId, fields);

	if(errors.length > 0)
	{
		/*for(var i in errors)
			$('#'+formId+' input[name="'+errors[i].name+'"]').addClass('error')
		
		showError(errors[0].msg, ''+formId+' .info')*/
		Forms.displayErrors(formId, errors)
		return false;
	}
	else
	{
		$('#'+formId+' .loading').css('display', 'block')
		return true;
	}
}




Forms.displayErrors = function(formId, errors)
{
	for(var i in errors)
		$('#'+formId+' input[name="'+errors[i].name+'"]').addClass('error')
	
	showError(errors[0].msg, ''+formId+' .info')
}

