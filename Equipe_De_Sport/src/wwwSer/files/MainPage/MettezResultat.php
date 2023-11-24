<main>
    <form class="S-main-form-MettezResultat" action="" method="POST" id="fromInput"  autocomplete="off" ></form>
        <div class="Style-main">
            <div class="S-main-head">
                <div class="S-main-head-BtnRetourne">
                    <button name="BtnRetourne" value="ClickBtnBtnRetourne" formaction="<?php urlRetourne('3');?>" form="fromInputR">
                        Retourne
                    </button>
                </div> 
                <div class="S-main-head-DateLheureMatch">
                    <div>
                        <p>le <?php if(!empty($vDateP)){echo date("d/m/Y", strtotime($vDateP)); }?> , a <?php if(!empty($vMatch['heureMatch'])){echo date("H:i", strtotime($vMatch['heureMatch'])); }?></p>
                    </div> 
                </div>
            </div>
            <div class="S-main-dicor"></div>
            <div class="S-main-MettezResultat-NomsVsEquipes">
                <p>CSC DeCayenne</p>
                <p><strong> VS </strong></p>
                <p><?php if(!empty($vMatchP)){echo $vMatchP; }?></p>
            </div>
            <div class="S-main-dicor"></div>
            <div class="S-main-RsultatMatch">
                <div>
                    <div>
                        <p>Score :</p>
                    </div>
                </div>
                <div>
                    <div class="S-main-MettezResultat-InputChamp">
                        <input name="NosScore" value="<?php if(!empty($_POST['NosScore'])){echo $_POST['NosScore'];}?>" type="number"  placeholder="0" required form="fromInput">
                    </div>
                </div>
                <div>
                    <div>
                        <p><strong> - </strong></p>
                    </div>
                </div>
                <div>
                    <div class="S-main-MettezResultat-InputChamp">
                        <input name="VsEquipesScore" value="<?php if(!empty($_POST['VsEquipesScore'])){echo $_POST['VsEquipesScore'];}?>" type="number"  placeholder="0" required form="fromInput">
                    </div>
                </div>
                <div>
                    <p></p>
                </div>
            </div>
            <div class="S-main-dicor"></div>
            <div class="S-main-joueurAMatch">
                <table>
                    <caption>Tableau du joueur du Match</caption>
                    <tr>
                        <th id="N_ht">N</th>
                        <th id="Photo_ht">Photo</th>
                        <th id="NomPrenom_ht">Nom Prenom</th>
                        <th id="CarteR_ht">Carte Rouge</th>
                        <th id="CarteJ_ht">Carte Jaune</th>
                        <th id="Tirs_ht">Tirs var le Cadres</th>
                        <th id="Poids_ht">Poids</th>
                        <th id="Evaluations_ht">*évaluations</th>
                    </tr>
                    <?php
                    creeligneTableau_de_main_MettezResultat($resParticiper,$linkpdo);
                    ?>
                </table>
            </div>
            <div class="S-main-dicor"></div>
            <div class="S-main-BtnRsultatMatch">
                <div class="S-main-BtnRsultatMatch-valide">
                    <button name="BtnValideRsultatMatch" value="ClickBtnValideRsultatMatch" type="submit" form="fromInput" formmethod="POST">
                        valide
                    </button>
                </div>
            </div>
        </div>
    <form class="S-main-form-MettezResultat" action="<?php echo $_SERVER['HTTP_REFERER']; ?>" method="POST" id="fromInputR"  autocomplete="off" ></form>
</main>