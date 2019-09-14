<?PHP
@require_once("_add/_head.php");

if(isset($_GET["str"])) {
$menu = $func->procVar($_GET["str"],0,0,0,'no');
$menu = strval($menu);
switch($menu){

case "wall": @require_once("_www/_wall.php"); break;
case "rules": @require_once("_www/_rules.php"); break;
case "bonuses": @require_once("_www/_bonuses.php"); break;

default: @require_once("_www/_404.php"); break;
}
} else @require_once("_www/_index.php");
?>