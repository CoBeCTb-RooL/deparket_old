

<?php
class ErrorController
{
	function index()
	{
		global $_GLOBALS;
		
		$_GLOBALS['TITLE'] = 'Ошибка 404 файл не существует';
		?>

	
<div class="limited">
	<div class="content services slim telo">
	
		<!--крамбсы-->
		<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>
		<!--//крамбсы-->
	</div>	
		
	<h1><?=$_GLOBALS['TITLE']?></h1>
		
	<div class="content services slim telo otstup" >	
		
		<div style="height: 200px; ">
			<!--<h1>Ошибка 404 - Страница не найдена</h1>-->
			<!--<img src="/img/404-4.png" alt="Ошибка" width="230"  align="left" style="margin: 0 15px 15px 15px;" />-->
			<h2>Что случилось?</h2>
			<p>Возможно, страница была удалена, или вы перешли по неверной ссылке.</p>
			<h2>Что делать?</h2>
			<p>Вы можете перейти на <a href="/">главную страницу</a> или воспользоваться навигацией. Надеемся, Вы найдете то, что искали!</p>
		</div>
		
		
	</div>
</div>
	<?php 
	}
}




?>