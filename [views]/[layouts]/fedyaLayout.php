<? 
/*vd($_GLOBALS['META_KEYWORDS']);
echo '<hr>';
vd($_GLOBALS['META_DESCRIPTION']);*/
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="<?=$_GLOBALS['META_KEYWORDS'] ? $_GLOBALS['META_KEYWORDS'] : $_CONFIG['SETTINGS']['description']?>" />
<meta name="keywords" content="<?=$_GLOBALS['META_DESCRIPTION'] ? $_GLOBALS['META_DESCRIPTION'] : $_CONFIG['SETTINGS']['keywords']?>" />
<meta name="viewport" content="width=1200, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

<title><?=$_GLOBALS['TITLE']?></title>

<link rel="stylesheet/less" type="text/css" href="/css/style.less" />
<link rel="stylesheet/less" type="text/css" href="/css/slonne.less" />
<!--<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/slonne.css" />-->

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
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '1139508296208019'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=1139508296208019&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
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





<!--шапка-->
<div class="container shapka">
	<div class="limited">
		<a href="/"><img src="/img/logo.png" alt="" class="logo" /></a>
		<div class="contacts">
			<table>
				<tr>
					<td >Телефоны: </td>
					<td style="padding: 0 0px 0 30px; text-align: right; ">+7 (707) 759-89-80<br/>+7 (701) 759-89-80</td>
				</tr>
				<tr>
					<td>Адрес: </td>
					<td style="padding: 0 0px 0 30px; text-align: right; ">мкр. Жана Кайрат ул. 3-я линия дом 62</td>
				</tr>
			</table>
		</div>
		<div class="social">SOCIAL</div>
	</div>
</div>
<!--//шапка-->



<!--меню-->
<div class="container menu">
    <div class="limited">
        <ul class="left">
        <?php 
        foreach($_GLOBALS['MENU'] as $item)
        {?>
        	<li>
        		<a href="<?=$item->url()?>" class="<?=$item->id == $_GLOBALS['CURRENT_MODULE']->id ? 'active' : ''?>" style="background-image: url(<?=Media::img($item->attrs['pic'].'')?>)">
        			<div class="title">
        				<div class="title2"><?=$item->attrs['name']?></div>
        			</div>
        		</a>
        	</li>
        <?php 
        }?>   
        </ul>
    </div>
</div>
<!--//меню-->






<!--контент-->
<div class="container ">
	<?=$_GLOBALS['CONTENT']?>
</div>
<!--контент-->
    
    
    


<!--префутер-->
<div class="container prefooter">
	<div class="logo-board">
		<img src="/img/logo.png" alt="" />
	</div>
    <div class="limited2">
       
        <div class="section left ">
            <h4>Напольные покрытия «Decor Parquet»</h4>
            <ul class="bottom-menu">
            <?php 
            foreach($_GLOBALS['MENU'] as $item)
            {?>
            	<li><a href="<?=$item->url()?>"><?=$item->attrs['name']?></a></li>
            <?php 
            }?>
            </ul>
        </div>
        
        <div class="section articles">
        	<h4>Полезные статьи</h4>
        	<div class="txt">Полезные статьи</div>
        </div>
        
        <?php 
        $contacts = Page::get(97);
        ?>
        <div class="section center">
            <h4>Контакты</h4>
            <?=$contacts->attrs['descr']?>
        </div>
        
        <div class="section right">
            <h4>Мы в социальных сетях</h4>
            <div class="social">
                <a href="http://deparket.kz" target="_blank" title="Мы на Facebook"><img src="/img/social-facebook.png" alt=""></a>
                <a href="http://instageam.com/deparket_kz" target="_blank" title="Мы в Instagram"><img src="/img/social-instagram.png" alt=""></a>
            </div>
            <button class="modal">Оставить заявку &rarr; </button>
        </div>
        
    </div>
</div>
<!--//префутер-->


    
    
<!--карта-->
<div class="section map">
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=UrmokEO3LWr36Ui77jChAe4R04R4H17H&width=100%&height=300&lang=ru_RU&sourceType=constructor&scroll=true"></script>
</div>    
<!--//карта-->



    
            
<!--футер-->    
<div class="footer">
    <div class="limited">
        <div class="section left"><?=date('Y')?> &copy; <a href="/">«Decor Parquet»</a></div>
        <div class="section right">Powered by <a href="javascript:return false;" class="digicube">SLoNNe</a></div>
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