<?php	

    if(!isset($_SESSION)){session_start();}
    
	if(($_SERVER['REQUEST_URI']=='/')){ $GLOBALS['vMarge'] = ''; $PageOnglet = 'Accueil.php';}
	if(($_SERVER['REQUEST_URI']=='/Accueil/')){$GLOBALS['vMarge'] = './.';$PageOnglet = 'Accueil.php';}
	if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Accueil/Matche/')){$GLOBALS['vMarge'] = './../.';$PageOnglet = 'AfficherResultat.php';}
	if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Accueil/Joueur/')){$GLOBALS['vMarge'] = './../.';$PageOnglet = 'AfficherJoueur.php';}


	if(($_SERVER['REQUEST_URI']=='/Notre_equipe/')){$GLOBALS['vMarge'] = './.';$PageOnglet = 'NotreEquipe.php';}
	if(($_SERVER['REQUEST_URI']=='/Notre_equipe/Nouveau_Joueur/')){$GLOBALS['vMarge'] = './../.';$PageOnglet = 'JoueurNM.php';}
	if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Notre_equipe/')){$GLOBALS['vMarge'] = './.';$PageOnglet = 'NotreEquipe.php';}
	if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Notre_equipe/Modifier/')){$GLOBALS['vMarge'] = './../.';$PageOnglet = 'JoueurNM.php';}
	if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Notre_equipe/Joueur/')){$GLOBALS['vMarge'] = './../.';$PageOnglet = 'AfficherJoueur.php';}


	if(($_SERVER['REQUEST_URI']=='/Matchs/')){$GLOBALS['vMarge'] = './.';$PageOnglet = 'Matchs.php';}
	if(($_SERVER['REQUEST_URI']=='/Matchs/Nouveau_Matche/')){$GLOBALS['vMarge'] = './../.';$PageOnglet = 'NouveauMatch.php';}
	if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Matchs/Modifier/')){$GLOBALS['vMarge'] = './../.';$PageOnglet = '.php';}
	if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Matchs/Saisire_Resultat_Matche/')){$GLOBALS['vMarge'] = './../.';$PageOnglet = 'MettezResultat.php';}
	if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Matchs/Matche/')){$GLOBALS['vMarge'] = './../.';$PageOnglet = 'AfficherResultat.php';}
	if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Matchs/Modifier/')){$GLOBALS['vMarge'] = './../.';$PageOnglet = 'ModifierMatch.php';}


	if(($_SERVER['REQUEST_URI']=='/Statistiques/')|| (substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Statistiques/')){$GLOBALS['vMarge'] = './.';$PageOnglet = 'Statistiques.php';}
	
	if(empty($PageOnglet)){$PageOnglet='';} 

?>