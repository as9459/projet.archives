<?php

function f_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function connexion() {
    $server = 'localhost';
   $db = 'id19887702_equipesport';
   $login = 'id19887702_ayoub';
   $mdp = 'j0q[ZO2s@Zxx3KXl'; 
   //$login = 'root';
   //$mdp = ''; 
   
   try {
       return new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
       }
       catch (Exception $e) {
       die('Erreur : ' . $e->getMessage());
   }
}


function idtonb() {
    $i=2;
    $nbId = "".(intval(substr($_SERVER['REMOTE_ADDR'],0,stripos($_SERVER['REMOTE_ADDR'],".")))*$i); $i++;
    $rstId = substr($_SERVER['REMOTE_ADDR'],stripos($_SERVER['REMOTE_ADDR'],".")+1,strlen($_SERVER['REMOTE_ADDR']));
    while(strlen($rstId)>3){
        $nbId = $nbId.(intval(substr($rstId,0,stripos($rstId,".")))*$i); $i++;
        $rstId = substr($rstId,stripos($rstId,".")+1,strlen($rstId));
    }
    
    return $nbId.(intval($rstId)*$i);
}

function urltostring() {
    $valUrl = substr($_SERVER['REQUEST_URI'],1,strripos($_SERVER['REQUEST_URI'],"?"));
    if(empty($valUrl)){
        $valUrl = substr($_SERVER['REQUEST_URI'],1,strripos($_SERVER['REQUEST_URI'],"/"));
    }
    $StrUrl = substr($valUrl,0,stripos($valUrl,"/"));
    $rstUrl = substr($valUrl,stripos($valUrl,"/")+1,strlen($valUrl));
    while($rstUrl != ''){
        $StrUrl = $StrUrl.substr($rstUrl,0,stripos($rstUrl,"/"));
        $rstUrl = substr($rstUrl,stripos($rstUrl,"/")+1,strlen($rstUrl));
    }
    
    return $StrUrl;
}

function cocherPostes($idj,$idp) {
    $linkpdo = connexion();
    $req = 'SELECT count(*) FROM role WHERE iD_joueurs = '.$idj.' AND iD_poste = "'.$idp.'"';
    $res = $linkpdo->query($req);
    if(!empty($res)){
        $nbCount = $res->fetch();
        if ($nbCount[0] > 0){
            echo 'checked';
        }
    }
    $res =null;
    $linkpdo = null;
}


function selecteStatut($idj,$ids) {
    $linkpdo = connexion();
    $req = 'SELECT iD_statut FROM joueurs WHERE iD_joueurs = '.$idj;
    $res = $linkpdo->query($req);
    if(!empty($res)){
        $nbCount = $res->fetch();
        if ($nbCount[0] == $ids){
            echo 'selected';
        }
    }
    $res =null;
    $linkpdo = null;
}


function urlRetourne($op) {
    
    if($op == '1'){
        $StrUrl = substr($_SERVER['HTTP_REFERER'],0,strripos($_SERVER['HTTP_REFERER'],"?"));
        $rstUrl = substr($StrUrl,stripos($StrUrl,".tk")+3,strlen($StrUrl));
    }else{
        $rstUrl = 'non';
    }
    
	if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Notre_equipe/Joueur/') && ($op == '0')){
	    echo '/Notre_equipe/';
	    
	}else if(($rstUrl=='/Notre_equipe/Modifier/') && ($op == '1')){
	    return '/Notre_equipe/Joueur/';
	    
	}else{
	    echo $_SERVER['HTTP_REFERER'];
	}
    
}


function AfficherButtonModifierProfil() {
    
    $StrUrl = substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"));
    if ( ($StrUrl !='/Accueil/Joueur/')){
        echo '
                    <button formmethod="GET" type="submit" name="Joueur" value="'.$_GET["Afficher"].'"  form="from-joueurSection" formaction="/Notre_equipe/Modifier/">
                        Modifier profil
                    </button>';
    }
}


?>