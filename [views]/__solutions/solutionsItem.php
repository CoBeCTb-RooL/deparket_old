<?php
$item = $MODEL['item'];
$crumbs = $MODEL['crumbs'];


?>



<div class="breadcrumbs" style="margin-bottom: 60px;">
	<?=join(" &nbsp;&nbsp;/&nbsp;&nbsp; ", $crumbs)?>
	<h1 class="title-page"><?=$item->attrs['name']?></h1>
</div>


<p/>
<?php
if($item)
{?>
	<div class="row">
	<?
	foreach($item->subs as $key=>$sub)
	{?>
		<div class="col-sm-3 module_cont module_iconboxes pb75 pt50 animate fadeInDown" data-anim-delay="250" data-anim-type="fadeInDown">
			<div class="module_content shortcode_iconbox type2">
				<a href="javascript:void(0);">			
					<div class="iconbox_wrapper">
						<div class="icon_title_wrap">
							<div class="ico"><img src="/<?=UPLOAD_IMAGES_REL_DIR?>/<?=$sub->attrs['pic']?>" class="icon_def" alt="" height="80" width="80"><img src="/img/retina/icons/icon12.png" class="icon_retina" alt="" height="80" width="80"></div>
							<h5 class="iconbox_title"><?=$sub->attrs['name']?></h5>
						</div>
						<div class="iconbox_body">						
							<p><?=$sub->attrs['descr']?></p>
						</div>					
					</div>
				</a>
			</div>
		</div>
	<?php 	
	}?>
	</div>
	
	
	
	<!--ДОП ИНФО-->
	<?php
	if($item->dopInfo)
	{?>
	<div class="row">
		<div class="col-sm-6 module_cont pb30">
		<?php
		foreach($item->dopInfo as $key=>$sub)
		{?>
			<div class="module_content shortcode_iconbox type4 animate fadeInLeft" data-anim-delay="250" data-anim-type="fadeInLeft">
				<a href="javascript:void(0);">			
					<div class="iconbox_wrapper">
						<div class="icon_title_wrap">
							<div class="ico"><img src="/<?=UPLOAD_IMAGES_REL_DIR?>/<?=$sub->attrs['pic']?>" class="icon_def" alt="" height="80" width="80"><img src="/<?=UPLOAD_IMAGES_REL_DIR?>/<?=$sub->attrs['pic']?>" class="icon_retina" alt="" height="56" width="80"></div>
							<h5 class="iconbox_title">Fully Responsive</h5>
						</div>
						<div class="iconbox_body">						
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit.</p>
						</div>					
					</div>
				</a>
			</div>
		<?	
		}?>
		</div> 
		<div class="col-sm-6 module_cont pb30 animate fadeIn" data-anim-delay="250" data-anim-type="fadeIn">
			<div class="mr_20 ml20">
				<img src="/<?=UPLOAD_IMAGES_REL_DIR?>/<?=$item->attrs['pic']?>" alt="">
			</div>
		</div>        	
	 </div>
	<?php 	
	} 
	?>
	<!--//ДОП ИНФО-->
	
	
	
	
	<!--КАРТИНКИ ПО РЕШЕНИЮ-->
	<div style="margin-left: -89.5px; width: 1349px;" class="fw_block bg_start pt74 pb50 grey_bg mb60">
		<div style="padding-left: 89.5px; padding-right: 89.5px;" class="fw_wrapinner">
			<div class="row">
				<div class="col-sm-12 module_cont pb0">
					<div class="bg_title">
						<h2 class="fleft">Галерея по решению</h2>
						<!-- Filter_block -->
						<div class="filter_block" style="display: none;">
							<div class="filter_navigation">
								<ul id="options" class="splitter">
									<li>
										<ul data-option-key="filter" class="optionset">
											<li class="selected"><a data-title="9" data-option-value="*" data-catname="all" href="#filter">All Works</a></li>
											<li><a data-title="3" data-option-value=".branding" data-catname="branding" href="#filter">Branding</a></li>
											<li><a data-title="2" data-option-value=".polygraphy" data-catname="polygraphy" href="#filter">Polygraphy</a></li>
											<li><a data-title="2" data-option-value=".textstyle" data-catname="textstyle" href="#filter">Text Style</a></li>
											<li><a data-title="2" data-option-value=".webui" data-catname="webui" href="#filter">Web UI</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
						<!-- //Filter_block -->
						<div class="clear"></div>
					</div>                                   
				</div>
			</div> 
				<?
				//vd($item);
				?>
			<div class="row">
				<div style="position: relative; overflow: hidden; height: 987px;" class="sorting_block image-grid featured_items photo_gallery isotope" id="list">
					
				<?php
				foreach($item->attrs['pics'] as $key=>$pic)
				{?>
					<div style="position: absolute; left: 0px; top: 0px; transform: translate(0px, 0px);" class="col-sm-4 branding element isotope-item">                    
						<div class="item animate bounceIn" data-anim-delay="250" data-anim-type="bounceIn">
							<div class="item_wrapper">                                  
								<div class="img_block wrapped_img">
									<img src="/<?=UPLOAD_IMAGES_REL_DIR?>/<?=$pic->path?>" alt="">
									<span class="block_fade"></span>
									<div class="post_hover_info">
										<div class="featured_items_title">
											<h5><?=$pic->title[LANG]?></h5>
										</div>
										<div class="featured_meta"><!--Print Design--></div> 
										<a href="/<?=UPLOAD_IMAGES_REL_DIR?>/<?=$pic->path?>" class="photozoom featured_ico_link view_link"><i class="icon-expand"></i></a>
										
									</div>
								</div>                                                                                                            
							</div>
						</div>                                  
					</div>
				<?php 	
				} 
				?>
				
					
					
					                                                                                                                       
				</div>
				<div class="clear"></div>
				<!--<div class="text-center animate" data-anim-delay="250" data-anim-type="fadeInUp"><a href="javascript:void(0);" class="load_more_works shortcode_button btn_normal btn_type5">Load More</a></div>-->
			</div>                             
		</div>
	</div>
	<!--//КАРТИНКИ ПО РЕШЕНИЮ-->
	
	
<?php 	
} 
else
{?>
	Раздел не найден.
<?php 	
}
?>