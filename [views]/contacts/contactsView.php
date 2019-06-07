<?php
$cities = $MODEL['cities'];
$items = $MODEL['items'];
//vd($cities);
//vd($items); 
?>



<div class="contacts">
	<h1>Контакты</h1>
	
	
	<div class="subcats">
	<?
	foreach($cities as $key=>$city )
	{?>
		<a href="<?=Entity2::moduleUrl('contacts').'/'.$key?>" class="<?=($key == $MODEL['activeCity'] ? 'active' : '')?>"><?=$city?></a>
	<?php 	
	}?>
	</div>
	
	
	<div class="items">
	<?php 
	foreach($items as $key=>$item)
	{?>
		<div class="item">	
			<div class="num"><span><?=($key+1)?></span></div>
			<div class="title"><?=$item['title']?></div>
			<div class="addresses">
				<div class="label">Адрес: </div>
				<?=$item['address']?> <span class="precise"><?=$item['addressPrecise']?></span>
				
				<div class="label">Телефоны: </div>
				<div class="phones-wrapper">
				<?php 
				foreach($item['phones'] as $label=>$phone)
				{?>
					<div class="row">
						<div class="label"><?=$label?></div>
						<div class="value"><?=$phone?></div>
					</div>
				<?php 
				}?>
				</div>
				
				<?
				if($item['email'])
				{?>
				<div class="label">E-mail: </div>
				<a href="mailto:<?=$item['email']?>"><?=$item['email']?></a>
				<?php 
				}?>
				
			</div>
			
			
			
			<div class="persons">
			<?php 
			foreach($item['persons'] as $key=>$person)
			{?>
				<div class="person">
					<div class="name"><?=$person['name']?>, </div>
					<div class="pos"><?=$person['pos']?></div>
					
					<div class="row">
					<?php
					if(count($person['phones']))
					{?>
						<div class="label">Моб.:</div>
						<div class="value">
						<?php 
						foreach($person['phones'] as $phone)
						{?>
							<div ><?=$phone?></div>
						<?php 
						}?>
						</div>
					<?php 	
					}?>
					</div>
					<?php 
					if($person['email'])
					{?>
					<div class="row">
						<div class="label">E-mail:</div>
						<div class="value"><a href="mailto:<?=$person['email']?>"><?=$person['email']?></a></div>
					</div>
					<?php 
					}?>
				</div>
			<?php 
			}?>
			</div>
			
			
			
			<div class="map">
				<div class="wrapper1"><?=$item['mapHTML']?></div>
			</div>
			
			
			
		</div>
	<?php 
	}?>
	</div>
</div>