<?php
$u = $MODEL; 
?>

<div id="top-greeting">
	Здравствуйте, <b><?=$u->name?></b>
	<div class="links">
		<a href="/<?=LANG?>/cabinet/">Профиль</a>
		| <a href="#logout" onclick="Cabinet.logout(); return false; "><?=$_CONST['ВЫЙТИ']?></a>
	</div>
</div>