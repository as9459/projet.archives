<?php

if(($_SERVER['REQUEST_URI']=='/')||
($_SERVER['REQUEST_URI']=='/Accueil/')||
($_SERVER['REQUEST_URI']=='/Accueil/Matche/')||
($_SERVER['REQUEST_URI']=='/Accueil/Joueur/')||
(substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Accueil/Matche/')||
(substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Accueil/Joueur/')||
(isset($_POST['BtnOngletAccueil']) && $_POST['BtnOngletAccueil']=='ClickBtnOngletAccueil')||
(isset($_POST['BtnOngletIcon']) && $_POST['BtnOngletIcon']=='ClickBtnOngletIcon')){
    $vOngletA = 'S-header-bar-nav-ongletChoisi';
}

if(($_SERVER['REQUEST_URI']=='/Notre_equipe/')||
($_SERVER['REQUEST_URI']=='/Notre_equipe/Nouveau_Joueur/')||
($_SERVER['REQUEST_URI']=='/Notre_equipe/Modifier/')||
($_SERVER['REQUEST_URI']=='/Notre_equipe/Joueur/')||
(substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Notre_equipe/')||
(substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Notre_equipe/Modifier/')||
(substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Notre_equipe/Joueur/')||
(isset($_POST['BtnOngletNoterEquipe']) && $_POST['BtnOngletNoterEquipe']=='ClickBtnOngletNoterEquipe')){
    $vOngletN = 'S-header-bar-nav-ongletChoisi';
}

if(($_SERVER['REQUEST_URI']=='/Matchs/')||
($_SERVER['REQUEST_URI']=='/Matchs/Nouveau_Matche/')||
(substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Matchs/Modifier/')||
(substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Matchs/Saisire_Resultat_Matche/')||
(substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Matchs/Matche/')||
(isset($_POST['BtnOngletMatchs']) && $_POST['BtnOngletMatchs']=='ClickBtnOngletMatchs')){
    $vOngletL = 'S-header-bar-nav-ongletChoisi';
}

if(($_SERVER['REQUEST_URI']=='/Statistiques/')||
(substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Statistiques/')||
(isset($_POST['BtnOngletStatistiques']) && $_POST['BtnOngletStatistiques']=='ClickBtnOngletStatistiques')){
    $vOngletS = 'S-header-bar-nav-ongletChoisi';
}


?>