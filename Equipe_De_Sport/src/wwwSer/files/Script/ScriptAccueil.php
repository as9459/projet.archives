<?php
if(($_SERVER['REQUEST_URI']=='/') || ($_SERVER['REQUEST_URI']=='/Accueil/')){
    
    $linkpdo = connexion();
    $reqMatchArrev  = "SELECT `iD_matchs`, `dateMatch`, `heureMatch`, `equipeAdverse`, `score`, `iD_lieus` FROM `matchs` where `dateMatch` >= SysDate()-1000000  and `score` = 'N - N' ORDER by 2 ,3 ,1  ";
    $resMatchArrev = $linkpdo->query($reqMatchArrev );
    if(!empty($resMatchArrev)){
        $vMatchArrev = $resMatchArrev->fetch();
        if(!empty($vMatchArrev['equipeAdverse'])){
            $vMatchArrevVS = $vMatchArrev['equipeAdverse'];
            $vMatchArrevDate = date("d/m/Y", strtotime($vMatchArrev['dateMatch']));
            $vMatchArrevTime = date("H:i", strtotime($vMatchArrev['heureMatch']));
        }else{
            $vMatchArrevVS = "Non";
            $vMatchArrevDate = date("d/m/Y");
            $vMatchArrevTime = date("H:i");
        }
    }
    $linkpdo = null;
    
    date_default_timezone_set('Europe/Paris');
    
    
    
    function creeButton_Matchs_precedent(){
        $linkpdo = connexion();
        $reqEquAdv = "SELECT equipeAdverse, dateMatch, score
        FROM matchs
        WHERE dateMatch < NOW()";
        $resEqu = $linkpdo->query($reqEquAdv);
        while ($dataEqu = $resEqu->fetch()) {
            if($dataEqu["score"] != 'N - N'){
                echo '
        <button class="S-main-accueil-MatchePrecedents-BtnMatch" id="S-main-accueil-MatchePrecedents-BtnMatch-premier" name="Affiche" value="'.$dataEqu["equipeAdverse"]."-".$dataEqu["dateMatch"].
                '" type="submit" form="accueil-form" formaction="/Accueil/Matche/" formmethod="GET">
             <div class="S-m-accueil-MatchePrecedents-BtnMatch-Bloc">
                <div class="S-main-accueil-MatchePrecedents-img">
                    <img src="';
                    $vNoterScore =  f_input(substr($dataEqu["score"],0,strripos($dataEqu["score"],"-")-1));
                    $vScoreEquipeAdverse = f_input(substr($dataEqu["score"],strripos($dataEqu["score"],"-")+2,strlen($dataEqu["score"])));
                    if(intval($vNoterScore) > intval($vScoreEquipeAdverse)){
                        echo $GLOBALS['linkeImgWeb']['victoire'];
                    }
                    if(intval($vNoterScore) == intval($vScoreEquipeAdverse)){
                        echo $GLOBALS['linkeImgWeb']['egalite'];
                    }
                    if(intval($vNoterScore) < intval($vScoreEquipeAdverse)){
                        echo $GLOBALS['linkeImgWeb']['perte'];
                    }
                    echo '" alt=""> 
                </div>
                <div class="S-main-accueil-MatchePrecedents-info">
                    <p>'.$dataEqu["equipeAdverse"].'</p>
                    <p>'.$dataEqu["score"].'</p>
                </div>
            </div>
        </button>';
            }
        }
        $resEqu->closeCursor();
        $resEqu=null;
        $linkpdo=null;
    }
    
    function creeButton_Meilleurs_joueurs(){
        $linkpdo = connexion();
        $reqMeiJou = "SELECT joueurs.iD_joueurs ,joueurs.nom, joueurs.prenom, joueurs.numeroLicence,joueurs_poste.poste_description, participer.evaluer FROM joueurs, joueurs_poste, participer WHERE participer.joueur_position = joueurs_poste.iD_poste And participer.iD_joueurs = joueurs.iD_joueurs GROUP BY joueurs.nom, joueurs.prenom, joueurs_poste.poste_description HAVING avg(participer.evaluer) >= 15 ";
        $resMj = $linkpdo->query($reqMeiJou);
        
        
        $nbId = idtonb();
        $strurl = urltostring();
        
        $myfile = fopen($GLOBALS['vMarge'].'./../wwwSer/temp/filearrayDataImg'.$strurl.$nbId.'.php', "w") or die("Unable to open file!");
        $txt = '<?php
    $arrayDataImg = array(
            0 => "./Accueil/wwwSerImg/"';
        fwrite($myfile, $txt);
        $iii=1;
        
        while ($dataMj = $resMj->fetch()) {
            
                echo '
        <button class="S-main-accueil-MeilleursJoueurs-BtnJoueurs" id="S-main-accueil-MeilleursJoueurs-BtnJoueurs-premier" name="Afficher" value="'.$dataMj["nom"]."-".$dataMj["prenom"].
                '" type="submit" form="accueil-form" formaction="/Accueil/Joueur/" formmethod="GET">
             <div class="S-m-accueil-MatchePrecedents-BtnJoueurs-Bloc">
                <div class="S-main-accueil-MeilleursJoueurs-img">';
                        
                        $target_dir = $GLOBALS['vMarge']."./../wwwSer/ser/joueurs_img/";
                        $file_new_name = sha1($dataMj['nom'].$dataMj['prenom'].$dataMj['numeroLicence']);
                        $target_file = $target_dir.$file_new_name.'.png';
                        
                        
                        $dataImg = $dataMj['iD_joueurs'].'_'.(rand()%9999).'_'.(rand()%9999).'_'.(rand()%9999);
                        
                        fwrite($myfile, ",\n        ".$iii.' => "'.$dataImg.'.png"');
                        $iii++;
                        if(file_exists($target_file)){
                            copy($target_file,'./Accueil/wwwSerImg/'.$dataImg.'.png');
                        }
                         
                        echo '
                        <img src="./Accueil/wwwSerImg/'.$dataImg.'.png" alt="" style="height: 170px;">
                </div>
                <div class="S-main-accueil-MeilleursJoueurs-info">
                    <div class="S-main-accueil-MeilleursJoueurs-info-p1">
                        <p>'.$dataMj["prenom"]." ".$dataMj["nom"].'</p>
                    </div>

                    <div class="S-main-accueil-MeilleursJoueurs-info-p2">
                        <p>'.$dataMj["poste_description"].'</p>
                    </div>
                </div>
            </div>
        </button>';
        }
        
        fwrite($myfile, '
        );
    ?>');
    
        fclose($myfile);
        $resMj->closeCursor();
        $resMj=null;
        $linkpdo=null;
    }
    
}
?>