<?PHP
// Бонусы
$str_title = 'Бонусы';
if($req_uri != '/bonus' AND !preg_match("|^[/bonus?p=]+[0-9]{1,5}$|u",$req_uri)){Header("Location: /bonus");die();}
@require_once("_add/_header.php");
@require_once("_add/_menu.php");
?>
									<h1>Бонусы</h1>
<?PHP
$chbns = 2;
// проверяем, что прошло 20 мин от последнего бонуса
$bd->Query("SELECT `dates_add` FROM `bonus_vrleqdaxjk` WHERE `payeer` = '$payeer' AND `dates_add` > '$back20min' ORDER BY `dates_add` DESC LIMIT 1");
if($bd->NumRows() == 1){
$last_bns = $bd->FetchRow();
$chbns = 1;

$data_due = $last_bns+60*20;
$dd_1 = date("Y-m-d",$data_due);
$dd_2 = date("H:i:s",$data_due);
$data_due = $dd_1.'T'.$dd_2;

$data_now = $time;
$dn_1 = date("Y-m-d",$data_now);
$dn_2 = date("H:i:s",$data_now);
$data_now = $dn_1.'T'.$dn_2;
?>
								<div class="timer">
									<div class="soon"
										 data-separator=":"
										 data-format="m,s"
										 data-scale-max="l"
										 data-separate-chars="false">
									</div>
								</div>
								<script type="text/javascript">
									(function(){
										var i=0,soons = document.querySelectorAll('.timer .soon'),l=soons.length;
										for (;i<l;i++) {
											soons[i].setAttribute('data-due','<?=$data_due;?>');
											soons[i].setAttribute('data-now','<?=$data_now;?>');
										}
									}());
								</script>
								<br />Спасибо, бонус начислен.
<?PHP
} else {
// записываем номер для бонуса
$num = mt_rand(1,5);
$bd->Query("SELECT COUNT(*) FROM `num_bonus_wbawhty` WHERE `payeer` = '$payeer'");
if($bd->FetchRow() > 0){
$bd->Query("UPDATE `num_bonus_wbawhty` SET `num` = '$num' WHERE `payeer` = '$payeer'");
} else {
$bd->Query("INSERT INTO `num_bonus_wbawhty` (`payeer`,`num`) VALUES ('$payeer','$num')");
}

// 0 - catcut отключен, 1 - catcut включен
$catcut = 0;

if($num == 1){
if($catcut == 1){
$bnslink = 'http://catcut.net/7777777';
} else {$bnslink = 'http://'.$_SERVER['SERVER_NAME'].'/get.php?c=1';}
} elseif($num == 2){
if($catcut == 1){
$bnslink = 'http://catcut.net/7777777';
} else {$bnslink = 'http://'.$_SERVER['SERVER_NAME'].'/get.php?c=2';}
} elseif($num == 3){
if($catcut == 1){
$bnslink = 'http://catcut.net/7777777';
} else {$bnslink = 'http://'.$_SERVER['SERVER_NAME'].'/get.php?c=3';}
} elseif($num == 4){
if($catcut == 1){
$bnslink = 'http://catcut.net/7777777';
} else {$bnslink = 'http://'.$_SERVER['SERVER_NAME'].'/get.php?c=4';}
} elseif($num == 5){
if($catcut == 1){
$bnslink = 'http://catcut.net/7777777';
} else {$bnslink = 'http://'.$_SERVER['SERVER_NAME'].'/get.php?c=5';}
}
?>
									<p>Чтобы получить бонус сделайте следуещее:</p>
									<p>1. Кликните по <b>верхнему левому</b> баннеру. <span id="result1"></span></p>
									<p>2. Кликните по <b>верхнему правому</b> баннеру. <span id="result2"></span></p>
									<p>3. Кликните по <b>нижнему левому</b> баннеру. <span id="result3"></span></p>
									<p>4. Кликните по <b>нижнему правому</b> баннеру. <span id="result4"></span></p>
									<p>5. Кликните по <b>ссылке</b>  справа. <span id="result5"></span></p>
									<div class="none" id="panelb">
										<p><a href="<?=$bnslink;?>" class="button">Получить бонус</a></p>
									</div>
<?PHP
}
?>
									<table class="table table3">
										<thead>
											<tr>
												<th>Сумма</th>
												<th>Дата получения</th>
											</tr>
										</thead>
										<tbody>
<?PHP
$pages = 0;
$bd->Query("SELECT COUNT(*) FROM `bonus_vrleqdaxjk` WHERE `payeer` = '$payeer'");
$kol = $bd->FetchRow();
if($kol > 0){

$elems = 10;
$pages = ceil($kol/$elems);
if($pages < 1) {$pages = 1;}
if(!isset($_GET['p'])){$p = 1;} else {$p = $func->procVar($_GET['p'],0,1,0,'no');}
if($p < 1){$p = 1;}
if($p > $pages){$p = $pages;}
$start = ($p - 1)*$elems;

$bd->Query("SELECT `summ`,`dates_add` FROM `bonus_vrleqdaxjk` WHERE `payeer` = '$payeer' ORDER BY `id` DESC LIMIT ".$start.",".$elems);
while($a = $bd->FetchArray()){
$payeer = substr($a["payeer"],0,strlen($a["payeer"])-3).'<span class="blue">XXX</span>';
$summ = $a["summ"];
$dates_add = $a["dates_add"];
?>
											<tr>
											  <td><?=$func->NumFormat($summ);?> </td>
											  <td><?=$func->TimeTime($dates_add);?></td>
											</tr>
<?PHP
}
unset($a);
} else {
?>
											<tr>
											  <td colspan="2">-</td>
											</tr>
<?PHP
}
?>
										</tbody>
									</table>
<?PHP
if($pages > 1){echo $func->Navigation($p,$pages);}
@require_once("_add/_footer.php");
?>