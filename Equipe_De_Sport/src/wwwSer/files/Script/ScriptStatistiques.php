<?php
if(($_SERVER['REQUEST_URI']=='/Statistiques/') || (substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Statistiques/') && !empty($_GET['filter_membres_equipe'])){
    
    $linkpdo = connexion();
    $req = "SELECT sum(nbTirsCadres) FROM `participer` ";
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
    
    $req = "SELECT sum(nbCarteJaune) FROM `participer` ";
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
    
    $req = "SELECT sum(nbCarteRouge) FROM `participer` " ;
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
     
     
    $req = 'SELECT count(*) FROM `matchs`  WHERE matchs.score <> "N - N" ';
    $resMatchTotal = $linkpdo->query($req);
    if(!empty($resMatchTotal)) {
        $vNbMatchTotal = $resMatchTotal->fetch();
        $vNbMatchTotal = $vNbMatchTotal[0];
    }else{
        $vNbMatchTotal = '0';
    }
    
    $req = 'SELECT count(*) FROM `matchs`  WHERE  matchs.score <> "N - N" AND trim(substr(matchs.score,1,instr(matchs.score, " - ")-1)) > trim(substr(matchs.score,instr(matchs.score, " - ")+2)) ';
    $resMatchVictoire = $linkpdo->query($req);
    if(!empty($resMatchVictoire)) {
        $vNbMatchVictoire = $resMatchVictoire->fetch();
        $vNbMatchVictoire = $vNbMatchVictoire[0];
        $vNbMatchVictoire100 = (intval($vNbMatchVictoire)/intval($vNbMatchTotal))*100;;
    }else{
        $vNbMatchVictoire = '0';
        $vNbMatchVictoire100 = 0;
    }
    
    $req = 'SELECT count(*) FROM `matchs` WHERE matchs.score <> "N - N" AND trim(substr(matchs.score,1,instr(matchs.score, " - ")-1)) = trim(substr(matchs.score,instr(matchs.score, " - ")+2)) ';
    $resMatchEgalite = $linkpdo->query($req);
    if(!empty($resMatchEgalite)) {
        $vNbMatchEgalite = $resMatchEgalite->fetch();
        $vNbMatchEgalite = $vNbMatchEgalite[0];
        $vNbMatchEgalite100 = (intval($vNbMatchEgalite)/intval($vNbMatchTotal))*100;
    }else{
        $vNbMatchEgalite = '0';
        $vNbMatchEgalite100 = 0;
    }
    
    $req = 'SELECT count(*) FROM `matchs`  WHERE  matchs.score <> "N - N" AND trim(substr(matchs.score,1,instr(matchs.score, " - ")-1)) < trim(substr(matchs.score,instr(matchs.score, " - ")+2)) ';
    $resMatchPerte = $linkpdo->query($req);
    if(!empty($resMatchPerte)) {
        $vNbMatchPerte = $resMatchPerte->fetch();
        $vNbMatchPerte = $vNbMatchPerte[0];
        $vNbMatchPerte100 = (intval($vNbMatchPerte)/intval($vNbMatchTotal))*100;
    }else{
        $vNbMatchPerte = '0';
        $vNbMatchPerte100 = 0;
    }
    
    
    $req = "SELECT count(*) FROM `joueurs`";
    $res = $linkpdo->query($req);
    $nbMembres = $res->fetch();

    $req = "SELECT count(*) FROM `joueurs` WHERE iD_statut = \"ACT\"";
    $res = $linkpdo->query($req);
    $nbActif = $res->fetch();

    $req = "SELECT count(*) FROM `joueurs` WHERE iD_statut = \"BLS\"";
    $res = $linkpdo->query($req);
    $nbBlesse = $res->fetch();

    $req = "SELECT count(*) FROM `joueurs` WHERE iD_statut = \"ABS\"";
    $res = $linkpdo->query($req);
    $nbAbsent = $res->fetch();

    $req = "SELECT count(*) FROM `joueurs` WHERE iD_statut = \"SPN\"";
    $res = $linkpdo->query($req);
    $nbSuspendu = $res->fetch();

    $vfilter = '';
    if(!empty($_GET['filter_membres_equipe'])){$vfilter = f_input($_GET['filter_membres_equipe']);}

    if((empty($vfilter)) || ($vfilter == 'Tout')){
        $req = "SELECT * FROM `joueurs`";
        $res = $linkpdo->query($req);
    }

    if((!empty($vfilter)) && ($vfilter == 'Actif')){
        $req = "SELECT * FROM `joueurs` WHERE iD_statut = \"ACT\"";
        $res = $linkpdo->query($req);
    }

    if((!empty($vfilter)) && ($vfilter == 'Blesse')){
        $req = "SELECT * FROM `joueurs` WHERE iD_statut = \"BLS\"";
        $res = $linkpdo->query($req);
    }

    if((!empty($vfilter)) && ($vfilter == 'Absent')){
        $req = "SELECT * FROM `joueurs` WHERE iD_statut = \"ABS\"";
        $res = $linkpdo->query($req);
    }

    if((!empty($vfilter)) && ($vfilter == 'Suspendu')){
        $req = "SELECT * FROM `joueurs` WHERE iD_statut = \"SPN\"";
        $res = $linkpdo->query($req);
    }
    
    
    function creeligneTableau_de_main_Statistiques($resltat){
        $linkpdo = connexion();
        $nbId = idtonb();
        $strurl = urltostring();
        
        $myfile = fopen($GLOBALS['vMarge'].'./../wwwSer/temp/filearrayDataImg'.$strurl.$nbId.'.php', "w") or die("Unable to open file!");
        $txt = '<?php
    $arrayDataImg = array(
            0 => "./wwwSerImg/"';
        fwrite($myfile, $txt);
        while ($data = $resltat->fetch()) {
            
            $req = "SELECT commentaires FROM `joueurs_statut` WHERE lower(iD_statut) = lower(\"".$data['iD_statut']."\") ";
            $resJoueurStatut = $linkpdo->query($req);
            $vJoueurStatut = $resJoueurStatut->fetch();
            $vJoueurStatut = $vJoueurStatut[0];
            
            $req = "SELECT sum(nbCarteJaune) FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs  AND participer.iD_joueurs = ".$data['iD_joueurs'].' AND matchs.score <> "N - N" ';
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
            
            $req = "SELECT sum(nbCarteRouge) FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs  AND participer.iD_joueurs = ".$data['iD_joueurs'].' AND matchs.score <> "N - N" ' ;
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
            
            $req = "SELECT count(id_etat) FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs  AND participer.iD_joueurs = ".$data['iD_joueurs']." AND id_etat in( \"RAE\", \"RTM\") AND matchs.score <> \"N - N\"";
            $resEntre = $linkpdo->query($req);
            if(!empty($resEntre)) {
                $vNbEntre = $resEntre->fetch();
                $vNbEntre = $vNbEntre[0];
            }else{
                $vNbEntre = '0';
            }
             
            $req = "SELECT count(id_etat) FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs  AND participer.iD_joueurs = ".$data['iD_joueurs']." AND id_etat in(\"TAS\",\"TTM\") AND matchs.score <> \"N - N\"";
            $resSorti = $linkpdo->query($req);
            if(!empty($resSorti)) {
                $vNbSorti = $resSorti->fetch();
                $vNbSorti = $vNbSorti[0];
            }else{
                $vNbSorti = '0';
            }
            
            $req = 'SELECT count(*) FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs  AND participer.iD_joueurs = '.$data['iD_joueurs'].' AND matchs.score <> "N - N" AND trim(substr(matchs.score,1,instr(matchs.score, " - ")-1)) > trim(substr(matchs.score,instr(matchs.score, " - ")+2)) ';
            $resVictoire = $linkpdo->query($req);
            if(!empty($resVictoire)) {
                $vNbVictoire = $resVictoire->fetch();
                $vNbVictoire = $vNbVictoire[0];
            }else{
                $vNbVictoire = '0';
            }
            
            $req = "SELECT avg(evaluer) FROM `participer`,`matchs`  WHERE participer.iD_matchs = matchs.iD_matchs  AND participer.iD_joueurs = ".$data['iD_joueurs'].' AND matchs.score <> "N - N" ';
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
            
            $req = 'SELECT iD_joueurs, joueurs_poste.poste_description, count(participer.joueur_position) nb FROM `participer`,`matchs`, joueurs_poste WHERE participer.iD_matchs = matchs.iD_matchs AND joueurs_poste.iD_poste = participer.joueur_position AND iD_joueurs = '.$data['iD_joueurs'].' GROUP by participer.joueur_position ORDER BY 3 DESC ';
            $resPoste = $linkpdo->query($req);
            if(!empty($resPoste)) {
                $vPoste = $resPoste->fetch();
            }else{
                $vPoste = '';
            } if(!empty($vPoste)) {
                $vPoste = $vPoste['poste_description'];
            }else{
                $vPoste = '';
            }
            
            echo '
                    <tr id="tr_N_'.$data['iD_joueurs'].'">
                        <td aria-valuetext="'.$data['iD_joueurs'].'" headers="N_ht">'.$data['iD_joueurs'].'</td>
                        <td aria-valuetext="Photo" headers="Photo_ht">';
                    
                        $target_dir = $GLOBALS['vMarge']."./../wwwSer/ser/joueurs_img/";
                        $file_new_name = sha1($data['nom'].$data['prenom'].$data['numeroLicence']);
                        $target_file = $target_dir.$file_new_name.'.png';
                        
                        
                        $dataImg = $data['iD_joueurs'].'_'.(rand()%9999).'_'.(rand()%9999).'_'.(rand()%9999);
                        
                        fwrite($myfile, ",\n        ".$data['iD_joueurs'].' => "'.$dataImg.'.png"');
                        
                        if(file_exists($target_file)){
                            copy($target_file,'./wwwSerImg/'.$dataImg.'.png');
                        }
                    
                        echo '<img src="./wwwSerImg/'.$dataImg.'.png" alt="">
                        </td>
                        <td aria-valuetext="'.$data['nom'].' '.$data['prenom'].'" headers="Nom_ht">'.$data['nom'].' '.$data['prenom'].'</td>
                        <td aria-valuetext="'.$vJoueurStatut.'" headers="Etat_ht">'.$vJoueurStatut.'</td>
                        <td aria-valuetext="'.$vPoste.'" headers="Poste_prefere_ht">'.$vPoste.'</td>
                        <td aria-valuetext="'.$vNbSorti.'" headers="Titulaire_ht">'.$vNbSorti.'</td>
                        <td aria-valuetext="'.$vNbEntre.'" headers="Remplacer_ht">'.$vNbEntre.'</td>
                        <td aria-valuetext="'.$vCRouge.'" headers="Carte_Rouge_ht">'.$vCRouge.'</td>
                        <td aria-valuetext="'.$vCJaune.'" headers="Carte_Joune_ht">'.$vCJaune.'</td>
                        <td aria-valuetext="'.$vNbVictoire.'" headers="Matchs_gagnes_ht">'.$vNbVictoire.'</td>
                        <td aria-valuetext="'.$vMoyen.' / 20" headers="Evaluations_ht">'.$vMoyen.' / 20</td>
                    </tr>';
                    
        }
        
        fwrite($myfile, '
        );
    ?>');
    
        fclose($myfile);
        $resltat->closeCursor();
        $resltat=null;
        $linkpdo=null;
    }
    
    
    $linkpdo = null;
}
?>