<?php
	include './../../../wwwSer/files/Script/VariableHead.php';
	include $GLOBALS['vMarge'].'./../wwwSer/files/Script/phpHead.php';
?>
<!DOCTYPE html>
<html lang="fr">
	<?php
		include $GLOBALS['vMarge'].'./../wwwSer/files/HeaderPage/Head.php';
	?>
<body>
	<?php
		include $GLOBALS['vMarge'].'./../wwwSer/files/HeaderPage/Header.php';
		include $Page; //./../wwwSer/files/MainPage/ ? .php
		include $GLOBALS['vMarge'].'./../wwwSer/files/FooterPage/Footer.php';
	?>
</body>
	<?php
		if(!empty($ScriptPageTage)){
			include $GLOBALS['vMarge'].'./../wwwSer/files/Script/JavaScript'.$JavaScriptPageTage;
		}
	?>
</html>

