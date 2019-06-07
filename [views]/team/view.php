<?php
$item = $MODEL['item']; 
?>


<div class="services">
<!--
<div><input type="hidden" id="" name="" value="gfdfgdfg"><input type="hidden" id="FCKeditor1___Config" value=""><iframe id="FCKeditor1___Frame" src="/<?=INCLUDE_DIR?>/FCKeditor/editor/fckeditor.html?InstanceName=asasas&Toolbar=Slonne" style="min-width: 640px;" width="100%" height="400px" ></iframe></div>


<script src="/<?=INCLUDE_DIR?>/ckeditor_4.5.3_full/ckeditor/ckeditor.js"></script>
<textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>-->

	<div class="limited">
		<div class="content slim">
		
			<!--крамбсы-->
			<? Slonne::view(SHARED_VIEWS_DIR.'/crumbs.php', $MODEL['crumbs']);?>
			<!--//крамбсы-->
			
			
			<h1><?=$item->attrs['name']?></h1>
			<div class="anons-heading"><?=$item->attrs['anons']?></div>
			
			
			<div class="top-wrapper">
				<div class="text"><?=$item->attrs['descr']?></div>
				<div class="pic"><img src="<?=Media::img($item->attrs['main_pic'].'&width=500')?>" alt="" /></div>
				<div class="clear"></div>
			</div>
			
		</div>
	</div>
	
	
	<?php 
	if(count($item->attrs['pics']))
	{?>
	<div class="container slider" id="slider" >
		<?php 
		foreach($item->attrs['pics'] as $pic)
		{?>
		<div class="item "><a href="/<?=UPLOAD_IMAGES_REL_DIR?>/<?=$pic->path?>" onclick="return hs.expand(this)" title="Увеличить"><img src="<?=Media::img($pic->path.'&height=349')?>" alt="" /></a></div>
		<?php 
		}?> 
		
	</div>
	<script>
	$(document).ready(function(){
	  $('#slider').slick({
		  autoplay: true,
		  autoplaySpeed: 2000,
		  slidesToShow: 3,
		  slidesToScroll: 2,
		  infinite: true, 
		  centerMode: true,
		  variableWidth: true,
	  });
	});
	</script>
	<?php 
	}?>
	
	
	
	<div class="limited">
		<div class="content slim">
		
			<?=$item->attrs['descr2'];?>
			
		</div>
	</div>
	


</div>