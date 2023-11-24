<?php
    if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Matchs/Saisire_Resultat_Matche/') && !empty($_GET['Mettez_resultat'])){
        $vMatchP =  f_input(substr($_GET['Mettez_resultat'],0,stripos($_GET['Mettez_resultat'],"-")));
    $vDateP = f_input(substr($_GET['Mettez_resultat'],stripos($_GET['Mettez_resultat'],"-")+1,strlen($_GET['Mettez_resultat'])));
    
    $linkpdo = connexion();
    $req = "SELECT * FROM `matchs` WHERE lower(equipeAdverse) = lower(\"".$vMatchP."\") AND dateMatch = \"".$vDateP."\" ";
    $res = $linkpdo->query($req);
    if(!empty($res)){
        $vMatch = $res->fetch();
    }
    
    $reqParticiper = "SELECT * FROM `participer` WHERE iD_matchs = \"".$vMatch['iD_matchs']."\"";
    $resParticiper = $linkpdo->query($reqParticiper);
    
    
    function creeligneTableau_de_main_MettezResultat($resltat,$linkpdo){
            
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
            echo'
                    <tr id="tr_N_'.$data['iD_joueurs'].'">
                        <td aria-valuetext="'.$data['iD_joueurs'].'" headers="N_ht">'.$data['iD_joueurs'].'</td>
                        <td aria-valuetext="photo" headers="Photo_ht">';
                    
                        $target_dir = $GLOBALS['vMarge']."./../wwwSer/ser/joueurs_img/";
                        $file_new_name = sha1($vJoueur['nom'].$vJoueur['prenom'].$vJoueur['numeroLicence']);
                        $target_file = $target_dir.$file_new_name.'.png';
                        
                        
                        $dataImg = $data['iD_joueurs'].'_'.(rand()%9999).'_'.(rand()%9999).'_'.(rand()%9999);
                        
                        fwrite($myfile, ",\n        ".$data['iD_joueurs'].' => "'.$dataImg.'.png"');
                        
                        if(file_exists($target_file)){
                            copy($target_file,'./wwwSerImg/'.$dataImg.'.png');
                        }
                    
                        echo '<img src="./wwwSerImg/'.$dataImg.'.png" alt="">
                        </td>
                        <td aria-valuetext="" headers="NomPrenom_ht">'.$vJoueur['nom'].' '.$vJoueur['prenom'].'</td>
                        <td aria-valuetext="" headers="CarteR_ht">
                            <input name="CarteR['.$data['iD_joueurs'].']" type="text" value="';
                            if(!empty($_POST['CarteR'][$data['iD_joueurs']])){echo $_POST['CarteR'][$data['iD_joueurs']]; }
                            
                            echo '" placeholder="0" form="fromInput">
                        </td>
                        <td aria-valuetext="" headers="CarteJ_ht">
                            <input name="CarteJ['.$data['iD_joueurs'].']" type="text" value="';
                            if(!empty($_POST['CarteJ'][$data['iD_joueurs']])){echo $_POST['CarteJ'][$data['iD_joueurs']]; }
                            
                            echo '" placeholder="0" form="fromInput">
                        </td>
                        <td aria-valuetext="" headers="Tirs_ht">
                            <input name="Tirs['.$data['iD_joueurs'].']"  value="';
                            if(!empty($_POST['Tirs'][$data['iD_joueurs']])){echo $_POST['Tirs'][$data['iD_joueurs']]; }
                            
                            echo '" type="text" placeholder="0" form="fromInput">
                        </td>
                        <td aria-valuetext="" headers="Remplacant_ht">
                            <select name="Remplacant['.$data['iD_joueurs'].']" form="fromInput">
                                <option value=""></option>
                                <option value="TTM" ';
                                if(empty($_POST['Remplacant'])){
                                    if($data['id_etat'] == "TTM"){echo ' selected ';}
                                    echo ' >Il est Titulaire pour tout le match</option>
                                    <option value="TAS" '; if($data['id_etat'] == "TAS"){echo ' selected ';}
                                    echo ' >Il a été sorti</option>
                                    <option value="RTM" '; if($data['id_etat'] == "RTM"){echo ' selected ';}
                                    echo ' >Il est remplaçant pour tout le match</option>
                                    <option value="RAE" '; if($data['id_etat'] == "RAE"){echo ' selected ';}
                                }else{
                                    if($_POST['Remplacant'][$data['iD_joueurs']] == "TTM"){echo ' selected ';}
                                    echo ' >Il est Titulaire pour tout le match</option>
                                    <option value="TAS" '; if($_POST['Remplacant'][$data['iD_joueurs']] == "TAS"){echo ' selected ';}
                                    echo ' >Il a été sorti</option>
                                    <option value="RTM" '; if($_POST['Remplacant'][$data['iD_joueurs']] == "RTM"){echo ' selected ';}
                                    echo ' >Il est remplaçant pour tout le match</option>
                                    <option value="RAE" '; if($_POST['Remplacant'][$data['iD_joueurs']] == "RAE"){echo ' selected ';}
                                }
                                echo ' >Il a été entré</option>
                            </select>
                        </td>
                        <td aria-valuetext="';
                            if(!empty($_POST['Evaluations'][$data['iD_joueurs']])){echo $_POST['Evaluations'][$data['iD_joueurs']]; }
                        echo ' / 20" headers="Evaluations_ht">
                            <input name="Evaluations['.$data['iD_joueurs'].']" value="';
                            if(!empty($_POST['Evaluations'][$data['iD_joueurs']])){echo $_POST['Evaluations'][$data['iD_joueurs']]; }
                            echo '" type="text" required placeholder="00 / 20" form="fromInput">
                        </td>
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

    if(!empty($_POST['BtnValideRsultatMatch']) &&($_POST['BtnValideRsultatMatch'] == 'ClickBtnValideRsultatMatch') ){
        
        foreach ($resParticiper as $data) {
            
            if(!empty($_POST['Evaluations'][$data['iD_joueurs']])){$vEvaluations=$_POST['Evaluations'][$data['iD_joueurs']];}else{$vEvaluations=0;};
            if(!empty($_POST['CarteR'][$data['iD_joueurs']])){$vCarteR=$_POST['CarteR'][$data['iD_joueurs']];}else{$vCarteR=0;};
            if(!empty($_POST['CarteJ'][$data['iD_joueurs']])){$vCarteJ=$_POST['CarteJ'][$data['iD_joueurs']];}else{$vCarteJ=0;};
            if(!empty($_POST['Tirs'][$data['iD_joueurs']])){$vTirs=$_POST['Tirs'][$data['iD_joueurs']];}else{$vTirs=0;};
            if(!empty($_POST['Remplacant'][$data['iD_joueurs']])){$vRemplacant=$_POST['Remplacant'][$data['iD_joueurs']];};
            
            $sql = 'UPDATE participer SET evaluer = '.$vEvaluations.', nbCarteRouge = '.$vCarteR.', nbCarteJaune = '.$vCarteJ.', nbTirsCadres = '.$vTirs.', id_etat = "'.$vRemplacant.'" WHERE iD_joueurs = '.$data['iD_joueurs']." and iD_matchs = ".$data['iD_matchs'];
            $stmt = $linkpdo->prepare($sql);
            $stmt->execute();
        }
            header("Location: /Matchs/");
    
    }
    }else if((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Matchs/Saisire_Resultat_Matche/')){
        header("Location: /Matchs/");
    }
?>