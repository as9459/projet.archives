<?php
if(($_SERVER['REQUEST_URI']=='/Notre_equipe/') || (substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Notre_equipe/') && !empty($_GET['filter_membres_equipe'])){

    $linkpdo = connexion();
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

    function creeligneTableau_de_main_MembresNotreEquipe($resltat,$linkpdo){
        
        $nbId = idtonb();
        $strurl = urltostring();
        
        $myfile = fopen($GLOBALS['vMarge'].'./../wwwSer/temp/filearrayDataImg'.$strurl.$nbId.'.php', "w") or die("Unable to open file!");
        $txt = '<?php
    $arrayDataImg = array(
            0 => "./wwwSerImg/"';
        fwrite($myfile, $txt);
        while ($data = $resltat->fetch()) {
            echo '<tr id="tr_N_'.$data['iD_joueurs'].'">
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
                <td aria-valuetext="'.$data['nom'].'" headers="Nom_ht">'.$data['nom'].'</td>
                <td aria-valuetext="'.$data['prenom'].'" headers="Prenom_ht">'.$data['prenom'].'</td>
                <td aria-valuetext="" headers="Poste_ht">
                    <select>';

                    $reqPoste = "SELECT joueurs_poste.* FROM `role`, `joueurs_poste` 
                                WHERE role.iD_poste = joueurs_poste.iD_poste
                                And role.iD_joueurs = ".$data['iD_joueurs'];
                    $resPoste = $linkpdo->query($reqPoste);
                    while ($dataPoste = $resPoste->fetch()) {
                        echo '<option value="'.$dataPoste['iD_poste'].'">'.$dataPoste['poste_description'].'</option>';
                    }
                    $resPoste=null;

                echo'
                    </select>
                </td>
                <td aria-valuetext="'.$data['taille'].'" headers="Taille_ht">'.$data['taille'].' m</td>
                <td aria-valuetext="'.$data['poids'].'" headers="Poids_ht">'.$data['poids'].' kg</td>';

                $reqEvalu = "SELECT avg(evaluer) FROM `participer` WHERE iD_joueurs = \"".$data['iD_joueurs']."\"";
                $resEvalu  = $linkpdo->query($reqEvalu);
                if(!empty($resEvalu)){$nbEvaluations = $resEvalu->fetch();}
                if(!empty($nbEvaluations[0])){ 
                    $vEval = substr($nbEvaluations[0],0,stripos($nbEvaluations[0],".")+2);
                    if(empty($vEval)){ $vEval = $nbEvaluations[0];}
                }else{$vEval = '0';}
                
                echo '<td headers="Evaluations_ht">'.$vEval.' / 20</td>';
                $resEvalu=null;

                $reqComment = "SELECT commentaires FROM `joueurs_statut` WHERE iD_statut = \"".$data['iD_statut']."\"";
                $resComment = $linkpdo->query($reqComment);
                $tCommentaires = $resComment->fetch();

                echo '<td headers="Commentaires_ht">'.$tCommentaires[0].'</td>
                <td headers="Action_ht">
                <button type="submit" title="Afficher le profil du joueur" name="Afficher" value="'.$data['nom'].'-'.$data['prenom'].'"  form="form-noterEquipe" formaction="Joueur/" formmethod="GET">
                        Afficher
                </button>
                </td>
            </tr>';
            $resComment=null;

        }
        
        fwrite($myfile, '
        );
    ?>');
    
        fclose($myfile);
        $resltat->closeCursor();
        $resltat=null;
        $linkpdo=null;
    }
}
?>