<?php


$ACTION = $_PARAMS[0].$_PARAMS[1]; 	#	при сабмите будет просто добавляться слово Submit


	
class FormsController extends MainController{
	
	
	/*function floatForm()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS;
		
		$_GLOBALS['TITLE'] = Slonne::getTitle('Обратная связь');	
		Slonne::view('forms/feedbackForm.php');	
	}*/
	function floatFormSubmit()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS;
		$_GLOBALS['NO_LAYOUT'] = true;
		
		FloatForm::submit();
	}
	 
	
	
	
	
	function feedback2()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS;
	
		$_GLOBALS['TITLE'] = Slonne::getTitle('Обратная связь');
		Slonne::view('forms/feedbackForm2.php');
	}
	function feedback2Submit()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS;
		$_GLOBALS['NO_LAYOUT'] = true;
	
		FeedbackForm2Static::submit();
	}
	
	
	
	
	function contacts()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS;
		
		$_GLOBALS['TITLE'] = Slonne::getTitle('Обратная связь');	
		Slonne::view('forms/feedbackForm.php');	
	}
	function contactsSubmit()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS;
		$_GLOBALS['NO_LAYOUT'] = true;
		
		ContactsFormStatic::submit();
	}
	
	
	
}

















/*************************************************/
/*************************************************/
/*************************************************/
/*************************************************/
class ContactsFormStatic extends Form  {
	const FORM_ID = 'contacts-form'; 
	static $emails = array();
	static $fields = array( 
						array('name'=>'name', 'msg'=>'Пожалуйста, введите Ваше имя.'),  
						//array('name'=>'tel', 'msg'=>'Пожалуйста, введите Ваш телефон.'),
					);

	function submit()
	{
		global $_CONST;
		
		#	здесь будут скапливаться проблемы (массив)
		$errors = Form::getErrors(self::$fields);
				
		#	ЗДЕСЬ МОГУТ БЫТЬ ДОП. ПРОВЕРКИ
		
		if(count($errors))
			self::errorStatic(self::FORM_ID, $errors);
		else 
		{
			self::send();
			self::successStatic(self::FORM_ID);
		}
	}
	

	function send()
	{
		global $_CONST, $_CONFIG;
		
		$subject = 'Заявка с сайта '.$_SERVER['HTTP_HOST'];
		
		#	сообщение
		/*$msg.='
		<h3>Заявка с сайта '.$_SERVER['HTTP_HOST'].'</h3>
		<div>Имя: <b>'.$_REQUEST['name'].'</b></div>
		<div>Телефон: <b>'.$_REQUEST['tel'].'</b></div>
		';*/
		
		$msg.='
		<h3>Заявка с сайта '.$_SERVER['HTTP_HOST'].'</h3>
		<div>Имя: <b>'.$_REQUEST['name'].'</b></div>
		<div>Email: <b>'.$_REQUEST['email'].'</b></div>
		<div>Тема: <b>'.$_REQUEST['subject'].'</b></div>
		<div>Сообщение: <b>'.$_REQUEST['message'].'</b></div>
		';

		$emails = self::getEmails();
		self::sendEmails($emails, $subject, $msg);
	}
	

	
}









/*************************************************/
/*************************************************/
/*************************************************/
/*************************************************/
class FloatForm extends Form  {
	const FORM_ID = 'float-form'; 
	static $emails = array();
	static $fields = array( 
						array('name'=>'name', 'msg'=>'Пожалуйста, введите Ваше имя.'),  
						array('name'=>'phone', 'msg'=>'Пожалуйста, введите Ваш телефон.'),
						array('name'=>'email', 'msg'=>'Пожалуйста, введите Ваш E-mail.'),
					);
	
	function getEmails()
	{
		global $_CONFIG;
		$tmp = explode(",", $_CONFIG['SETTINGS']['form_emails']);
		foreach($tmp as $val)
			if(trim($val))
				$ret[] = trim($val);
		return $ret ? $ret : parent::getEmails(); 
	}
	
	function submit()
	{
		global $_CONST;
		
		#	здесь будут скапливаться проблемы (массив)
		$errors = Form::getErrors(self::$fields);
				
		#	ЗДЕСЬ МОГУТ БЫТЬ ДОП. ПРОВЕРКИ
		
		if(count($errors))
			self::errorStatic(self::FORM_ID, $errors);
		else 
		{
			self::send();
			self::successStatic(self::FORM_ID);
		}
	}
	

	function send()
	{
		global $_CONST, $_CONFIG;
		
		$subject = 'Заявка с сайта '.$_SERVER['HTTP_HOST'];
		
		#	сообщение
		$msg.='
		<h3>Заявка с сайта '.$_SERVER['HTTP_HOST'].'</h3>
		<div>Имя: <b>'.$_REQUEST['name'].'</b></div>
		<div>Телефон: <b>'.$_REQUEST['phone'].'</b></div>
		<div>Email: <b>'.$_REQUEST['email'].'</b></div>
		<div>Название компании: <b>'.$_REQUEST['companyName'].'</b></div>
		<div>Сообщение: <b>'.$_REQUEST['text'].'</b></div>
		';

		$emails = self::getEmails();
		self::sendEmails($emails, $subject, $msg);
	}
	

	
}









/*************************************************/
/*************************************************/
/*************************************************/
/*************************************************/
class FeedbackForm2Static extends Form  {
	const FORM_ID = 'feedback-form2';
	static $emails = array();
	static $fields = array(
			array('name'=>'name', 'msg'=>'Пожалуйста, введите Ваше имя.'),
			array('name'=>'tel', 'msg'=>'Пожалуйста, введите Ваш телефон.'),
	);

	function submit()
	{
		global $_CONST;

		#	здесь будут скапливаться проблемы (массив)
		$errors = Form::getErrors(self::$fields);

		#	ЗДЕСЬ МОГУТ БЫТЬ ДОП. ПРОВЕРКИ

		if(count($errors))
			self::errorStatic(self::FORM_ID, $errors);
			else
			{
				self::send();
				self::successStatic(self::FORM_ID);
			}
	}


	function send()
	{
		global $_CONST, $_CONFIG;

		$subject = 'Заявка с сайта '.$_SERVER['HTTP_HOST'];

		#	сообщение
		$msg.='
		<h3>Заявка с сайта '.$_SERVER['HTTP_HOST'].'</h3>
		<div>Имя: <b>'.$_REQUEST['name'].'</b></div>
		<div>Телефон: <b>'.$_REQUEST['tel'].'</b></div>
		';

		$emails = self::getEmails();
		self::sendEmails($emails, $subject, $msg);
	}



}
	
?>