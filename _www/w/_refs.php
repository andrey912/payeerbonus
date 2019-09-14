<?PHP
// Рефералы
$str_title = 'Рефералы';
if($req_uri != '/refs' AND !preg_match("|^[/refs?p=]+[0-9]{1,5}$|u",$req_uri)){Header("Location: /refs");die();}
@require_once("_add/_header.php");
@require_once("_add/_menu.php");

$refka = $func->zpurse($payeer);
?>
									<h1>Рефералы</h1>
									<p>Мы платим 10% от суммы каждого бонуса, полученного Вашими рефералами.</p>
									<div class="panel-ref">Ваша реферальная ссылка: <a href="http://<?=$_SERVER['SERVER_NAME'];?>/?inv=<?=$refka;?>" target="_blank">http://<?=$_SERVER['SERVER_NAME'];?>/?inv=<?=$refka;?></a></div>
									
									
									<table class="table">
										<thead>
											<tr>
												<th>Кошелек</th>
												<th>Заработал на бонусах</th>
												<th>Ваш заработок</th>
<?PHP
if($all_refs >= 5 AND $balance >= $minpay){
?>
												<th>Рефералов</th>
<?PHP
}
?>
											</tr>
										</thead>
										<tbody>

						
<?PHP
$pages = 0;
$bd->Query("SELECT COUNT(*) FROM `users_nykfageubf` WHERE `sponsor` = '$payeer'");
$kol = $bd->FetchRow();
if($kol > 0){

$elems = 10;
$pages = ceil($kol/$elems);
if($pages < 1) {$pages = 1;}
if(!isset($_GET['p'])){$p = 1;} else {$p = $func->procVar($_GET['p'],0,1,0,'no');}
if($p < 1){$p = 1;}
if($p > $pages){$p = $pages;}
$start = ($p - 1)*$elems;

$bd->Query("SELECT `payeer`,`bns_kol`,`to_sponsor`,`all_refs` FROM `users_nykfageubf` WHERE `sponsor` = '$payeer' ORDER BY `to_sponsor` DESC LIMIT ".$start.",".$elems);
while($a = $bd->FetchArray()){
$payeer = substr($a["payeer"],0,strlen($a["payeer"])-3).'<span class="blue">XXX</span>';
$bns_kol = $a["bns_kol"];
$to_sponsor = $a["to_sponsor"];
$all_refss = $a["all_refs"];
?>
											<tr>
											  <td><?=$payeer;?></td>
											  <td><?=$func->NumFormat($bns_kol);?> </td>
											  <td><?=$func->NumFormat($to_sponsor);?> </td>
<?PHP
if($all_refs >= 5 AND $balance >= $minpay){
?>
											  <td><?=$all_refss;?></td>
<?PHP
}
?>
											</tr>
<?PHP
}
unset($a);
} else {
?>
											<tr>
											  <td colspan="4">-</td>
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