<?php
 #	УБРАТЬ ОТСЮДА! во вьюхи 
if($_SESSION['user'])
{?>
	<a href="/<?=LANG?>/cabinet/edit"><?=$_CONST['РЕДАКТИРОВАТЬ ДАННЫЕ']?></a> / 
	<a href="/<?=LANG?>/cabinet/activate">Активация</a> / 
	<a href="javascript:void(0)" onclick="Cabinet.logout()"><?=$_CONST['ВЫЙТИ']?></a>
	<hr>	
<?php 	
} 
?>

