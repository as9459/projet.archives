<style>
    .S-main-head-statMatchs-barPerte{
        width: calc(10px + <?php if(!empty($vNbMatchPerte)){echo $vNbMatchPerte;}else{echo 0;} ?>%);
    }
    .S-main-head-statMatchs-nomPerte{
        width: calc(10px + <?php if(!empty($vNbMatchPerte)){echo $vNbMatchPerte;}else{echo 0;} ?>%);
    }
    
    .S-main-head-statMatchs-barVictoire{
        width: calc(10px + <?php if(!empty($vNbMatchVictoire)){echo $vNbMatchVictoire;}else{echo 0;} ?>%);
    }
    .S-main-head-statMatchs-nomVictoire{
        width: calc(10px + <?php if(!empty($vNbMatchVictoire)){echo $vNbMatchPerte;}else{echo 0;} ?>%);
    }
    
    .S-main-head-statMatchs-barEgalite{
        width: calc(10px + <?php if(!empty($vNbMatchEgalite)){echo $vNbMatchEgalite;}else{echo 0;} ?>%);
    }
    .S-main-head-statMatchs-nomEgalite{
        width: calc(10px + <?php if(!empty($vNbMatchEgalite)){echo $vNbMatchEgalite;}else{echo 0;} ?>%);
    }
</style>
<main>
    <form class="S-main-form-joueurInfoNM" action="<?php echo $_SERVER['REQUEST_URI'].'/'; ?>" method="POST" id="fromInput"  autocomplete="off" ></form>
        <div class="Style-main">
            <div class="S-main-head">
                <div class="S-main-head-statMatchs">
                    <div class="S-main-head-statMatchs-bar">
                        <div class="S-main-head-statMatchs-barPerte"></div>
                        <div class="S-main-head-statMatchs-barEgalite"></div>
                        <div class="S-main-head-statMatchs-barVictoire"></div>
                    </div>
                    <div class="S-main-head-statMatchs-nom">
                        <div class="S-main-head-statMatchs-nomPerte"><p>perte</p></div>
                        <div class="S-main-head-statMatchs-nomEgalite"><p>égalité</p></div>
                        <div class="S-main-head-statMatchs-nomVictoire"><p>victoire</p></div>
                    </div>
                </div>
                <div class="S-main-head-BtnNouveau">
                    <button name="BtnNouveauMatch" value="CkilckBtnNouveauMatch" type="submit" formaction="Nouveau_Matche/" formmethod="POST" form="fromInput">
                        Nouveau match
                    </button>
                </div>
            </div>
            <div class="S-main-dicor"></div>
            <div class="S-main-TableauMatchs">
                <table>
                    <caption>Tableau du Matchs</caption>
                    <tr>
                         <th id="N_ht">N</th>
                         <th id="etat_ht">état</th>
                         <th id="Score_ht">Score</th>
                         <th id="Contre_ht">Contre</th>
                         <th id="DateETheure_ht">Date / l'heure</th>
                         <th id="T_ht">T / 11</th>
                         <th id="R_ht">R / 12</th>
                         <th id="action_ht">action</th>
                    </tr>
                    <?php
                        creeligneTableau_de_main_LesMatchs();
                    ?>
                </table>
            </div>
        </div>
</main>