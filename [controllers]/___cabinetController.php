<?php




$ACTION = $_PARAMS[0];
if(!$ACTION)
{
	if($_SESSION['user'])
		$ACTION = '';
	else 
		$ACTION = 'auth';
}





 


class CabinetController extends MainController{

	function index()
	{
		Slonne::view('cabinet/menu.php');
		$str.='INDEX INDEX INDEX INDEX INDEX INDEX INDEX INDEX INDEX ';
		
		echo $str;
	}
		
	
	
	
	function edit()
	{
		global $_CONST;
		
		
		if($_SESSION['user'])	
			$u = User::get($_SESSION['user']['id']);
		
		$model['user'] = $u;
		
		Slonne::view('cabinet/regForm.php', $model, $buffer = false);
	}
	
	
	
	function editSubmit()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		$_GLOBALS['NO_LAYOUT'] = true;
		
		$formId = 'cabinet-reg-form';
		$errors = array();
		$editing = false;
		
		if($id = intval($_REQUEST['id']))
		{
			if($u = User::get($id))
				$editing = true;
				
			//vd($u);
			
			if(!$u)
			{
				$errors[] = array('name'=>'', 'msg'=>'ОШИБКА! Пользователь не найден. ['.$_REQUEST['id'].']');
				Form::errorStatic($formId, $errors);
			}
				
		}
		
		//vd($u);
		
		$err = $_CONST['ERROR Не все обязательные поля заполнены корректно'];
		if(!$data['name']=strPrepare($_REQUEST['name']))
			$errors[] = array('name'=>'name', 'msg'=>$err);
		
		if(!$data['surname']=strPrepare($_REQUEST['surname']))
			$errors[] = array('name'=>'surname', 'msg'=>$err);
			
		if(!filter_var( ($data['email']=strPrepare($_REQUEST['email'])), FILTER_VALIDATE_EMAIL))
			$errors[] = array('name'=>'email', 'msg'=>$_CONST['ERROR Пожалуйста, введите корректный E-mail']);
		else	#	проверим емайл на существование
		{
			if(User::emailExists($data['email'], $_SESSION['user']['id']))
			{
				if(!count($errors))
					$errors[] = array('name'=>'email', 'msg'=>$_CONST['ERROR Пользователь с таким E-mail уже существует']);
			}
		}
			
		if(!$data['phone'] = strPrepare($_REQUEST['phone']))
			$errors[] = array('name'=>'phone', 'msg'=>$err);
			
		
		if(!$editing)
		{
			$pass = strPrepare($_REQUEST['pass']);
			$pass2 = strPrepare($_REQUEST['pass2']);
			if(!$pass)
				$errors[] = array('name'=>'pass', 'msg'=>$err);
			elseif(!$pass2)
				$errors[] = array('name'=>'pass2', 'msg'=>$err);
			elseif($pass != $pass2)
			{
				$errors[] = array('name'=>'pass', 'msg'=>$_CONST['ERROR пароли не совпадают']);
				$errors[] = array('name'=>'pass2', 'msg'=>$_CONST['ERROR пароли не совпадают']);
			}
		
			#	капча
			if($_REQUEST['captcha'] != $_SESSION['captcha_keystring'])
				$errors[] = array('name'=>'captcha', 'msg'=>$_CONST['ERROR Вы ввели неверный код с картинки']);
		}
		//vd($errors);
		if(count($errors))
		{
			Form::errorStatic($formId, $errors);
		}
		
		
		
		$data['fathername'] = mysql_real_escape_string(trim($_REQUEST['fathername']));
		$data['birthdate'] = intval($_REQUEST['year']).'-'.intval($_REQUEST['month']).'-'.intval($_REQUEST['day']);
		$data['sex'] = intval($_REQUEST['sex']);
		$data['phone'] = mysql_real_escape_string(trim($_REQUEST['phone']));
		$data['city'] = mysql_real_escape_string(trim($_REQUEST['city']));
		$data['pass'] = mysql_real_escape_string(trim($_REQUEST['pass'])); 
		
		//vd($data);
		if(!$editing)
		{
			$u = new User;
			$u->salt = Funx::getSalt(9).'_'.Funx::getSalt(5);
			$u->active = 0;
			$u->password = $data['pass'];
			
		}
		$u->email = $data['email'];
		$u->surname = $data['surname'];
		$u->name = $data['name'];
		$u->fathername = $data['fathername'];
		$u->birthdate = $data['birthdate'];
		
		$u->sex = $data['sex'];
		$u->phone = $data['phone'];
		$u->lastIp = $data['ip'];
		
		vd($u);
		
		if(!$editing)
			$u->insert();
		else 
			$u->update();
		//vd($u);
		
		if($e=mysql_error())
		{
			$errors[] = array('name'=>'', 'msg'=>$_CONST['ERROR Ошибка при сохранении']);
			Form::errorStatic($formId, $errors);
		}
		else
		{
			if(!$editing)
			{
				#	отсылка письма с активацией
				$p = Page::get(11);
				$msg = $p->attrs['descr'];
				$msg = str_replace('_SITE_', $_SERVER['HTTP_HOST'], $msg);
				$msg = str_replace('_LANG_', LANG, $msg);
				$msg = str_replace('_SALT_', $u->salt, $msg);
				Funx::sendMail($u->email, 'robot@'.$_SERVER['HTTP_HOST'], $_CONFIG['Тема письма активации учётки'].' '.$_SERVER['HTTP_HOST'], $msg);
				
				#	успех формы
				Form::successStatic($formId);
			}
			else
			{
				echo '
				<script>
					window.top.showNotice("'.$_CONST['ДАННЫЕ УСПЕШНО ИЗМЕНЕНЫ'].'", "'.$formId.' .info");
					window.top.loading(0, \''.$formId.' .loading\', \'fast\');
				</script>';
			}
		}
	}
	
	
	
	
	
	
	
	function auth()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		Slonne::view('cabinet/menu.php');
	
		Slonne::view('cabinet/authForm.php');
	}
	
	
	
	
	
	
	function authSubmit()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		$_GLOBALS['NO_LAYOUT'] = true;
		
		$email = trim($_REQUEST['email']);
		$pass = trim($_REQUEST['password']);
		
		$errors = array();
		if(!$email)
			$errors[] = array('name'=>'email', 'msg'=>$_CONST['ERROR Укажите Ваш e-mail']);  
		
		if(!$pass)
			$errors[] = array('name'=>'password', 'msg'=>$_CONST['ERROR Введите пароль']);
		
		if(!count($errors))
		{
			if($u = User::getByEmailAndPassword($email, $pass))
				$_SESSION['user']['id'] =  $u->id;
			else
			{
				$errors[] = array('name'=>'email', 'msg'=>$_CONST['ERROR Неверный email / пароль']);
				$errors[] = array('name'=>'password', 'msg'=>$_CONST['ERROR Неверный email / пароль']); 
			}
		}
		
		$res['errors'] = $errors;
		
		echo json_encode($res);
		
	}
	
	
	
	
	
	
	
	function activate()
	{
		global $_GLOBALS, $_CONFIG, $_PARAMS, $_CONST;
		$model = array();
		
		$salt = trim($_PARAMS[1]);
		if($salt)
		{
			$user = User::getBySalt($salt);
			
			if($user)
			{
				if($user->active)
					$model['notice'] = $_CONST['ERROR аккаунт уже был активирован'];
				else
				{
					$user->active = 1;
					$user->update();
					$model['notice'] = $_CONST['NOTICE успешная активация аккаунта'];
				}
			}
			else 
				$model['error']= $_CONST['ERROR код активации не найден'];
		}
		else 
			$model['error']= $_CONST['ERROR код активации не найден'];
		
		
		
		Slonne::view('cabinet/activationView.php', $model);
	}
	
	
	
	
	
	
	
	function logout()
	{
		unset($_SESSION['user']);
	}
		

}

?>