<?php
if(((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Accueil/Joueur/') || 
    (substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Notre_equipe/Joueur/'))
        && !empty($_GET['Afficher'])){
         $nbId = idtonb();
    $strurl = urltostring();
    
    if (file_exists($GLOBALS['vMarge'].'./../wwwSer/temp/filearrayDataImg'.$strurl.$nbId.'.php')){
      include $GLOBALS['vMarge'].'./../wwwSer/temp/filearrayDataImg'.$strurl.$nbId.'.php';
    }
    
    if(isset($arrayDataImg)){
        while(1 < count($arrayDataImg)){
            if(file_exists ($arrayDataImg[0].end($arrayDataImg))){
                unlink($arrayDataImg[0].end($arrayDataImg));
            }
            array_pop($arrayDataImg);
        }
    }
    $vNomJ =  f_input(substr($_GET['Afficher'],0,strripos($_GET['Afficher'],"-")));
    $vPrenomJ = f_input(substr($_GET['Afficher'],strripos($_GET['Afficher'],"-")+1,strlen($_GET['Afficher'])));
    
    $linkpdo = connexion();
    $req = "SELECT * FROM `joueurs` WHERE lower(nom) = lower(\"".$vNomJ."\") AND lower(Prenom) = lower(\"".$vPrenomJ."\")";
    $res = $linkpdo->query($req);
    if(!empty($res)){
        $vJoueur = $res->fetch();
    }
    
    
    $myfile = fopen($GLOBALS['vMarge'].'./../wwwSer/temp/filearrayDataImg'.$strurl.$nbId.'.php', "w") or die("Unable to open file!");
    $txt = '<?php
$arrayDataImg = array(
        0 => "./wwwSerImg/"';
    fwrite($myfile, $txt);
    
    
    $target_dir = $GLOBALS['vMarge']."./../wwwSer/ser/joueurs_img/";
    $file_new_name = sha1($vJoueur['nom'].$vJoueur['prenom'].$vJoueur['numeroLicence']);
    $target_file = $target_dir.$file_new_name.'.png';
    
    $vJoueurImg = (rand()%9999).'_'.(rand()%9999).'_'.(rand()%9999);
    
    $txt = ',
        1 => "'.$vJoueurImg.'.png"
    );
?>';
    fwrite($myfile, $txt);
    fclose($myfile);
    if(file_exists($target_file)){
        copy($target_file,'./wwwSerImg/'.$vJoueurImg.'.png');
    }
    
    
    $req = "SELECT commentaires FROM `joueurs_statut` WHERE lower(iD_statut) = lower(\"".$vJoueur['iD_statut']."\") ";
    $resJoueurStatut = $linkpdo->query($req);
    $vJoueurStatut = $resJoueurStatut->fetch();
    
    
    $req = "SELECT avg(evaluer) FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs  AND participer.iD_joueurs = ".$vJoueur['iD_joueurs'].' AND matchs.score <> "N - N" ';
    $resMoyen = $linkpdo->query($req);
    if(!empty($resMoyen)) {
        $vMoyen = $resMoyen->fetch();
        if(!empty($vMoyen[0])) {
            $vMoyen = substr($vMoyen[0],0,stripos($vMoyen[0],".")+2);
            if(empty($vMoyen)){ $vMoyen = $nbEvaluations[0];}
        }else{
            $vMoyen = '0';
        }
    }else{
        $vMoyen = '0';
    }
    
    
    $req = "SELECT sum(nbTirsCadres) FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs  AND participer.iD_joueurs = ".$vJoueur['iD_joueurs'].' AND matchs.score <> "N - N" ';
    $resTirs = $linkpdo->query($req);
    if(!empty($resTirs)) {
        $vTirs = $resTirs->fetch();
        if(!empty($vTirs[0])) {
            $vTirs = $vTirs[0];
        }else{
            $vTirs = '0';
        }
    }else{
        $vTirs = '0';
    }
    
    $req = "SELECT sum(nbCarteJaune) FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs  AND participer.iD_joueurs = ".$vJoueur['iD_joueurs'].' AND matchs.score <> "N - N" ';
    $resCJaune = $linkpdo->query($req);
    if(!empty($resCJaune)) {
        $vCJaune = $resCJaune->fetch();
        if(!empty($vCJaune[0])) {
            $vCJaune = $vCJaune[0];
        }else{
            $vCJaune = '0';
        }
    }else{
        $vCJaune = '0';
    }
    
    $req = "SELECT sum(nbCarteRouge) FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs  AND participer.iD_joueurs = ".$vJoueur['iD_joueurs'].' AND matchs.score <> "N - N" ' ;
    $resCRouge = $linkpdo->query($req);
    if(!empty($resCRouge)) {
        $vCRouge = $resCRouge->fetch();
        if(!empty($vCRouge[0])) {
            $vCRouge = $vCRouge[0];
        }else{
            $vCRouge = '0';
        }
    }else{
        $vCRouge = '0';
    }
    
    $req = "SELECT count(id_etat) FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs  AND participer.iD_joueurs = ".$vJoueur['iD_joueurs']." AND id_etat in( \"RAE\") AND matchs.score <> \"N - N\"";
    $resEntre = $linkpdo->query($req);
    if(!empty($resEntre)) {
        $vNbEntre = $resEntre->fetch();
        $vNbEntre = $vNbEntre[0];
    }else{
        $vNbEntre = '0';
    }
     
    $req = "SELECT count(id_etat) FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs  AND participer.iD_joueurs = ".$vJoueur['iD_joueurs']." AND id_etat in(\"TAS\") AND matchs.score <> \"N - N\"";
    $resSorti = $linkpdo->query($req);
    if(!empty($resSorti)) {
        $vNbSorti = $resSorti->fetch();
        $vNbSorti = $vNbSorti[0];
    }else{
        $vNbSorti = '0';
    }
    
    $req = 'SELECT count(*) FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs  AND participer.iD_joueurs = '.$vJoueur['iD_joueurs'].' AND matchs.score <> "N - N" AND trim(substr(matchs.score,1,instr(matchs.score, " - ")-1)) > trim(substr(matchs.score,instr(matchs.score, " - ")+2)) ';
    $resVictoire = $linkpdo->query($req);
    if(!empty($resVictoire)) {
        $vNbVictoire = $resVictoire->fetch();
        $vNbVictoire = $vNbVictoire[0];
    }else{
        $vNbVictoire = '0';
    }
    
    $req = 'SELECT count(*) FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs  AND participer.iD_joueurs = '.$vJoueur['iD_joueurs'].' AND matchs.score <> "N - N" AND trim(substr(matchs.score,1,instr(matchs.score, " - ")-1)) = trim(substr(matchs.score,instr(matchs.score, " - ")+2)) ';
    $resEgalite = $linkpdo->query($req);
    if(!empty($resEgalite)) {
        $vNbEgalite = $resEgalite->fetch();
        $vNbEgalite = $vNbEgalite[0];
    }else{
        $vNbEgalite = '0';
    }
    
    $req = 'SELECT count(*) FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs  AND participer.iD_joueurs = '.$vJoueur['iD_joueurs'].' AND matchs.score <> "N - N" AND trim(substr(matchs.score,1,instr(matchs.score, " - ")-1)) < trim(substr(matchs.score,instr(matchs.score, " - ")+2)) ';
    $resPerte = $linkpdo->query($req);
    if(!empty($resPerte)) {
        $vNbPerte = $resPerte->fetch();
        $vNbPerte = $vNbPerte[0];
    }else{
        $vNbPerte = '0';
    }
    
    
    function creeligneButtonSection_de_main_joueurSection($id,$linkpdo){
    
        $req = "SELECT count(*)  FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs AND participer.iD_joueurs = ".$id.' AND score <> "N - N"';
        $resMatchs = $linkpdo->query($req);
        if(!empty($resMatchs)) {
            $vNbMatchs = $resMatchs->fetch();
            $vNbMatchs = $vNbMatchs[0];
        }else{
            $vNbMatchs = 0;
        }
        
        if ($vNbMatchs > 0){
            $req = "SELECT matchs.equipeAdverse, matchs.score, matchs.dateMatch , participer.evaluer, participer.nbTirsCadres, participer.nbCarteJaune, participer.nbCarteRouge, participer.id_etat FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs AND participer.iD_joueurs = ".$id.' AND score <> "N - N"';
            $resMatchsData = $linkpdo->query($req);
            if(!empty($resMatchsData)) {
                while ($MatchsData = $resMatchsData->fetch()) {
                echo '
                    <button class="S-main-from-joueurSection-BtnMatch" name="Affiche" value="'.$MatchsData['equipeAdverse'].'-'.$MatchsData['dateMatch'].'" type="submit" form="from-joueurSection" formaction="/Accueil/Matche/" formmethod="GET">
                        <div class="S-main-joueurSection-match">
                            <div class="S-main-joueurSection-match-img">';
                            
                                $vNoterScore =  f_input(substr($MatchsData['score'],0,stripos($MatchsData['score'],"-")-1));
                                $vAdverseScore = f_input(substr($MatchsData['score'],stripos($MatchsData['score'],"-")+2,strlen($MatchsData['score'])));
                                if(intval($vNoterScore) > intval($vAdverseScore)){
                                    echo '
                                        <img src="'.$GLOBALS['linkeImgWeb']['victoire'].'" alt="victoire"> ';
                                }else if(intval($vNoterScore) == intval($vAdverseScore)){
                                    echo '
                                        <img src="'.$GLOBALS['linkeImgWeb']['egalite'].'" alt="victoire"> ';
                                }else if(intval($vNoterScore) < intval($vAdverseScore)){
                                    echo '
                                        <img src="'.$GLOBALS['linkeImgWeb']['perte'].'" alt="victoire"> ';
                                }
                            
                                echo '
                            </div>
                            <div class="S-main-joueurSection-match-info">
                                <div class="S-m-jSect-match-info-nomScore">
                                    <p>'.$MatchsData['equipeAdverse'].'</p>
                                    <p>'.$MatchsData['score'].'</p>
                                </div>
                                <div class="S-m-jSect-match-info-Moyen">
                                    <div class="S-m-jSect-match-info-Moyen-Blocimg">
                                        <div class="S-m-jSect-match-info-Moyen-img1"></div>
                                        <div class="S-m-jSect-match-info-Moyen-img2"></div>
                                    </div>
                                    <div class="S-m-jSect-match-info-Moyen-nb">
                                        <p>'.$MatchsData['evaluer'].'</p>
                                    </div>
                                </div>
                            </div>
                            <div class="S-main-joueurSection-match-Stat">';
                            if(!empty($MatchsData['nbTirsCadres']) && $MatchsData['nbTirsCadres'] > 0){
                            echo'
                                <div class="S-m-jSect-match-Stat-goals">
                                    <div class="S-m-jSect-match-Stat-goals-img">
                                        <img src="'.$GLOBALS['linkeImgWeb']["goals"].'" alt="goals">
                                    </div>
                                    <div class="S-m-jSect-match-Stat-goals-nb">
                                        <p>'.$MatchsData['nbTirsCadres'].'</p>
                                    </div>
                                </div>';}
                            if(!empty($MatchsData['nbCarteRouge']) && $MatchsData['nbCarteRouge'] > 0){
                            echo '
                                <div class="S-m-jSect-match-Stat-CarteRouge">
                                    <div class="S-m-jSect-match-Stat-CarteRouge-img"></div>
                                    <div class="S-m-jSect-match-Stat-CarteRouge-nb">
                                        <p>'.$MatchsData['nbCarteRouge'].'</p>
                                    </div>
                                </div>';}
                            if(!empty($MatchsData['nbCarteJaune']) && $MatchsData['nbCarteJaune'] > 0){
                            echo '
                                <div class="S-m-jSect-match-Stat-Cartejoune">
                                    <div class="S-m-jSect-match-Stat-Cartejoune-img"></div>
                                    <div class="S-m-jSect-match-Stat-Cartejoune-nb">
                                        <p>'.$MatchsData['nbCarteJaune'].'</p>
                                    </div>
                                </div>';}
                            if(!empty($MatchsData['id_etat']) && $MatchsData['id_etat'] =='RAE'){
                            echo '
                                <div class="S-m-jSect-match-Stat-Entre-Blocimg">
                                    <div class="S-m-jSect-match-Stat-Entre-ArrowR">
                                        <div class="S-m-jSect-match-Stat-Entre-ARimg1"></div>
                                        <div class="S-m-jSect-match-Stat-Entre-ARimg2"></div>
                                    </div>
                                    <div class="S-m-jSect-match-Stat-Entre-ArrowL">
                                        <div class="S-m-jSect-match-Stat-Entre-ALimg1"></div>
                                        <div class="S-m-jSect-match-Stat-Entre-ALimg2"></div>
                                    </div>
                                </div>';}
                            if(!empty($MatchsData['id_etat']) && $MatchsData['id_etat'] =='TAS'){
                            echo '
                                <div class="S-m-jSect-match-Stat-Sorte-Blocimg">
                                    <div class="S-m-jSect-match-Stat-Sorte-ArrowR">
                                        <div class="S-m-jSect-match-Stat-Sorte-ARimg1"></div>
                                        <div class="S-m-jSect-match-Stat-Sorte-ARimg2"></div>
                                    </div>
                                    <div class="S-m-jSect-match-Stat-Sorte-ArrowL">
                                        <div class="S-m-jSect-match-Stat-Sorte-ALimg1"></div>
                                        <div class="S-m-jSect-match-Stat-Sorte-ALimg2"></div>
                                    </div>
                                </div>';}
                            echo '    
                            </div>
                        </div>
                    </button>';
                }
            }
        }
    }
            
}else if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Accueil/Joueur/')){
            header("Location: /Accueil/");
        
}else if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Notre_equipe/Joueur/')){
            header("Location: /Notre_equipe/");
        
}
    
?>