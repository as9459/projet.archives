<?php

if((!empty($_POST['BtnValiderJoueurInfoNM']) && ($_POST['BtnValiderJoueurInfoNM']!='ClickBtnValiderJoueurInfoNM')) || empty($_POST['BtnValiderJoueurInfoNM'])){ 
    
    $nbId = idtonb();
    $strurl = urltostring();
    
    $filearrayDataImg = array(
        0 => $GLOBALS['vMarge'].'./../wwwSer/temp/filearrayDataImg',
        1 => 'Accueil'.$nbId.'.php',
        2 => 'AccueilJoueur'.$nbId.'.php',
        3 => 'AccueilMatche'.$nbId.'.php',
        4 => 'Notre_equipe'.$nbId.'.php',
        5 => 'Notre_equipeJoueur'.$nbId.'.php',
        6 => 'Notre_equipeModifier'.$nbId.'.php',
        7 => 'MatchsNouveau_Matche'.$nbId.'.php',
        8 => 'MatchsSaisire_Resultat_Matche'.$nbId.'.php',
        9 => 'MatchsMatche'.$nbId.'.php',
        10 => 'MatchsModifier'.$nbId.'.php',
        11 => 'Statistiques'.$nbId.'.php',
        12 => 'Notre_equipeNouveau_Joueur'.$nbId.'.php',
        13 => ''.$nbId.'.php'
    );
    
    $urlwwwSerImg = array(
        0 => 'wwwSerImg/',
        1 => $GLOBALS['vMarge'].'./Accueil/',
        2 => $GLOBALS['vMarge'].'./Accueil/Joueur/',
        3 => $GLOBALS['vMarge'].'./Accueil/Matche/',
        4 => $GLOBALS['vMarge'].'./Notre_equipe/',
        5 => $GLOBALS['vMarge'].'./Notre_equipe/Joueur/',
        6 => $GLOBALS['vMarge'].'./Notre_equipe/Modifier/',
        7 => $GLOBALS['vMarge'].'./Matchs/Nouveau_Matche/',
        8 => $GLOBALS['vMarge'].'./Matchs/Saisire_Resultat_Matche/',
        9 => $GLOBALS['vMarge'].'./Matchs/Matche/',
        10 => $GLOBALS['vMarge'].'./Matchs/Modifier/',
        11 => $GLOBALS['vMarge'].'./Statistiques/',
        12 => $GLOBALS['vMarge'].'./Notre_equipe/Nouveau_Joueur/',
        13 => $GLOBALS['vMarge'].'./Accueil/'
    ); 
    
    while(1 < count($filearrayDataImg)){
        if (file_exists($filearrayDataImg[0].end($filearrayDataImg))){
            include $filearrayDataImg[0].end($filearrayDataImg);
            
            if(isset($arrayDataImg)){
                while(1 < count($arrayDataImg)){
                    if(file_exists (end($urlwwwSerImg).$urlwwwSerImg[0].end($arrayDataImg))){
                        unlink(end($urlwwwSerImg ).$urlwwwSerImg[0].end($arrayDataImg));
                    }
                    array_pop($arrayDataImg);
                }
            }
            
            unlink($filearrayDataImg[0].end($filearrayDataImg));
        }
        array_pop($filearrayDataImg);
        array_pop($urlwwwSerImg);
    }
}
?>