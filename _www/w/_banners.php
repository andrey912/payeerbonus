<?PHP
// Баннеры
$str_title = 'Баннеры';
if($req_uri != '/banners'){Header("Location: /banners");die();}
@require_once("_add/_header.php");
@require_once("_add/_menu.php");

$refka = $func->zpurse($payeer);
?>
									<h1>Баннеры</h1>
									
									<div class="panel-banner">
										<span>468&times;60</span>
										<a href="http://<?=$_SERVER['SERVER_NAME'];?>/?inv=<?=$refka;?>" target="_blank"><img src="img/1.gif" /></a>
										<textarea readonly="readonly"><a href="http://<?=$_SERVER['SERVER_NAME'];?>/?inv=<?=$refka;?>" target="_blank"><img src="http://<?=$_SERVER['SERVER_NAME'];?>/img/1.gif" /></a></textarea>
									</div>
									<div class="panel-banner">
										<span>200&times;300</span>
										<a href="http://<?=$_SERVER['SERVER_NAME'];?>/?inv=<?=$refka;?>" target="_blank"><img src="img/2.gif" /></a>
										<textarea readonly="readonly"><a href="http://<?=$_SERVER['SERVER_NAME'];?>/?inv=<?=$refka;?>" target="_blank"><img src="http://<?=$_SERVER['SERVER_NAME'];?>/img/2.gif" /></a></textarea>
									</div>
									<div class="panel-banner">
										<span>100&times;100</span>
										<a href="http://<?=$_SERVER['SERVER_NAME'];?>/?inv=<?=$refka;?>" target="_blank"><img src="img/3.gif" /></a>
										<textarea readonly="readonly"><a href="http://<?=$_SERVER['SERVER_NAME'];?>/?inv=<?=$refka;?>" target="_blank"><img src="http://<?=$_SERVER['SERVER_NAME'];?>/img/3.gif" /></a></textarea>
									</div>
<?PHP
@require_once("_add/_footer.php");
?>