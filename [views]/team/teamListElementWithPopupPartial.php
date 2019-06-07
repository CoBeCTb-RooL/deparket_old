<?php
$item = $MODEL; 
//vd($MODEL);
?>


<?php
$onclick='return hs.htmlExpand(this, {wrapperClassName: \'borderless \', dimmingOpacity: 0.85, showControls: false, contentId: \'worker-'.$item->id.'\', outlineType:null});';  
?>



<div class="item">
	<div class="pic">
		<a href="#view" onclick="<?=$onclick?>" title="<?=$item->attrs['name']?>"><img src="<?=Media::img($item->attrs['pic'].'&width=283&height=227')?>"  id="thumb<?=$item->id?>"></a>
	</div>
	<div class="info">
		<div class="name"><a href="#view" onclick="<?=$onclick?>" ><?=$item->attrs['name']?></a></div>
		<div class="position"><?=$item->attrs['position']?></div>
		<div class="email"><a href="mailto:<?=$item->attrs['email']?>"><?=$item->attrs['email']?></a></div>
	</div>
	
	<div class="floating-team-view"  id="worker-<?=$item->id?>">
		
		<div class="navigation">
			<a  class="prev" href="#" onclick="hs.previous(); return false; ">&larr;</a>
			<a  class="close" href="#" onclick="hs.close(); return false; ">ЗАКРЫТЬ</a>
			<a  class="next" href="#" onclick="hs.next(); return false; ">&rarr; </a>
		</div>
		
		<img class="pic" src="<?=Media::img($item->attrs['pic'].'&width=700&height=400')?>" alt=""  />
    	<div class="info">
    		<div class="name"><?=$item->attrs['name']?></div>
    		<div class="position"><?=$item->attrs['position']?></div>
    		<div class="text"><?=$item->attrs['descr']?></div>
    	</div>
	</div>
	
</div>