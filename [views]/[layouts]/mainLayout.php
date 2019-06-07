<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="<?=$_CONFIG['SETTINGS']['description']?>" />
<meta name="keywords" content="<?=$_CONFIG['SETTINGS']['keywords']?>" />
<meta name="viewport" content="width=1200, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

<title><?=$_GLOBALS['TITLE']?></title>

<!--<link rel="stylesheet/less" type="text/css" href="/css/style.less" />
<link rel="stylesheet/less" type="text/css" href="/css/slonne.less" />-->
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/slonne.css" />

<script src="/js/libs/less/less-1.7.3.min.js" type="text/javascript"></script>

<script type="text/javascript" src="/js/libs/jquery-1.11.0.min.js"></script>

<!--Jssor-->
<script type="text/javascript" src="/js/plugins/jssor/jssor.slider.mini.js"></script>

<!--Карусель -->
<script type='text/javascript' src='/js/plugins/jquery.jcarousellite.min.js'></script>

<script type='text/javascript' src='/js/plugins/jquery.simplemodal/jquery.simplemodal.js'></script>
<link rel="stylesheet" type="text/css" href="/js/plugins/jquery.simplemodal/simplemodal.css" />

<!--Slick-->        
<link rel="stylesheet" type="text/css" href="/js/libs/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="/js/libs/slick/slick-theme.css"/>
<script type="text/javascript" src="/js/libs/slick/slick.min.js"></script>

<? require_once(INCLUDE_DIR.'/constants_js.php');?>
<!--стандартные js Slonne-->
<script type="text/javascript" src="/js/common.js"></script>
<!--формы-->
<script src="/js/slonne.forms.js" type="text/javascript"></script>
</head>

<script type="text/javascript" src="/js/libs/highslide-4.1.13/highslide-full.packed.js"></script>
	<link rel="stylesheet" type="text/css" href="/js/libs/highslide-4.1.13/highslide.css" />
	<script type="text/javascript">
		hs.graphicsDir = '/js/libs/highslide-4.1.13/graphics/';
		hs.align = 'center';
		hs.transitions = ['expand', 'crossfade'];
		hs.wrapperClassName = 'dark borderless floating-caption';
		hs.fadeInOut = true;
		hs.dimmingOpacity = .65;
		hs.showCredits = false;
	
		// Add the controlbar
		if (hs.addSlideshow) hs.addSlideshow({
			//slideshowGroup: 'group1',
			interval: 5000,
			repeat: false,
			useControls: true,
			fixedControls: 'fit',
			overlayOptions: {
				opacity: .6,
				position: 'bottom center',
				hideOnMouseOut: true
			}
		});
	</script>

<body >

<a href="#" onclick="return hs.expand(this)" style="display: none; ">!!!</a>
<style>
.highslide-controls {display: block; ;}
</style>


<!--меню-->
<div class="container top">
    <div class="limited">
        <a href="/" id="logo" title="OG"><img src="/img/logo.png" alt=""></a>
        <ul class="left">
        <?php 
        foreach($_GLOBALS['MENU_LEFT'] as $item)
        {?>
        	<li><a href="<?=$item->url()?>" class="<?=$item->id == $_GLOBALS['CURRENT_MODULE']->id ? 'active' : ''?>"><?=$item->attrs['name']?></a></li>
        <?php 
        }?>
            
        </ul>
        <ul class="right">
        <?php 
        foreach($_GLOBALS['MENU_RIGHT'] as $item)
        {?>
        	<li><a href="<?=$item->url()?>" class="<?=$item->id == $_GLOBALS['CURRENT_MODULE']->id ? 'active' : ''?>"><?=$item->attrs['name']?></a></li>
        <?php 
        }?>
            
            <li><a href="#" onclick="return false;" class="zayavka-btn modal">Заявка</a></li>
        </ul>
    </div>
</div>
<!--//меню-->






<!--контент-->
<div class="container">
	<?=$_GLOBALS['CONTENT']?>
</div>
<!--контент-->
    
    
    


<!--префутер-->
<div class="container prefooter">
    <div class="limited">
       
        <div class="section left menu">
            <h4>СТУДИЯ АВТОРСКОГО ДИЗАЙНА «OG»</h4>
            <ul class="menu">
            <?php 
            foreach($_GLOBALS['allMenu'] as $item)
            {?>
            	<li><a href="<?=$item->url()?>"><?=$item->attrs['name']?></a></li>
            <?php 
            }?>
            </ul>
        </div>
        
        
        <?php 
        $contacts = Page::get(97);
        ?>
        <div class="section center">
            <h4>КОНТАКТЫ</h4>
            <?=$contacts->attrs['descr']?>
        </div>
        
        <div class="section right">
            <h4>МЫ В СОЦИАЛЬНЫХ СЕТЯХ</h4>
            <div class="social">
                <a href="https://www.facebook.com/profile.php?id=100001754984426" target="_blank" title="Мы на Facebook"><img src="/img/social-facebook.png" alt=""></a>
                <a href="https://instagram.com/designstudioog/" target="_blank" title="Мы в Instagram"><img src="/img/social-instagram.png" alt=""></a>
            </div>
            <button class="modal">Оставить заявку &rarr; </button>
        </div>
        
    </div>
</div>
<!--//префутер-->


    
    
<!--карта-->
<div class="section map">
    <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=h569Tyy5x3L7qvHrbrQIOgqZWY35BT_H&lang=ru_RU&sourceType=constructor&width=100%&height=300"></script>
</div>    
<!--//карта-->



    
            
<!--футер-->    
<div class="footer">
    <div class="limited">
        <div class="section left"><?=date('Y')?> &copy; Студия авторского дизайна <a href="/">«OG»</a></div>
        <div class="section right">Разработка сайта <a href="http://digicube.kz" class="digicube">DigitalCube</a></div>
    </div>
</div>
<!--футер-->    









<!--всплывашка-->
<div  id="float-form-wrapper" style="display: none; ">
	<div style="border: 0px solid red; margin: 0px auto; width: 800px; padding: 0; position: relative; ">
		<a href="#close" id="float-form-close" onclick="hs.close(); return false; " >&times; </a>
		<?=Slonne::view('forms/floatForm.php');?>
	</div>
</div>
<!--//всплывашка-->






<iframe name="iframe1" style="width: 700px; height: 400px;  background: #fff; display: none;  ">asdasd</iframe>


</body>


</html>


<script>
$(document).ready(function(){
	/*$('.float-btn').click(function(){
		$('#float-form1').modal({containerCss: {padding: '0', border: '0', background: '#a49368'}}); return false;
	})
	$('.float-btn2').click(function(){
		$('#float-form2').modal({containerCss: {padding: '0', border: '0', background: '#a49368'}}); return false;
	})*/

	$('.modal').click(function(event){
		event.preventDefault();
		hs.htmlExpand(this, {wrapperClassName: 'borderless ', dimmingOpacity: 0.94, showControls: false,  contentId: 'float-form-wrapper', outlineType:null, width: 802, height: 500});
		$('.highslide-controls').css('display', 'none');
		
	})

	/*hs.htmlExpand(this, {wrapperClassName: 'borderless ', dimmingOpacity: 0.95, contentId: 'float-form-wrapper', outlineType:null, width: 802, height: 500});*/
    
    
});
</script>