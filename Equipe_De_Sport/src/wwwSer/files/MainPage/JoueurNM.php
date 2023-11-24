<main>
    <form class="S-main-form-joueurInfoNM" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" id="fromInput"  autocomplete="off" ></form>  
        <div class="Style-main">
            <div class="S-main-head">
                <div class="S-main-head-BtnRetourne">
                    <button name="BtnRetourne" value="ClickBtnBtnRetourne" formaction="<?php urlRetourne('1');?>" form="fromInputR">
                        Retourne
                    </button>
                </div> 
            </div> 
            <div class="S-main-dicor"></div>
            <div class="S-main-joueurInfoNM">
                <div class="S-main-joueurInfoNM-joueurImg">
                        <label for="joueurInfoNM-joueurImg" title="Cliquez sur l'image pour télécharger..puis sur le bouton de validation"> 
                            <img for="joueurInfoNM-joueurImg" src="./wwwSerImg/<?php echo $_POST['Val_file_new_name'].'.png'; ?>" alt="" loading="lazy" referrerpolicy="no-referrer">
                        </label>
                        <input hidden type="file" name="fileToUpload" value="<?php if(!empty($tmp_name)){echo $tmp_name;}?>" accept="image/*" id="joueurInfoNM-joueurImg" form="fromInputUplode" >
                        <button type="submit" value="Upload_Image" name="submitFileToUpload" form="fromInputUplode" formaction="<?php echo $_SERVER['REQUEST_URI'];?>">
                            valide télécharger des photos
                        </button>
                        <p><?php if(!empty($uploadMsgErr)){ echo '*'.$uploadMsgErr;} ?></p>
                </div>
                <div class="S-main-joueurInfoNM-Input">
                    <div class="S-main-joueurInfoNM-InputRow">
                        <div class="S-main-joueurInfoNM-InputLabel">
                            <label for="cUpNom"> : Nom</label>
                        </div>
                        <div class="S-main-joueurInfoNM-InputChamp">
                            <input type="text" id="cUpNom" value="<?php if(!empty($vJoueur['nom'])){echo $vJoueur['nom'];} ?>"  placeholder=" Entrez le nom du joueur.." name="UpNom" required form="fromInput">
                        </div>
                    </div>
                    
                    <div class="S-main-joueurInfoNM-InputRow">
                        <div class="S-main-joueurInfoNM-InputLabel">
                            <label for="cUpPrenom"> : Prenom</label>
                        </div>
                        <div class="S-main-joueurInfoNM-InputChamp">
                            <input type="text" id="cUpPrenom" name="UpPrenom" value="<?php if(!empty($vJoueur['prenom'])){echo $vJoueur['prenom'];} ?>" placeholder=" Entrez son prenom.."  required form="fromInput">
                        </div>
                    </div>
                    
                    <div class="S-main-joueurInfoNM-InputRow">
                        <div class="S-main-joueurInfoNM-InputLabel">
                            <label for="cUpLicence"> : Licence</label>
                        </div>
                        <div class="S-main-joueurInfoNM-InputChamp">
                            <input type="number" maxlength="16" id="cUpLicence" value="<?php if(!empty($vJoueur['numeroLicence'])){echo $vJoueur['numeroLicence'];} ?>" name="UpLicence"  placeholder=" Entrez son numéro licence.." required form="fromInput">
                        </div>
                    </div>
                    
                    <div class="S-main-joueurInfoNM-InputRow">
                        <div class="S-main-joueurInfoNM-InputLabel">
                            <label for="cUpDateNaissance"> : Date de Naissance</label>
                        </div>
                        <div class="S-main-joueurInfoNM-InputChamp">
                            <input type="date" id="cUpDateNaissance" name="UpDateNaissance" value="<?php if(!empty($vJoueur['dateNaissance'])){echo $vJoueur['dateNaissance'];} ?>" required form="fromInput">
                        </div> 
                    </div>

                    <div class="S-main-joueurInfoNM-InputRow">
                        <div class="S-main-joueurInfoNM-InputLabel">
                            <label for="cUpHauteur"> : Hauteur</label>
                        </div>
                        <div class="S-main-joueurInfoNM-InputChamp">
                            <input type="number" step="0.01" id="cUpHauteur" name="UpHauteur" value="<?php if(!empty($vJoueur['taille'])){echo $vJoueur['taille'];} ?>" placeholder=" Entrez son hauteur.." required form="fromInput">
                        </div>
                    </div>
                    
                    <div class="S-main-joueurInfoNM-InputRow">
                        <div class="S-main-joueurInfoNM-InputLabel">
                            <label for="cUpPoids"> : Poids</label>
                        </div>
                        <div class="S-main-joueurInfoNM-InputChamp">
                            <input type="number" step="0.01" id="cUpPoids" name="UpPoids" value="<?php if(!empty($vJoueur['poids'])){echo $vJoueur['poids'];} ?>" placeholder=" Entrez son poids.." required form="fromInput">
                        </div>
                    </div>

                    <div class="S-main-joueurInfoNM-InputRow">
                        <div class="S-main-joueurInfoNM-InputLabel">
                            <label for="cInputJoueurs_statut"> : etat</label>
                        </div>
                        <div class="S-main-joueurInfoNM-InputChamp" >
                            <select id="cInputJoueurs_statut" name="joueurs_statut" form="fromInput">
                                <option value="" hidden> Entrez son statut..</option>
                                <option value=""></option>
                                <option value="ACT" <?php if(!empty($vJoueur['iD_joueurs'])){selecteStatut($vJoueur['iD_joueurs'],'ACT');} ?>>Actif</option>
                                <option value="BLS" <?php if(!empty($vJoueur['iD_joueurs'])){selecteStatut($vJoueur['iD_joueurs'],'BLS');} ?>>Blessé</option>
                                <option value="ABS" <?php if(!empty($vJoueur['iD_joueurs'])){selecteStatut($vJoueur['iD_joueurs'],'ABS');} ?>>Absent</option>
                                <option value="SPN" <?php if(!empty($vJoueur['iD_joueurs'])){selecteStatut($vJoueur['iD_joueurs'],'SPN');} ?>>Suspendu</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="S-main-joueurInfoNM-Postes" style="background-image: url(./wwwSerImg/TERRAIN_FOOTBALL.png);">
                    <div class="S-main-joueurInfoNM-PostesP">
                    </div>
                    <div class="S-main-joueurInfoNM-PostesP">
                        <div>
                            <input type="checkbox" name="Postes[]" value="AG" title="Attaques au Gauche" form="fromInput" <?php if(!empty($vJoueur['iD_joueurs'])){cocherPostes($vJoueur['iD_joueurs'],'AG');} ?>>
                        </div>
                        <div>
                            <input type="checkbox" name="Postes[]" value="BT" title="Attaques du Lance" form="fromInput" <?php if(!empty($vJoueur['iD_joueurs'])){cocherPostes($vJoueur['iD_joueurs'],'BT');} ?>>
                        </div>
                        <div>
                            <input type="checkbox" name="Postes[]" value="AD" title="Attaques au Droit" form="fromInput" <?php if(!empty($vJoueur['iD_joueurs'])){cocherPostes($vJoueur['iD_joueurs'],'AD');} ?>>
                        </div>
                    </div>
                    <div class="S-main-joueurInfoNM-PostesP">
                    </div>
                    <div class="S-main-joueurInfoNM-PostesP">
                    </div>
                    <div class="S-main-joueurInfoNM-PostesP">
                        <div>
                            <input type="checkbox" name="Postes[]" value="MG" title="Milieu au Gauche" form="fromInput" <?php if(!empty($vJoueur['iD_joueurs'])){cocherPostes($vJoueur['iD_joueurs'],'MG');} ?>>
                        </div>
                        <div></div><div></div>
                        <div>
                            <input type="checkbox" name="Postes[]" value="MOC" title="Milieu au Coeur de terrain" form="fromInput" <?php if(!empty($vJoueur['iD_joueurs'])){cocherPostes($vJoueur['iD_joueurs'],'MOC');} ?>>
                        </div>
                        <div>
                            <input type="checkbox" name="Postes[]" value="MC" title="Milieu de Coeur" form="fromInput" <?php if(!empty($vJoueur['iD_joueurs'])){cocherPostes($vJoueur['iD_joueurs'],'MC');} ?>>
                        </div>
                        <div>
                            <input type="checkbox" name="Postes[]" value="MD" title="Milieu au Droit" form="fromInput" <?php if(!empty($vJoueur['iD_joueurs'])){cocherPostes($vJoueur['iD_joueurs'],'MD');} ?>>
                        </div>
                    </div>
                    <div class="S-main-joueurInfoNM-PostesP">
                    </div>
                    <div class="S-main-joueurInfoNM-PostesP">
                    </div>
                    <div class="S-main-joueurInfoNM-PostesP">
                        <div>
                            <input type="checkbox" name="Postes[]" value="DG" title="Defenses  au Gauche" form="fromInput" <?php if(!empty($vJoueur['iD_joueurs'])){cocherPostes($vJoueur['iD_joueurs'],'DG');} ?>>
                        </div>
                        <div>
                            <input type="checkbox" name="Postes[]" value="DC" title="Defenses  de Coeur" form="fromInput" <?php if(!empty($vJoueur['iD_joueurs'])){cocherPostes($vJoueur['iD_joueurs'],'DC');} ?>>
                        </div>
                        <div>
                            <input type="checkbox" name="Postes[]" value="DD" title="Defenses  au Droit" form="fromInput" <?php if(!empty($vJoueur['iD_joueurs'])){cocherPostes($vJoueur['iD_joueurs'],'DD');} ?>>
                        </div>
                    </div>
                    <div class="S-main-joueurInfoNM-PostesP">
                    </div>
                    <div class="S-main-joueurInfoNM-PostesP">
                        <div>
                            <input type="checkbox" name="Postes[]" value="G" title="Gardien" form="fromInput" <?php if(!empty($vJoueur['iD_joueurs'])){cocherPostes($vJoueur['iD_joueurs'],'G');} ?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="S-main-dicor"></div>
            <div class="S-main-joueurInfoNM-BtnValider">
                <button name="BtnValiderJoueurInfoNM" value="ClickBtnValiderJoueurInfoNM" type="submit" form="fromInput" formmethod="POST">
                    Valider
                </button>
                <p><?php if(!empty($MysqlMsgErr)){ echo '*'.$MysqlMsgErr;} ?></p>
            </div>
        </div>
        <?php 
            if(($_SERVER['REQUEST_URI']=='/Notre_equipe/Nouveau_Joueur/') && (!empty($_POST['BtnNouveauJoueur'])) && ($_POST['BtnNouveauJoueur'] == 'CkilckBtnNouveauJoueur')){
                echo '<input type="text" name="BtnNouveauJoueur" value="CkilckBtnNouveauJoueur" form="fromInputUplode" hidden>' ;  
                echo '<input type="text" name="BtnNouveauJoueur" value="CkilckBtnNouveauJoueur" form="fromInput" hidden>' ;
            }
            if(!empty($_POST['Val_file_new_name'])){
                echo '<input type="text" name="Val_file_new_name" value="'.$_POST['Val_file_new_name'].'" form="fromInputUplode" hidden>' ;  
                echo '<input type="text" name="Val_file_new_name" value="'.$_POST['Val_file_new_name'].'" form="fromInput" hidden>' ;
            }
        ?>
    <form action="<?php echo $_SERVER['REQUEST_URI'];?>" id="fromInputUplode" method="POST" enctype="multipart/form-data" autocomplete="off"></form> 
    <form class="S-main-form-joueurInfoNM" action="<?php echo $_SERVER['HTTP_REFERER']; ?>" method="POST" id="fromInputR"  autocomplete="off" ></form> 
</main>