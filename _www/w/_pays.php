<?PHP
// Выплаты
$str_title = 'Выплаты';
if($req_uri != '/pays' AND !preg_match("|^[/pays?p=]+[0-9]{1,5}$|u",$req_uri)){Header("Location: /pays");die();}
@require_once("_add/_header.php");
@require_once("_add/_menu.php");
?>
									<h1>Выплаты</h1>
									<p>Выплаты производятся 1 раз в неделю. Минимальная сумма для вывода 10 рублей.</p>
<?PHP
// рефы собравшие 100 бонусов
$bd->Query("SELECT COUNT(*) FROM `users_nykfageubf` WHERE `sponsor` = '$payeer' AND `bns_kol` >= '750' AND `all_refs` >= '5' AND `banned` = '0'");
$refact = $bd->FetchRow();

if(isset($_POST["pay"])){
if($balance >= $minpay){
if($all_refs >= 5){
if($refact >= 5){
// задержка от 0.00001 до 0.01 секунды для разделения одновременных запросов
$rand = mt_rand(10, 10000);
usleep($rand);
// защита от двойных post запросов
if(!isset($_SESSION["ghkesad"]) OR $_SESSION["ghkesad"] <= $time-60){
$_SESSION["ghkesad"] = $time;
// проверяем сессию
if(isset($_SESSION["ghkesad"])){

$sql = "";
// снимаем с баланса
$sql.= "UPDATE `users_nykfageubf` SET `balance` = `balance` - '$balance' WHERE `payeer` = '$payeer'; ";
// добавляем выплату
$sql.= "INSERT INTO `pays_tnmleafeuj` (`payeer`,`summa`,`dates_add`) VALUES ('$payeer','$balance','$time'); ";
$bd->MultiQuery($sql);
unset($_SESSION["ghkesad"]);
Header("Location: /pays");
die();

unset($_SESSION["ghkesad"]);
}
}
} else{echo '<div class="alert-msg"><a href="#" class="close-alert"><i class="fa fa-times"></i></a><p>5 рефералов должны заработать на бонусах по 50 рублей и пригласить по 5 рефералов.</p></div>';}
} else{echo '<div class="alert-msg"><a href="#" class="close-alert"><i class="fa fa-times"></i></a><p>Пригласите 5 рефералов.</p></div>';}
} else{echo '<div class="alert-msg"><a href="#" class="close-alert"><i class="fa fa-times"></i></a><p>На балансе не хватает денег.</p></div>';}
}
?>
									<form action="" method="post">
										<p>Баланс: <?=$func->NumFormat($balance);?> </p>
										<input name="pay" type="hidden" />
										<input type="submit" value="Выплатить на <?=$payeer;?>" />
									</form>
									<table class="table table2">
										<thead>
											<tr>
												<th>Сумма</th>
												<th>Дата заказа</th>
												<th>Статус обработки</th>
											</tr>
										</thead>
										<tbody>
<?PHP
$pages = 0;
$bd->Query("SELECT COUNT(*) FROM `pays_tnmleafeuj` WHERE `payeer` = '$payeer'");
$kol = $bd->FetchRow();
if($kol > 0){

$elems = 10;
$pages = ceil($kol/$elems);
if($pages < 1) {$pages = 1;}
if(!isset($_GET['p'])){$p = 1;} else {$p = $func->procVar($_GET['p'],0,1,0,'no');}
if($p < 1){$p = 1;}
if($p > $pages){$p = $pages;}
$start = ($p - 1)*$elems;

$bd->Query("SELECT `summa`,`dates_add`,`status` FROM `pays_tnmleafeuj` WHERE `payeer` = '$payeer' ORDER BY `id` DESC LIMIT ".$start.",".$elems);
while($a = $bd->FetchArray()){
$summa = $a["summa"];
$dates_add = $a["dates_add"];
$status = $a["status"];
if($status == 0){
$status = 'принята в обработку';
} elseif($status == 1){
$status = 'деньги отправлены';
} elseif($status == 2){
$status = 'в выплате отказано';
}
?>
											<tr>
											  <td><?=$func->NumFormat($summa);?> &#8381;</td>
											  <td><?=$func->TimeTime($dates_add);?></td>
											  <td><?=$status;?></td>
											</tr>
<?PHP
}
unset($a);
} else {
?>
											<tr>
											  <td colspan="3">-</td>
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