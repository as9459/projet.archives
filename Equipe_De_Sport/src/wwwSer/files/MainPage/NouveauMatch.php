<main>
    <form class="S-main-form-NouveauMatch" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" id="fromInput"  autocomplete="off" ></form>
        <div class="Style-main">
            <div class="S-main-head">
            <div class="S-main-head-BtnRetourne">
                <button name="BtnRetourne" value="ClickBtnBtnRetourne" formaction="<?php echo $_SERVER['REQUEST_URI']; ?>" form="fromInputR">
                    Retourne
                </button>
            </div>
            </div>
            <div class="S-main-dicor"></div>
            <div class="S-main-NomsVsEquipes">
                <p>CSC DeCayenne</p>
                <p><strong> VS </strong></p>
                <input name="VsEquipes" value="<?php if(!empty($_POST['VsEquipes'])){echo $_POST['VsEquipes'];}?>" type="text" placeholder=" L'équipe adverse..." form="fromInput">
                <p style="color:red;"><?php if( !empty($MsgErVsEquipes)){echo $MsgErVsEquipes;} ?></p>
            </div>
            <div class="S-main-dicor"></div>
            <div class="S-main-detailsMatch">
                <div class="S-main-detailsMatch-InputRow">
                    <div class="S-main-detailsMatch-InputLabel">
                        <label <?php if(!empty($MsgErDate)){echo 'style="color:red;"';} ?> for=""><?php if( !empty($MsgErDate)){echo $MsgErDate;} ?>Date :</label>
                    </div>
                    <div class="S-main-detailsMatch-InputChamp">
                        <input name="date" value="<?php if(!empty($_POST['date'])){echo $_POST['date'];}?>" type="date" form="fromInput">
                    </div>
                </div>
                <div class="S-main-detailsMatch-InputRow">
                    <div class="S-main-detailsMatch-InputLabel">
                        <label <?php if( !empty($MsgErheure)){echo 'style="color:red;"';} ?> for=""><?php if( !empty($MsgErheure)){echo $MsgErheure;} ?>L'heure :</label>
                    </div>
                    <div class="S-main-detailsMatch-InputChamp">
                        <input name="heure" value="<?php if(!empty($_POST['heure'])){echo $_POST['heure'];}?>" type="time" form="fromInput">
                    </div>
                </div>
                <div class="S-main-detailsMatch-InputRow">
                    <div class="S-main-detailsMatch-InputLabel">
                        <label for="">Le lieu de rencontre :</label>
                    </div>
                    <div class="S-main-detailsMatch-InputChamp">
                        <select name="leux" form="fromInput">
                            <option <?php if(!empty($_POST['leux']) && $_POST['leux'] == 1){echo 'selected';}?> value="1">Domicile</option>
                            <option <?php if(!empty($_POST['leux']) && $_POST['leux'] == 2){echo 'selected';}?> value="2">Extérieur</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="S-main-dicor"></div>
            <div class="S-main-choixNotreEquipeAMatch">
                <table>
                    <caption>Tableau du Matchs</caption>
                    <tr>
                        <th id="N_ht">N</th>
                        <th id="Titulaire_ht" <?php if(!empty($MsgErTitul)){echo 'style="color:red;"';} ?> ><?php if(!empty($MsgErTitul)){echo $MsgErTitul;} ?>Titulaire  <?php if(!empty($_POST) && !empty($MsgErTitul) && !empty($_POST['Titulaire'])){echo count($_POST['Titulaire']).'/';} ?>11</th>
                        <th id="Remplacant_ht">Remplaçant  12</th>
                        <th id="Poste_ht" <?php if(!empty($MsgErPoste)){echo 'style="color:red;"';} ?>><?php if(!empty($_POST) && !empty($MsgErPoste)){echo $MsgErPoste;} ?>Poste</th>
                        <th id="Photo_ht">Photo</th>
                        <th id="Taille_ht">Taille</th>
                        <th id="Poids_ht">Poids</th>
                        <th id="Evaluations_ht">évaluations</th>
                    </tr>
                    <?php
                        creeligneTableau_de_main_Matchs();
                    ?>
                </table>
            </div>
            <div class="S-main-dicor"></div>
            <div class="S-main-BtnNouveauMatch">
                <div class="S-main-BtnNouveauMatch-valide">
                    <button name="BtnValideNouveauMatch" value="ClickBtnValideNouveauMatch" type="submit" form="fromInput">
                        valide
                    </button>
                </div>
                <div class="S-main-BtnNouveauMatch-supprimer">
                    <?php
                    if(($_SERVER['REQUEST_URI']!='/Matchs/Nouveau_Matche/')){
                        echo '
                    <button name="BtnSupprimerNouveauMatch" value="ClickBtnSupprimerNouveauMatch" type="submit" form="fromInput">
                        supprimer le match 
                    </button>';
                    }
                    ?>
                </div>
            </div>
        </div>
    <form class="S-main-form-MettezResultat" action="<?php echo $_SERVER['HTTP_REFERER']; ?>" method="POST" id="fromInputR"  autocomplete="off" ></form>
</main>