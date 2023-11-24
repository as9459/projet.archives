<?php
if(((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Accueil/Matche/') || 
    (substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Matchs/Matche/'))
        && !empty($_GET['Affiche'])){
            
    $vMatchP =  f_input(substr($_GET['Affiche'],0,stripos($_GET['Affiche'],"-")));
    $vDateP = f_input(substr($_GET['Affiche'],stripos($_GET['Affiche'],"-")+1,strlen($_GET['Affiche'])));
    
    $linkpdo = connexion();
    $req = "SELECT * FROM `matchs` WHERE lower(equipeAdverse) = lower(\"".$vMatchP."\") AND dateMatch = \"".$vDateP."\" ";
    $res = $linkpdo->query($req);
    if(!empty($res)){
        $vMatch = $res->fetch();
        $vNoterScore =  f_input(substr($vMatch['score'],0,stripos($vMatch['score'],"-")-1));
        $vAdverseScore = f_input(substr($vMatch['score'],stripos($vMatch['score'],"-")+2,strlen($vMatch['score'])));
        if(intval($vNoterScore) > intval($vAdverseScore)){
            $vImg = $GLOBALS['linkeImgWeb']['victoire'];
        }else if(intval($vNoterScore) == intval($vAdverseScore)){
            $vImg = $GLOBALS['linkeImgWeb']['egalite'];
        }else if(intval($vNoterScore) < intval($vAdverseScore)){
            $vImg = $GLOBALS['linkeImgWeb']['perte'];
        }
        
    }
    
    
    $reqStatMatch = "SELECT sum(nbCarteRouge) as nbCarteR, 	sum(nbCarteJaune) as nbCarteJ, 	sum(nbTirsCadres) as nbTirsC FROM `participer` WHERE iD_matchs = \"".$vMatch['iD_matchs']."\" 
                        and id_etat in ('RAE','TAS','TTM') ";
    $resStatMatch = $linkpdo->query($reqStatMatch);
    if(!empty($res)){
        $vStatMatch = $resStatMatch->fetch();
    }
    
    $reqStatMatch2 = "SELECT count(*) FROM `participer` WHERE iD_matchs = \"".$vMatch['iD_matchs']."\"   and  id_etat = 'RAE' ";
    $resStatMatch2 = $linkpdo->query($reqStatMatch2);
    if(!empty($res)){
        $vRemplaçement = $resStatMatch2->fetch();
        $vRemplaçement = $vRemplaçement[0];
    }
    
    $reqPosition = "SELECT joueur_position FROM `participer` WHERE iD_matchs = \"".$vMatch['iD_matchs']."\"   and  id_etat in (\"TTM\",\"TAS\") ";
    $resPosition = $linkpdo->query($reqPosition);
    if(!empty($res)){
        $tPoste=array('AD'=>0, 'BT'=>0, 'AG'=>0 ,
                                'MD'=>0, 'MC'=>0, 'MOC'=>0, 'MG'=>0, 
                                'DD'=>0, 'DC'=>0, 'DG'=>0, 
                                'G'=>0);
        $tPosteS=array('A'=>0, 'M'=>0, 'D'=>0, 'G'=>0);
        
        while ($data = $resPosition->fetch()) {
            $tPoste[$data['joueur_position']]++;
        }
        $tPosteS['A'] = $tPoste['AD']+$tPoste['BT']+$tPoste['AG'];
        $tPosteS['M'] = $tPoste['MD']+$tPoste['MC']+$tPoste['MG']+$tPoste['MOC'];
        $tPosteS['D'] = $tPoste['DD']+$tPoste['DC']+$tPoste['DG'];
        $tPosteA=array();
        $tPosteM=array();
        $tPosteD=array();
        
        $k=1;
        if(($tPosteS['A']%2)==0){$k=2;$tPosteS['A']++;}
        for($i=$k;$i<=$tPosteS['A'];$i++){
            $tPosteA[$i]=' checked ';
        }
        
        $k=1;
        if(($tPosteS['D']%2)==0){$k=2;$tPosteS['D']++;}
        for($i=$k;$i<=$tPosteS['D'];$i++){
            $tPosteD[$i]=' checked ';
        }
        
        $k=1;
        if(($tPosteS['M']%2)==0){$k=2;$tPosteS['M']++;}
        for($i=$k;$i<=$tPosteS['M'];$i++){
            $tPosteM[$i]=' checked ';
        }
    }
    
    
    $linkpdo = null;
    
    
    
    function creeButton_de_main_JoueurMatch($id){
        $linkpdo = connexion();
        $reqParticiper = "SELECT * FROM `participer` WHERE iD_matchs = \"".$id."\" and id_etat <> \"RTM\" ";
        $resltat = $linkpdo->query($reqParticiper);
        
        $nbId = idtonb();
        $strurl = urltostring();
        
        $myfile = fopen($GLOBALS['vMarge'].'./../wwwSer/temp/filearrayDataImg'.$strurl.$nbId.'.php', "w") or die("Unable to open file!");
        $txt = '<?php
    $arrayDataImg = array(
            0 => "./wwwSerImg/"';
        fwrite($myfile, $txt);
        
        while ($data = $resltat->fetch()) {
            $reqJoueur = "SELECT * FROM `joueurs` WHERE  iD_joueurs = ".$data['iD_joueurs'];
            $resJoueur = $linkpdo->query($reqJoueur);
            $vJoueur = $resJoueur->fetch();
            echo '
                <button class="S-main-from-JoueurMatch-BtnJoueurMatch" name="Afficher" value="'.$vJoueur['nom'].'-'.$vJoueur['prenom'].'" type="submit" form="fromJoueurMatch" formaction="/Accueil/Joueur/" formmethod="GET">
                    <div class="S-main-JoueurMatch-Bloc">
                        <div class="S-main-JoueurMatch-Bloc-img">';
                        
                        $target_dir = $GLOBALS['vMarge']."./../wwwSer/ser/joueurs_img/";
                        $file_new_name = sha1($vJoueur['nom'].$vJoueur['prenom'].$vJoueur['numeroLicence']);
                        $target_file = $target_dir.$file_new_name.'.png';
                        
                        
                        $dataImg = $data['iD_joueurs'].'_'.(rand()%9999).'_'.(rand()%9999).'_'.(rand()%9999);
                        
                        fwrite($myfile, ",\n        ".$data['iD_joueurs'].' => "'.$dataImg.'.png"');
                        
                        if(file_exists($target_file)){
                            copy($target_file,'./wwwSerImg/'.$dataImg.'.png');
                        }
                         
                        echo '
                        <img src="./wwwSerImg/'.$dataImg.'.png" alt="">
                        </div>
                        <div class="S-main-JoueurMatch-Bloc-info">
                            <div class="S-m-JoueurMatch-Bloc-info-nomScore">
                                <p>'.$vJoueur['nom'].' '.$vJoueur['prenom'].'</p>
                            </div>
                            <div class="S-m-JoueurMatch-Bloc-info-Moyen">
                                <div class="S-m-JoueurMatch-Bloc-info-Moyen-Blocimg">
                                    <div class="S-m-JoueurMatch-Bloc-info-Moyen-img1"></div>
                                    <div class="S-m-JoueurMatch-Bloc-info-Moyen-img2"></div>
                                </div>
                                <div class="S-m-JoueurMatch-Bloc-info-Moyen-nb">
                                    <p>'.$data['evaluer'].'</p>
                                </div>
                            </div>
                        </div>
                        <div class="S-main-joueurSection-match-Stat">';
                        if(!empty($data['nbTirsCadres']) && $data['nbTirsCadres'] > 0){
                            echo '
                            <div class="S-m-JoueurMatch-Bloc-Stat-goals">
                                <div class="S-m-JoueurMatch-Bloc-Stat-goals-img">
                                    <img src="'.$GLOBALS['linkeImgWeb']['goals'].'" alt="goals">
                                </div>
                                <div class="S-m-JoueurMatch-Bloc-Stat-goals-nb">
                                    <p>'.$data['nbTirsCadres'].'</p>
                                </div>
                            </div> ';}
                        if(!empty($data['nbCarteRouge']) && $data['nbCarteRouge'] > 0){
                            echo '
                            <div class="S-m-JoueurMatch-Bloc-Stat-CarteRouge">
                                <div class="S-m-JoueurMatch-Bloc-Stat-CarteRouge-img"></div>
                                <div class="S-m-JoueurMatch-Bloc-Stat-CarteRouge-nb">
                                    <p>'.$data['nbCarteRouge'].'</p>
                                </div>
                            </div> ';}
                        if(!empty($data['nbCarteJaune']) && $data['nbCarteJaune'] > 0){
                            echo '
                            <div class="S-m-JoueurMatch-Bloc-Stat-Cartejoune">
                                <div class="S-m-JoueurMatch-Bloc-Stat-Cartejoune-img"></div>
                                <div class="S-m-JoueurMatch-Bloc-Stat-Cartejoune-nb">
                                    <p>'.$data['nbCarteJaune'].'</p>
                                </div>
                            </div> ';}
                        if(!empty($data['id_etat']) && $data['id_etat'] == 'RAE'){
                            echo '
                            <div class="S-m-JoueurMatch-Bloc-Stat-Entre-Blocimg">
                                <div class="S-m-JoueurMatch-Bloc-Stat-Entre-ArrowR">
                                    <div class="S-m-JoueurMatch-Bloc-Stat-Entre-ARimg1"></div>
                                    <div class="S-m-JoueurMatch-Bloc-Stat-Entre-ARimg2"></div>
                                </div>
                                <div class="S-m-JoueurMatch-Bloc-Stat-Entre-ArrowL">
                                    <div class="S-m-JoueurMatch-Bloc-Stat-Entre-ALimg1"></div>
                                    <div class="S-m-JoueurMatch-Bloc-Stat-Entre-ALimg2"></div>
                                </div>
                            </div> ';}
                        if(!empty($data['id_etat']) && $data['id_etat'] =='TAS'){
                            echo '
                            <div class="S-m-JoueurMatch-Bloc-Stat-Sorte-Blocimg">
                                <div class="S-m-JoueurMatch-Bloc-Stat-Sorte-ArrowR">
                                    <div class="S-m-JoueurMatch-Bloc-Stat-Sorte-ARimg1"></div>
                                    <div class="S-m-JoueurMatch-Bloc-Stat-Sorte-ARimg2"></div>
                                </div>
                                <div class="S-m-JoueurMatch-Bloc-Stat-Sorte-ArrowL">
                                    <div class="S-m-JoueurMatch-Bloc-Stat-Sorte-ALimg1"></div>
                                    <div class="S-m-JoueurMatch-Bloc-Stat-Sorte-ALimg2"></div>
                                </div>
                            </div> ';}
                        echo '
                        </div>
                    </div>
                </button>';
        }
       
    
        fwrite($myfile, '
        );
    ?>');
    
        fclose($myfile);
        $resltat->closeCursor();
        $resltat=null;
        $linkpdo=null; 
    }
}else if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Accueil/Matche/')){
            header("Location: /Accueil/");
}else if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Matche/Matche/')){
            header("Location: /Matche/");
}
?>