<?php
if ($_SERVER['REQUEST_URI']=='/Matchs/Nouveau_Matche/') {
    $MsgErrrur = "";
    $MsgErDate = "";
    $MsgErheure = "";
    $MsgErVsEquipes = "";
    $MsgErTitul = "";
    $MsgErPoste = "";
    $postErr = array();
    date_default_timezone_set('Europe/Sofia');

    function creeligneTableau_de_main_Matchs(){
        $linkpdo = connexion();
        $req = "SELECT * FROM `joueurs` WHERE iD_statut = 'ACT'";
        $resltat = $linkpdo->query($req);
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
                    <td aria-valuetext="" headers="Titulaire_ht">
                    <input name="Titulaire[]" value="'.$data['iD_joueurs'].'" type="checkbox" form="fromInput" ';
                    if(!empty($_POST['Titulaire'])&&(in_array($data['iD_joueurs'],$_POST['Titulaire']))){
                            echo 'checked';  
                    }
                    echo ' >
                    </td>
                    <td aria-valuetext="" headers="Remplacant_ht">
                    <input name="Remplacant[]" value="'.$data['iD_joueurs'].'" type="checkbox" form="fromInput" ';
                    if(!empty($_POST['Remplacant'])&&(in_array($data['iD_joueurs'],$_POST['Remplacant']))){
                            echo 'checked';  
                    }
                    echo ' >
                    </td>
                    <td aria-valuetext="" headers="Poste_ht">
                        <select ';
                        
                        $text = ' name="Poste['.$data['iD_joueurs'].']" form="fromInput">';
    
                        $reqPoste = "SELECT joueurs_poste.* FROM `role`, `joueurs_poste` 
                                    WHERE role.iD_poste = joueurs_poste.iD_poste
                                    And role.iD_joueurs = ".$data['iD_joueurs'];
                        $resPoste = $linkpdo->query($reqPoste);
                        while ($dataPoste = $resPoste->fetch()) {
                            $text = $text.'<option value="'.$dataPoste['iD_poste'].'" ';
                            if(in_array($dataPoste['iD_poste'],$GLOBALS['postErr']) ){
                                $text = ' style="color:red;" '.$text;} 
                            
                            if(!empty($_POST['Poste'])){
                                if($_POST['Poste'][$data['iD_joueurs']] == $dataPoste['iD_poste']){
                                    $text = $text.'selected';
                                }
                            }
                            
                            $text = $text.' >'.$dataPoste['poste_description'].'</option>';
                        }
                        $resPoste=null;
                    
                    echo $text;
                    echo'
                        </select>
                    </td>
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
                    <td aria-valuetext="'.$data['taille'].'" headers="Taille_ht">'.$data['taille'].' m</td>
                    <td aria-valuetext="'.$data['poids'].'" headers="Poids_ht">'.$data['poids'].' kg</td>';
    
                    $reqEvalu = "SELECT avg(*) FROM `participer` WHERE iD_joueurs = \"".$data['iD_joueurs']."\"";
                    $resEvalu  = $linkpdo->query($reqEvalu);
                    if(!empty($resEvalu)){$nbEvaluations = $resEvalu->fetch();}
                    echo '<td headers="Evaluations_ht">'; if(!empty($nbEvaluations)){ echo $nbEvaluations;}else{echo '0';} echo ' / 20</td>';
                    $resEvalu=null;
                    
    
                    echo '
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
        
        if(empty($_POST['VsEquipes'])){
                $MsgErVsEquipes ="*";
        }
        
        
        if(empty($_POST['heure'])){
                $MsgErheure ="*";
        }else if((date($_POST['date']) == date('Y-m-d')) && (date($_POST['heure']) < date('h:i'))){
                $MsgErheure ="*";
        }
        
        if(empty($_POST['date'])){
                $MsgErDate ="*";
        }else if(date($_POST['date']) < date('Y-m-d')){
                $MsgErDate ="*";
        }
        
        if(empty($_POST['Titulaire'])){
            $MsgErTitul = "*";
        }else if(count($_POST['Titulaire']) < 11){
            $MsgErTitul = "*";
        }else if(count($_POST['Titulaire']) > 11){
            $MsgErTitul = "*";
        }else {
            $MsgErrrur = "";
            if(!empty($_POST['Poste']) && !empty($_POST['Titulaire'])){
                $tPoste=array('AD'=>0, 'BT'=>0, 'AG'=>0 ,
                                'MD'=>0, 'MC'=>0, 'MOC'=>0, 'MG'=>0, 
                                'DD'=>0, 'DC'=>0, 'DG'=>0, 
                                'G'=>0);
                foreach ($_POST['Poste'] as $key => $value) {
                    if(in_array($key,$_POST['Titulaire'])){
                       $tPoste["$value"]++;  
                    }
                }
                
                if($tPoste['AD']>1){
                    $MsgErPoste = "*";
                    array_push($postErr,'AD');
                }
                if($tPoste['BT']>3){
                    $MsgErPoste = "*";
                    array_push($postErr,'BT');
                }else if($tPoste['BT']<1){
                    $MsgErPoste = "*";
                    array_push($postErr,'BT');
                }
                if($tPoste['AG']>1){
                    $MsgErPoste = "*";
                    array_push($postErr,'AG');
                }
                
                if($tPoste['MD']>1){
                    $MsgErPoste = "*";
                    array_push($postErr,'MD');
                }else if($tPoste['MD']<1){
                    $MsgErPoste = "*";
                    array_push($postErr,'MD');
                }
                if($tPoste['MOC']>1){
                    $MsgErPoste = "*";
                    array_push($postErr,'MOC');
                }else if(($tPoste['MC']>2) && ($tPoste['MOC']=1)){
                    $MsgErPoste = "*";
                    array_push($postErr,'MC');
                    
                }else if(($tPoste['MC']<1) && ($tPoste['MOC']=0)){
                    $MsgErPoste = "*";
                    array_push($postErr,'MC');
                } 
                if($tPoste['MG']>1){
                    $MsgErPoste = "*";
                    array_push($postErr,'MG');
                }else if($tPoste['MG']<1){
                    $MsgErPoste = "*";
                    array_push($postErr,'MG');
                }
                
                if($tPoste['DD']>1){
                    $MsgErPoste = "*";
                    array_push($postErr,'DD');
                }else if($tPoste['DD']<1){
                    $MsgErPoste = "*";
                    array_push($postErr,'DD');
                }
                if($tPoste['DC']>3){
                    $MsgErPoste = "*";
                    array_push($postErr,'DC');
                }else if($tPoste['DC']<1){
                    $MsgErPoste = "*";
                    array_push($postErr,'DC');
                }
                if($tPoste['DG']>1){
                    $MsgErPoste = "*";
                    array_push($postErr,'DG');
                }else if($tPoste['DG']<1){
                    $MsgErPoste = "*";
                    array_push($postErr,'DG');
                }
                
                if($tPoste['G']>1){
                    $MsgErPoste = "*";
                    array_push($postErr,'G');
                }else if($tPoste['G']<1){
                    $MsgErPoste = "*";
                    array_push($postErr,'G');
                }
            }
            
            if(!empty($MsgErPoste) || !empty($MsgErTitul)|| !empty($MsgErVsEquipes)|| !empty($MsgErheure)|| !empty($MsgErDate)){
                $MsgErrrur = "*";
                echo '<p> $MsgErrrur ='.$MsgErrrur.'<p/>';
            }
            if(($MsgErrrur == "") && ($_POST["BtnValideNouveauMatch"] == "ClickBtnValideNouveauMatch")){
                
                $vDateMatch = f_input($_POST["date"]);
                $vHeureMatch = f_input($_POST["heure"]);
                $vEquipeAdverse = f_input($_POST["VsEquipes"]);
                $vID_lieus = f_input($_POST["leux"]);
                $vTitulaire = array();
                if(!empty($_POST["Titulaire"])){
                     foreach ($_POST["Titulaire"] as $key => $value) {
                         $tKey = f_input($key);
                         $vTitulaire[$tKey] = f_input($value);
                     }
                }
                 
                $vRemplacant = array();
                if(!empty($_POST["Remplacant"])){
                     foreach ($_POST["Remplacant"] as $key => $value) {
                         $tKey = f_input($key);
                         $vRemplacant[$tKey] = f_input($value);
                     }
                }
                $vPoste = array();
                if(!empty($_POST["Poste"])){
                     foreach ($_POST["Poste"] as $key => $value) {
                         $tKey = f_input($key);
                         $vPoste[$tKey] = f_input($value);
                     }
                }
                
                $linkpdo = connexion();
                $res = $linkpdo->query('SELECT max(iD_matchs) FROM `matchs`');
                $data = $res->fetch();
                $vId_match = 1+$data[0];
                
                $req = $linkpdo->prepare('INSERT INTO `matchs`(`iD_matchs`, `dateMatch`, `heureMatch`, `equipeAdverse`, `score`, `iD_lieus`) 
                                            VALUES(:iD_m, :dateM, :heureM, :equipeA, :scores, :lieus)');
                                            
                $req->execute(array('iD_m' => $vId_match,
                                    'dateM' => $vDateMatch,
                                    'heureM' => $vHeureMatch,
                                    'equipeA' => $vEquipeAdverse,
                                    'scores' => "N - N",
                                    'lieus' => $vID_lieus));

                                
                $req = $linkpdo->prepare('INSERT INTO `participer`(`joueur_position`, `evaluer`, `nbCarteRouge`, `nbCarteJaune`, `nbTirsCadres`, `iD_matchs`, `iD_joueurs`, `id_etat`) 
                                        VALUES(:poste, :eval, :carteR, :carteJ, :tirsC, :iD_m, :iD_j, :id_E)');

            

            foreach ($vTitulaire as $key => $iD_joueur) {
                $req->execute(array('poste' => "$vPoste[$iD_joueur]",
                                    'eval' => 0,
                                    'carteR' => 0,
                                    'carteJ' => 0,
                                    'tirsC' => 0,
                                    'iD_m' => $vId_match,
                                    'iD_j' => $iD_joueur,
                                    'id_E' => "TTM"));  
            }   
            
            if(!empty($vRemplacant)){
                foreach ($vRemplacant as $key => $iD_joueur) {
                    $req->execute(array('poste' => "$vPoste[$iD_joueur]",
                                        'eval' => 0,
                                        'carteR' => 0,
                                        'carteJ' => 0,
                                        'tirsC' => 0,
                                        'iD_m' => $vId_match,
                                        'iD_j' => $iD_joueur,
                                        'id_E' => "RTM"));  
                }
            }
            header("Location: /Matchs/");
        }
    }
}
?>