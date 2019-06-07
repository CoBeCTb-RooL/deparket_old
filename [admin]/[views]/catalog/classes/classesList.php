<?php
$list = $MODEL['list']; 
//vd($list);
?>



<?php Slonne::view('catalog/menu.php', $model);?>

<h1>Классы</h1>
<?php 
if(count($list) )
{?>

<table class="t">
	<tr>
		<th>id</th>
		
		<th></th>
		<th>Название</th>
		<th>Свойства</th>
		
		<th>Удалить</th>
	</tr>
	<?php 
	foreach($list as $key=>$class)
	{?>
		<tr  id="row-<?=$class->id?>" class="<?=($class->active ? '' : 'inactive') ?>" ondblclick="Slonne.Catalog.Classes.classesEdit(<?=$class->id?>)">
			<td><?=$class->id?></td>
			
			<td><a href="#edit" onclick="Slonne.Catalog.Classes.classesEdit(<?=$class->id?>); return false;">ред.</a></td>
			<td style="font-weight: bold; "><?=$class->name?></td>
			<td align="center"><?=count($class->props)?></td>
			
			<td align="center"><a href="#delete" class="" onclick="Slonne.Catalog.Classes.classesDelete(<?=$class->id?>); return false;">удалить</a></td>
		</tr>
	<?php 
	}?>
</table>

<?php
}
else
{?>
	Ничего нет.
<?php 	
} 
?>
<p>
<input id="add-btn" type="button" onclick="Slonne.Catalog.Classes.classesEdit(); " value="+ новый класс">