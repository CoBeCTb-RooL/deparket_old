<?php
$item = $MODEL['item'];

?>


<?php 
if($item)
{?>
	<div class="item-content">
		<div class="pix">
			<a href="/<?=UPLOAD_IMAGES_REL_DIR.'/'.$item->attrs['pic']?>" class="main" onclick="return hs.expand(this)" style="background-image: url(/<?=UPLOAD_IMAGES_REL_DIR.''.$item->attrs['pic']?>) " title="Нажмите для увеличения">
				 <!--<img src="/<?=UPLOAD_IMAGES_REL_DIR.'/'.$item->attrs['pic']?>" alt="" />-->
			</a>
			<div class="other">
			<?php 
			foreach($item->attrs['pics'] as $key=>$pic)
			{?>
				<a href="<?='/'.UPLOAD_IMAGES_REL_DIR.'/'.$pic->path?>" style="background-image: url(<?='/'.UPLOAD_IMAGES_REL_DIR.'/'.$pic->path?>) ; " onclick="return hs.expand(this)"></a>
			<?php 	
			}?>
			</div>
		</div>
		<div class="info">
			<h1><?=$item->attrs['name']?></h1>
			<div class="sep-wrapper"><img src="/img/separator.png" alt="" class="separator" /></div>
			<div class="text"><?=$item->attrs['descr']?></div> 
		</div>
	</div>
<?php 	
}
else
{?>
	Товар не найден. 
<?php 
}?>