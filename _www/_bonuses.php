<?PHP
$str_title = 'Последние 20 бонусов';
if($req_uri != '/bonuses'){Header("Location: /bonuses");die();}
@require_once("_add/_header.php");
if(isset($_SESSION["payeer"])){@require_once("_add/_menu.php");}
?>
									<h1>Последние 20 бонусов</h1>
									<table class="table table4">
										<thead>
											<tr>
												<th>Кошелек</th>
												<th>Сумма</th>
												<th>Дата получения</th>
											</tr>
										</thead>
										<tbody>
<?PHP
$bd->Query("SELECT `payeer`,`summ`,`dates_add` FROM `bonus_vrleqdaxjk` ORDER BY `id` DESC LIMIT 20");
if($bd->NumRows() > 0){
while($a = $bd->FetchArray()){
$payeer = substr($a["payeer"],0,strlen($a["payeer"])-3).'<span class="blue">XXX</span>';
$summ = $a["summ"];
$dates_add = $a["dates_add"];
?>
											<tr>
											  <td><?=$payeer;?></td>
											  <td><?=$func->NumFormat($summ);?> &#8381;</td>
											  <td><?=$func->TimeTime($dates_add);?></td>
											</tr>
<?PHP
}
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
@require_once("_add/_footer.php");
?>