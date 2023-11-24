<?php
	include './../../../wwwSer/files/Script/VariableHead.php';
	include $vMarge.'./../wwwSer/files/Script/phpHead.php';
?>
<!DOCTYPE html>
<html lang="fr">
	<?php
		include $vMarge.'./../wwwSer/files/HeaderPage/Head.php';
	?>
<body>
	<?php
		include $vMarge.'./../wwwSer/files/HeaderPage/Header.php';
		include $Page; //./../wwwSer/files/MainPage/ ? .php
		include $vMarge.'./../wwwSer/files/FooterPage/Footer.php';
	?>
</body>
	<?php
		if(!empty($ScriptPageTage)){
			include $vMarge.'./../wwwSer/files/Script/JavaScript'.$JavaScriptPageTage;
		}
	?>
</html>

