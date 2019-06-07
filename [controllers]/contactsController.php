<?php


$_GLOBALS['TITLE'] = Slonne::getTitle('Контакты');



$cities = array(
		'almaty'=>'Алматы',
		'astana'=>'Астана',
);

$MODEL['cities'] = $cities;


$stores = array(
	
		'almaty'=>array(
				
				# 	точка
				array(
						'title'=>'Производственный цех',
						'address'=>'г. Алматы, ул. 2-я Гончарная, д. 117 ',
						'phones'=>array(
								'Тел.: '=>'8 (727) 297 42 19',
								'Факс: '=>'8 (727) 297 42 19',
						),
						'email'=>'adelfi.mebel@mail.ru',
						'persons'=>array(
								array(
									'name'=>'Искандар', 	
									'pos'=>'дизайнер',
									'phones'=>array(
											'8 (701) 772 23 56',
									),
									'email'=>'iskandar_m@mail.ru',
								),
								array(
										'name'=>'Булент Явер',
										'pos'=>'директор по производству',
										'email'=>'Erz24@mail.ru',
								),
						),
						'mapHTML'=>'<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=JV966j6LKYsyi89ajjT9TvQZenjrIibP&width=460&height=240"></script>',
				),
				
				
				
				# 	точка
				array(
						'title'=>'Мебельный салон',
						'address'=>'г. Алматы, ул. Розыбакиева, д. 72а,',
						'addressPrecise'=>'(угол ул. Шевченко, ТД «Саламат 3», этаж 3, салон 24 )',
						'phones'=>array(
								'Тел.: '=>'8 (727) 379 41 24',
								//'Факс: '=>'8 (727) 294 22 63',
						),
						//'email'=>'adelfi.mebel@mail.ru',
						'persons'=>array(
								array(
									'name'=>'Марта', 	
									'pos'=>'менеджер',
									'phones'=>array(
											'8 (707) 160 04 00',
											'8 (777) 595 47 79',
									),
									'email'=>'marta_54.57@mail.ru', 
								),
								array(
										'name'=>'Мария',
										'pos'=>'дизайнер',
										'phones'=>array(
												'Моб.: '=>'8 (701) 497 79 25',
										),
										'email'=>'mariy._44@inbox.ru',
								),
						),
						'mapHTML'=>'<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=Cb926l-M8TUW34Pi3fsuNuw9-A8jk5Is&width=460&height=240"></script>',
				),
				
				
		),
		
		
		
		'astana'=>array(
		
				# 	точка
				array(
						'title'=>'Производственный цех',
						'address'=>'г Астана ул. Сыгынак 14, вп 5 ЖК Европа Палас',
						'addressPrecise'=>'(салон Levent`s Interiors)',
						'phones'=>array(
								'Тел.: '=>'8 (717) 290 49 68',
						),
						'email'=>'adelfi.astana@mail.ru',
						'persons'=>array(
								array(
										'name'=>'Гульмира',
										'pos'=>'дизайнер',
										'phones'=>array(
												'8 (778) 388 87 08',
										),
										'email'=>'gulmira-07@mail.ru',
								),
						),
						'mapHTML'=>'<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=bp1Gmlbq5OWzn60cgjaWNCqAIsOVjWFY&width=460&height=240"></script>',
				),
		
		
		
				
		
		
		),
		
		
			
);

$city = $cities[$_PARAMS[0]] ? $_PARAMS[0] : 'almaty';

//$MODEL['stores'] = $stores;
$MODEL['activeCity'] = $city;
$MODEL['items'] = $stores[$MODEL['activeCity']];

Slonne::view('contacts/contactsView.php', $MODEL);






class contactsController extends MainController{
}

?>