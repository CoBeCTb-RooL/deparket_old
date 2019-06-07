<?php
//vd($MODEL); 
?>
<h1><?=$_CONST['АКТИВАЦИЯ АККАУНТА']?></h1>


<?php
if($MODEL['error'])
{?>
	<div class="error"><?=$MODEL['error']?></div>
<?php 	
} 
else 
{?>
	<div class="notice"><?=$MODEL['notice']?></div>
<?php 
}
?>
