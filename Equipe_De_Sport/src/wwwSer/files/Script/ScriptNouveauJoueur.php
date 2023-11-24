<?php


 
if((($_SERVER['REQUEST_URI']=='/Notre_equipe/Nouveau_Joueur/') && (empty($_POST['BtnNouveauJoueur'])))){
            header("Location: /Notre_equipe/");
    

}else if(($_SERVER['REQUEST_URI']=='/Notre_equipe/Nouveau_Joueur/') && (!empty($_POST['BtnNouveauJoueur'])) && ($_POST['BtnNouveauJoueur'] == 'CkilckBtnNouveauJoueur')){
    
    if(empty($_POST['Val_file_new_name'])){
        $_POST['Val_file_new_name'] = 'img';
    }
    
    if((!isset($_POST['BtnValiderJoueurInfoNM'])) &&(isset($_FILES['fileToUpload'])) && (!empty($_FILES['fileToUpload'])) && (!empty($_POST['submitFileToUpload'])) && ($_POST['submitFileToUpload']=='Upload_Image')){
        
    $nbId = idtonb();
    $strurl = urltostring();
        $myfile = fopen($GLOBALS['vMarge'].'./../wwwSer/temp/filearrayDataImg'.$strurl.$nbId.'.php', "w") or die("Unable to open file!");
    $txt = '<?php
$arrayDataImg = array(
        0 => "./wwwSerImg/",
        1 => "joueurImgNew.png"
    );
?>';
        fwrite($myfile, $txt);
        fclose($myfile);
        echo '<p>__uplode</p>';
        $target_dir = "./wwwSerImg/";
        $_POST['Val_file_new_name'] = "joueurImgNew";
        $file_name = $target_dir.basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
        $target_file = $target_dir.$_POST['Val_file_new_name'].'.png';
        $uploadOk = 1;
        $uploadMsgErr = '';
        
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

        
        $linkpdo = connexion();
        $req = "SELECT count(*) FROM `joueurs` WHERE lower(nom) = lower(\"".$vNom."\") AND lower(Prenom) = lower(\"".$vPrenom."\")";
        $res = $linkpdo->query($req);
        $nbCount = $res->fetch();
        
        if ($nbCount[0] > 0){
            $MysqlMsgErr = " Le Joueur <strong>"."$vPrenom".' '."$vNom"."</strong> est est <strong>déjà enregistré</strong><br/>";
            

        }else if($nbCount[0] == 0){
            

            $res = $linkpdo->query('SELECT max(iD_joueurs) FROM `joueurs`');
            $data = $res->fetch();
            $vId = 1+$data[0];
            

            $req = $linkpdo->prepare('INSERT INTO `joueurs`(`iD_joueurs`, `nom`, `prenom`, `dateNaissance`, `numeroLicence`, `taille`, `poids`, `iD_statut`) 
                                        VALUES(:id, :nom, :prenom, :date, :Licence, :taille, :poids, :statut)');
            $req->execute(array('id' => $vId,
                                'nom' => $vNom,
                                'prenom' => $vPrenom,
                                'date' => $vDateNaissance,
                                'Licence' => $vLicence,
                                'taille' => $vHauteur,
                                'poids' => $vPoids,
                                'statut' => $vStatut)); 

                                
            $req = $linkpdo->prepare('INSERT INTO `role`(`iD_joueurs`, `iD_poste`) 
                                        VALUES(:id, :poste)');


            foreach ($vPostes as $data) {
                $req->execute(array('id' => $vId,
                                    'poste' => $data));  
            }   

            $target_dir = $GLOBALS['vMarge']."./../wwwSer/ser/joueurs_img/";
            $file_new_name = sha1($vNom.$vPrenom.$vLicence);
            $target_file = $target_dir.$file_new_name.'.png';
            
            if(file_exists('./wwwSerImg/'.$_POST['Val_file_new_name'].'.png') && $_POST['Val_file_new_name'] != 'img'){
                copy('./wwwSerImg/'.$_POST['Val_file_new_name'].'.png',$target_file);
    
                if(file_exists($target_file)){
                    unlink('./wwwSerImg/'.$_POST['Val_file_new_name'].'.png');
                } 
            }
            
            header("Location: /Notre_equipe/");
        }
    }
}
?>