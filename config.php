<?
if($_SERVER['SERVER_ADDR'] == '127.0.0.1')
{
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_HOST', '127.0.0.1');
	define('DB_NAME', 'deparket_old');
}
else
{
	define('DB_USER', 'dpark_dparketk');
	define('DB_PASSWORD', 'l3tB9j#4');
	define('DB_HOST', 'srv-db-plesk04.ps.kz:3306');
	define('DB_NAME', 'dparketk_maindb');
}


#	лэйаут по умолчанию
$_CONFIG['DEFAULT_LAYOUT'] = 'fedyaLayout';

#	лэйаут админки по умолчанию
$_CONFIG['DEFAULT_ADMIN_LAYOUT'] = 'adminLayout';

#	дефолтовые ящики, на которые будут уходить все фидбеки, формы и тд
$_CONFIG['DEFAULT_DELIVERY_EMAILS'] = array('sad_og@mail.ru', 'tsop.tya@gmail.com');


$_CONFIG['LANGS']=array(
	'ru'=>array('title'=>'Русская', 'postfix'=>'', 'siteTitle'=>'Rus',  ),
//	'en'=>array('title'=>'Engish',  'postfix'=>'_en', 'siteTitle'=>'Eng', ),
//	'kz'=>array('title'=>'Қазақ',  'postfix'=>'_kz', 'siteTitle'=>'Каз', ),
//	'tur'=>array('title'=>'Türk',  'postfix'=>'_tur', 'siteTitle'=>'Tur', ),

);


#	ЯЗЫК ПО УМОЛЧАНИЮ
$_CONFIG['DEFAULT_LANG'] = 'ru'; 
$_CONFIG['default_admin_lang'] = 'ru'; 



define('CONTROLLERS_DIR', 	'[controllers]');
define('VIEWS_DIR', 		'[views]');
define('MODELS_DIR', 		'[models]');


#	папка с общими вьюхами
define('SHARED_VIEWS_DIR', 	'SHARED');

#	папка с лэйаутами
define('LAYOUTS_DIR', 	'[layouts]');

#	
define('ABS_PATH_TO_RESIZER_SCRIPT', '/resize.php');
//define('ABS_PATH_TO_RESIZER_SCRIPT', '/imgresize.php');

#	корень (ну там если придётся сделать псевдо-относительный путь)            
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

#	относительный путь к папке со всеми инклудами
define('INCLUDE_DIR', 'include');

#	Папки с медиа
define('UPLOAD_IMAGES_REL_DIR', 'upload/images/');

#	Значение 1-го кусочка урла, говорящего что это админка
define('ADMIN_URL_SIGN', 'admin');

#	папка - админка
define('ADMIN_DIR', '[admin]');

#	разделитель для параметров и значений в гете (метод Slonne::getParams )
define('PARAMS_INNER_SEPARATOR', '_');


?>