<?PHP
// статистика
$str_title = 'Статистика';
if($req_uri != '/stats'){Header("Location: /stats");die();}
@require_once("_add/_header.php");
@require_once("_add/_menu.php");

$bd->Query("SELECT SUM(`summa`) FROM `pays_tnmleafeuj` WHERE `payeer` = '$payeer' AND `status` = '0'");
$cash_wait = $bd->FetchRow();
?>
									<h1>Статистика</h1>
									<div class="panel-stats">
										<div>Заработано на бонусах <span><?=$func->NumFormat($bns_kol);?> </span></div>
										<div>Заработано на рефералах <span><?=$func->NumFormat($from_refs);?> </span></div>
										<div>Суммарный заработок <span><?=$func->NumFormat($bns_kol+$from_refs);?> </span></div>
										<div>Рефералов <span><?=$func->NumFormat($all_refs,0);?></span></div>
										<div>Заказано на выплату <span><?=$func->NumFormat($cash_wait);?> </span></div>
										<div>Выплачено <span><?=$func->NumFormat($cash_out);?> </span></div>
									</div>
<?PHP
@require_once("_add/_footer.php");
?>