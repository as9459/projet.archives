<?php
if(((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Notre_equipe/Modifier/') && (empty($_GET['Joueur'])))){
            header("Location: /Notre_equipe/");
            
}elseif((substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['REQUEST_URI'],"?"))=='/Notre_equipe/Modifier/') && (!empty($_GET['Joueur']))){
    
    
    $vNomJ =  f_input(substr($_GET['Joueur'],0,strripos($_GET['Joueur'],"-")));
    $vPrenomJ = f_input(substr($_GET['Joueur'],strripos($_GET['Joueur'],"-")+1,strlen($_GET['Joueur'])));
    
    $linkpdo = connexion();
    $req = "SELECT * FROM `joueurs` WHERE lower(nom) = lower(\"".$vNomJ."\") AND lower(Prenom) = lower(\"".$vPrenomJ."\")";
    $res = $linkpdo->query($req);
    $vJoueur = $res->fetch();
    
    
    if((!empty($_POST['BtnValiderJoueurInfoNM'])) && ($_POST['BtnValiderJoueurInfoNM']=='ClickBtnValiderJoueurInfoNM')){
        
        $MysqlMsgErr = '';
        $vNom = f_input($_POST["UpNom"]);
        $vPrenom = f_input($_POST["UpPrenom"]);
        $vLicence = f_input($_POST["UpLicence"]);
        $vDateNaissance = f_input($_POST["UpDateNaissance"]);
        $vHauteur = f_input($_POST["UpHauteur"]);
        $vPoids = f_input($_POST["UpPoids"]);
        $vStatut= f_input($_POST["joueurs_statut"]);

        if(!empty($_POST["Postes"])){
            $i=0;
            $vPostes = array();
            foreach ($_POST["Postes"] as $data) {
                    $vPostes[$i] = f_input($data);
                $i=$i+1;
            }
        }


        if( $vNom !=  $vJoueur['nom'] ||  $vPrenom !=  $vJoueur['prenom'] ){
            $req = "SELECT count(*) FROM `joueurs` WHERE iD_joueurs <> ".$vJoueur['iD_joueurs']." AND lower(nom) = lower(\"".$vNom."\") AND lower(Prenom) = lower(\"".$vPrenom."\") ";
            $res = $linkpdo->query($req);
            if(!empty($res)){
                $nbCount = $res->fetch();
            }else{
                $nbCount[0]=0;
            }
            
            if ($nbCount[0] > 0){
                $MysqlMsgErr = " Le nom et le prenom du joueur <strong>"."$vPrenom".' '."$vNom"."</strong> est <strong>déjà enregistré</strong><br/>";
            }
        }
        
        if( $vLicence !=  $vJoueur['numeroLicence']){
            $req = "SELECT count(*) FROM `joueurs` WHERE iD_joueurs <> ".$vJoueur['iD_joueurs'].' AND numeroLicence = '.$vJoueur['numeroLicence'];
            $res = $linkpdo->query($req);
            if(!empty($res)){
                $nbCount = $res->fetch();
            }else{
                $nbCount[0]=0;
            }
            
            if ($nbCount[0] > 0){
                $MysqlMsgErr = " Le numero du licence <strong>"."$vPrenom"."</strong> est <strong>déjà enregistré</strong><br/>";
            }
        }
        
        if($MysqlMsgErr==''){
            
            $req = $linkpdo->prepare(' UPDATE `joueurs` SET `nom` = :nom, `prenom` = :prenom, `dateNaissance` = :date, `numeroLicence` = :Licence, `taille` = :taille, `poids` = :poids, `iD_statut` = :statut
             WHERE iD_joueurs = '.$vJoueur['iD_joueurs']);
            $req->execute(array('nom' => $vNom,
                                'prenom' => $vPrenom,
                                'date' => $vDateNaissance,
                                'Licence' => $vLicence,
                                'taille' => $vHauteur,
                                'poids' => $vPoids,
                                'statut' => $vStatut));
            
            $req = $linkpdo->exec('DELETE FROM role WHERE iD_joueurs = '.$vJoueur['iD_joueurs']);
            
            $req = $linkpdo->prepare('INSERT INTO role (iD_joueurs, iD_poste) 
                                        VALUES(:id, :poste)');


            if(!empty($vPostes)){
                foreach ($vPostes as $data) {
                    $req->execute(array('id' => $vJoueur['iD_joueurs'],
                                        'poste' => $data));  
                } 
            }  

            $target_dir = $GLOBALS['vMarge'].'./../wwwSer/ser/joueurs_img/';
            $file_new_name = sha1($vNom.$vPrenom.$vLicence);
            $target_file = $target_dir.$file_new_name.'.png';
    
            if(file_exists('./wwwSerImg/'.$_POST['Val_file_new_name'].'.png') && $_POST['Val_file_new_name'] != 'img'){
                copy('./wwwSerImg/'.$_POST['Val_file_new_name'].'.png',$target_file);
    
                if(file_exists($target_file)){
                    unlink('./wwwSerImg/'.$_POST['Val_file_new_name'].'.png');
                }
            }
            $toUrl = urlRetourne('1');
            header('Location: '.$toUrl.'?Afficher='.$vNom.'-'.$vPrenom);
        }
    }
    
    $vNomJ =  f_input(substr($_GET['Joueur'],0,strripos($_GET['Joueur'],"-")));
    $vPrenomJ = f_input(substr($_GET['Joueur'],strripos($_GET['Joueur'],"-")+1,strlen($_GET['Joueur'])));
    
    $linkpdo = connexion();
    $req = "SELECT * FROM `joueurs` WHERE lower(nom) = lower(\"".$vNomJ."\") AND lower(Prenom) = lower(\"".$vPrenomJ."\")";
    $res = $linkpdo->query($req);
    $vJoueur = $res->fetch();
    
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
    
    $target_dir = $GLOBALS['vMarge']."./../wwwSer/ser/joueurs_img/";
    $file_new_name = sha1($vJoueur['nom'].$vJoueur['prenom'].$vJoueur['numeroLicence']);
    $target_file = $target_dir.$file_new_name.'.png';
    
    if(empty($_POST['Val_file_new_name'])){
        $myfile = fopen($GLOBALS['vMarge'].'./../wwwSer/temp/filearrayDataImg'.$strurl.$nbId.'.php', "a") or die("Unable to open file!");
        $_POST['Val_file_new_name'] = (rand()%9999).'_'.(rand()%9999).'_'.(rand()%9999);
    }
    
    
    $myfile = fopen($GLOBALS['vMarge'].'./../wwwSer/temp/filearrayDataImg'.$strurl.$nbId.'.php', "w") or die("Unable to open file!");
    $txt = '<?php
$arrayDataImg = array(
        0 => "./wwwSerImg/",
        1 => "'.$_POST['Val_file_new_name'].'.png"
    );
?>';
    fwrite($myfile, $txt);
    fclose($myfile);
    
    if(file_exists($target_file)){
        copy($target_file,'./wwwSerImg/'.$_POST['Val_file_new_name'].'.png');
    }else{
        if(empty($_POST['Val_file_new_name'])){
            $_POST['Val_file_new_name'] = 'img';
        }
    }
    
    
    if((!isset($_POST['BtnValiderJoueurInfoNM'])) &&(isset($_FILES['fileToUpload'])) && (!empty($_FILES['fileToUpload']['name'])) && (!empty($_POST['submitFileToUpload'])) && ($_POST['submitFileToUpload']=='Upload_Image')){
        
        if(file_exists('./wwwSerImg/'.$_POST['Val_file_new_name'].'.png')){
            unlink('./wwwSerImg/'.$_POST['Val_file_new_name'].'.png');
        }
        
        
        $target_dir = "./wwwSerImg/";
        if(!(substr($_POST['Val_file_new_name'],0,stripos($_POST['Val_file_new_name'],"_")) == 'joueurImgNew')){
            $_POST['Val_file_new_name'] = "joueurImgNew_".$_POST['Val_file_new_name'];
        }
        
        
    $nbId = idtonb();
    $strurl = urltostring();
        $myfile = fopen($GLOBALS['vMarge'].'./../wwwSer/temp/filearrayDataImg'.$strurl.$nbId.'.php', "w") or die("Unable to open file!");
    $txt = '<?php
$arrayDataImg = array(
        0 => "./wwwSerImg/",
        1 => "'.$_POST['Val_file_new_name'].'.png"
    );
?>';
        fwrite($myfile, $txt);
        fclose($myfile);
        
        $file_name = $target_dir.basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
        $target_file = $target_dir.$_POST['Val_file_new_name'].'.png';
        $uploadOk = 1;
        $uploadMsgErr ='';
        
        // Check if image file is a actual image or fake image
        if((isset($_FILES['fileToUpload'])) && (!empty($_FILES['fileToUpload']["tmp_name"]))){
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadMsgErr= "File is not an image.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $uploadMsgErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
    
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                $uploadMsgErr = "Sorry, your file is too large.";
                $uploadOk = 0;
            } 
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file 
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                } else {
                    $uploadMsgErr = "Sorry, there was an error uploading your file.";
                }
            }
        }
    }

}
?>