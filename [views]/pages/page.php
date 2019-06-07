<?php
$p = $MODEL['p'];
$crumbs = $MODEL['crumbs'];


?>

<!--крамбсы-->
<? //Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $crumbs);?>
<!--//крамбсы-->

<div class="limited">
	<div class="content projects slim">
	
		<!--крамбсы-->
		<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>
		<!--//крамбсы-->
		

<?php
if($p->attrs)
{?>
	<h1><?=$p->attrs['name']?></h1>
	<?=$p->attrs['descr']?>
<?php 	
} 
else
{?>
	Раздел не найден.
<?php 	
}
?>

	</div>
</div>