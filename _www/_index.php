<?PHP                                                                                                                                                                                                                                                                                                                                                                                                                                                           
// главная страница
$str_title = 'раздача бонусов на Payeer кошелек';
if($req_uri != '/'){Header("Location: /");die();}
@require_once("_add/_header.php");
if(isset($_SESSION["payeer"])){@require_once("_add/_menu.php");}
?>
									<h1>Бесплатная раздача бонусов на Payeer кошелек</h1>
									
									<p>Получать бонусы легче легкого. Вам даже не нужно регистрироваться. Просто введите номер своего Payeer кошелька в форму ниже.</p>
<?PHP
if(!isset($_SESSION["payeer"])){

if(isset($_POST["payeer"])){
// задержка от 0.00001 до 0.01 секунды для разделения одновременных запросов
$rand = mt_rand(10, 10000);
usleep($rand);
// защита от двойных post запросов
if(!isset($_SESSION["ghkesad"]) OR $_SESSION["ghkesad"] <= $time-60){
$_SESSION["ghkesad"] = $time;
// проверяем сессию
if(isset($_SESSION["ghkesad"])){

$payeer = $func->procVar($_POST["payeer"],0,0,0,'payeer');
// если кошелек корректный
if($payeer !== false){

// если нет такого кошелька в системе
$bd->Query("SELECT COUNT(*) FROM `users_nykfageubf` WHERE `payeer` = '$payeer'");
if($bd->FetchRow() == 0){
$sql = "";
// определяем спонсора
if(isset($_SESSION["inv"])){
$ref = $func->procVar($_SESSION["inv"],0,0,0,'no');
} elseif(isset($_COOKIE["inv"])){
$ref = $func->procVar($_COOKIE["inv"],0,0,0,'no');
} else {$ref = 'cuomaeomcx';}
$ref = $func->rpurse($ref);
$bd->Query("SELECT COUNT(*) FROM `users_nykfageubf` WHERE `payeer` = '$ref'");
if($bd->FetchRow() == 1){
$sponsor = $ref;
} else {$sponsor = 'P8546321457';}
// добавляем юзера
$sql.= "INSERT INTO `users_nykfageubf` (`payeer`,`sponsor`,`date_reg`) VALUES ('$payeer','$sponsor','$time'); ";
// добавляем спонсору рефа
$sql.= "UPDATE `users_nykfageubf` SET `all_refs` = `all_refs` + '1' WHERE `payeer` = '$sponsor'; ";
// апдейтим статистику
$sql.= "UPDATE `stat_vexahkertg` SET `users` = `users` + '1' WHERE `id` = '1'; ";
$bd->MultiQuery($sql);
}

$_SESSION["payeer"] = $payeer;
unset($_SESSION["ghkesad"]);
Header("Location: /stats");
die();

} else{echo '<div class="alert-msg"><a href="#" class="close-alert"><i class="fa fa-times"></i></a><p>Кошелек указан неверно.</p></div>';}
unset($_SESSION["ghkesad"]);
}
}
}
?>
									<form action="" method="post">
										<p class="contact-form-email">
											<label for="payeer">Ваш Payeer кошелек</label>
											<input type="text" name="payeer" maxlength="11" />
										</p>
										<input type="submit" value="Войти в аккаунт" />
									</form>
<?PHP
}
?>
									<p>Увеличьте свой заработок с помощью нашей партнерской программы. Получайте 10% от суммы всех бонусов, полученных Вашими рефералами.</p>
									
<?PHP
@require_once("_add/_footer.php");
?>