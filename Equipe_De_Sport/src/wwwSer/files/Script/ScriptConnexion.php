<?php

$vUserV = sha1('admEquipe');
$vmdbV = sha1('passEquipe@1234');

$PathPage = $vMarge.'./../wwwSer/files/MainPage/';
if(!empty($_POST["BtnLogOut"]) && ($_POST["BtnLogOut"] == 'ClickBtnLogOut')){
    $_SESSION["sEstConnexion"] = 0;
    $Page = $PathPage.'Connexion.php';



}else if(!empty($_SESSION["sEstConnexion"]) && ($_SESSION["sEstConnexion"] == 1)){
    if($_SERVER['REQUEST_URI'] == '/'){
        $Page = $PathPage.'Accueil.php';
        $JavaScriptPageTage = 'Accueil.php';
    }else{

        $Page = $PathPage.$PageOnglet;
    
    }

}else if((!empty($_POST['User'])) && (!empty($_POST['password']))){
    $vUser = f_input($_POST['User']);
    $vmdb = f_input($_POST['password']);
    
    if((sha1($vUser) == $vUserV)){
        $vUserIf = 1;
    }else{
        $vUserIf = 0;
    }
    if(sha1($vmdb) == $vmdbV){
        $vmdbIf = 1; 
    }else{
        $vmdbIf = 0;
    }

    if(($vUserIf == 1) && ($vmdbIf == 1)){
        $_SESSION["sEstConnexion"] =1;
        if($_SERVER['REQUEST_URI'] == '/'){
            $Page = $PathPage.'Accueil.php';
        }else{
            $Page = $PathPage.$PageOnglet;
        }
    }else{
        $_SESSION["sEstConnexion"] = 0;
        $Page = $PathPage.'Connexion.php';
    }
}else{
    $Page = $PathPage.'Connexion.php';
}

//include $vMarge.'./info.php';



?>