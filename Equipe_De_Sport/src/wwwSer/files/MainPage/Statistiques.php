<style>
        .S-main-statMatchs100-barPerte {
            width: calc(10px + <?php if(!empty($vNbMatchPerte100)){echo $vNbMatchPerte100;}else{echo 0;} ?>%);
            
        }

        .S-main-statMatchs100-barEgalite {
            width: calc(10px + <?php if(!empty($vNbMatchEgalite100)){echo $vNbMatchEgalite100;}else{echo 0;} ?>%);
        }

        .S-main-statMatchs100-barVictoire {
            width: calc(10px + <?php if(!empty($vNbMatchVictoire100)){echo $vNbMatchVictoire100;}else{echo 0;} ?>%);
        }
        
        
        .S-main-statMatchs100-nomPerte {
            width: calc(50px + <?php if(!empty($vNbMatchPerte100)){echo $vNbMatchPerte100;}else{echo 0;} ?>%);
            
        }

        .S-main-statMatchs100-nomEgalite {
            width: calc(50px + <?php if(!empty($vNbMatchEgalite100)){echo $vNbMatchEgalite100;}else{echo 0;} ?>%);
        }

        .S-main-statMatchs100-nomVictoire {
            width: calc(50px + <?php if(!empty($vNbMatchVictoire100)){echo $vNbMatchVictoire100;}else{echo 0;} ?>%);
        }
</style>
<main>
    <form action="" method="GET" id="form-Statistiques"  autocomplete="off" ></form>
    <div class="Style-main">
        <div class="S-main-dicor"></div>
        <div class="S-main-tital-StatMatchsNoterEquipe">
            <h2>Statistiques de matchs du noter équipe</h2>
        </div>
        <div class="S-main-StatMatchsNoterEquipe">
            <div class="S-main-StatMatchsNoterEquipe-goals">
                <div class="S-m-StatMatchsNE-goals-Bloc">
                    <div class="S-m-StatMatchsNE-goals-Bloc-img">
                        <img src="https://img.icons8.com/external-flatart-icons-flat-flatarticons/512/external-football-brazilian-carnival-flatart-icons-flat-flatarticons.png"
                            alt="goals">
                    </div>
                    <div class="S-m-StatMatchsNE-goals-Bloc-nb">
                        <p><?php if(!empty($vTirs)){echo $vTirs;}else{echo 0;} ?></p>
                    </div>
                </div>
                <div class="S-m-StatMatchsNE-goals-nom">
                    <p>goals</p>
                </div>
            </div>
            <div class="S-main-StatEtatMatchsNoterEquipe">
                <div class="S-main-StatEtatMatchsNoterEquipeRow1" >
                    <div class="S-main-StatMatchsNoterEquipe-victoire">
                        <div class="S-m-StatMatchsNE-victoire-Bloc">
                            <div class="S-m-StatMatchsNE-victoire-Bloc-img">
                                <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/512/external-cup-football-soccer-flaticons-lineal-color-flat-icons-2.png"
                                    alt="victoire">
                            </div>
                            <div class="S-m-StatMatchsNE-victoire-Bloc-nb">
                                <p><?php if(!empty($vNbMatchVictoire)){echo $vNbMatchVictoire;}else{echo 0;} ?></p>
                            </div>
                        </div>
                        <div class="S-m-StatMatchsNE-victoire-nom">
                            <p>victoire</p>
                        </div>
                    </div>
                    <div class="S-main-StatMatchsNoterEquipe-egalite">
                        <div class="S-m-StatMatchsNE-egalite-Bloc">
                            <div class="S-m-StatMatchsNE-egalite-Bloc-img">
                                <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/512/external-hand-shake-football-soccer-flaticons-lineal-color-flat-icons.png"
                                    alt="egalite">
                            </div>
                            <div class="S-m-StatMatchsNE-egalite-Bloc-nb">
                                <p><?php if(!empty($vNbMatchEgalite)){echo $vNbMatchEgalite;}else{echo 0;} ?></p>
                            </div>
                        </div>
                        <div class="S-m-StatMatchsNE-egalite-nom">
                            <p>egalite</p>
                        </div>
                    </div>
                    <div class="S-main-StatMatchsNoterEquipe-perte">
                        <div class="S-m-StatMatchsNE-perte-Bloc">
                            <div class="S-m-StatMatchsNE-perte-Bloc-img">
                                <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/512/external-header-football-soccer-flaticons-lineal-color-flat-icons-2.png"
                                    alt="perte">
                            </div>
                            <div class="S-m-StatMatchsNE-perte-Bloc-nb">
                                <p><?php if(!empty($vNbMatchPerte)){echo $vNbMatchPerte;}else{echo 0;} ?></p>
                            </div>
                        </div>
                        <div class="S-m-StatMatchsNE-perte-nom">
                            <p>perte</p>
                        </div>
                    </div>
                </div>
                <div class="S-main-statMatchs100">
                    <div class="S-main-head-statMatchs-bar">
                        <div class="S-main-statMatchs100-barVictoire"></div>
                        <div class="S-main-statMatchs100-barEgalite"></div>
                        <div class="S-main-statMatchs100-barPerte"></div>
                    </div>
                    <div class="S-main-statMatchs100-nom">
                        <div class="S-main-statMatchs100-nomVictoire">
                            <p>victoire <?php if(!empty($vNbMatchVictoire100)){echo $vNbMatchVictoire100;}else{echo 0;} ?>%</p>
                        </div>
                        <div class="S-main-statMatchs100-nomEgalite">
                            <p>égalité <?php if(!empty($vNbMatchEgalite100)){echo $vNbMatchEgalite100;}else{echo 0;} ?>%</p>
                        </div>
                        <div class="S-main-statMatchs100-nomPerte">
                            <p>perte <?php if(!empty($vNbMatchPerte100)){echo $vNbMatchPerte100;}else{echo 0;} ?>%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="S-main-StatMatchsNoterEquipe-CarteRouge">
                <div class="S-m-StatMatchsNE-CarteRouge-img"></div>
                <div class="S-m-StatMatchsNE-CarteRouge-nb">
                    <p><?php if(!empty($vCRouge)){echo $vCRouge;}else{echo 0;} ?></p>
                </div>
            </div>
            <div class="S-main-StatMatchsNoterEquipe-Cartejoune">
                <div class="S-m-StatMatchsNE-Cartejoune-img"></div>
                <div class="S-m-StatMatchsNE-Cartejoune-nb">
                    <p><?php if(!empty($vCJaune)){echo $vCJaune;}else{echo 0;} ?></p>
                </div>
            </div>
        </div>
        <div class="S-main-dicor"></div>
        <div class="S-main-tital-StatNoterEquipe">
            <h2>Statistiques du noter équipe</h2>
        </div>
        <div class="S-main-StatNoterEquipe">
            <div class="S-main-StatNoterEquipe-Membres">
                <div class="S-m-StatNoterEquipe-Membres-Bloc">
                    <div class="S-m-StatNoterEquipe-Membres-img">
                        <button id="BtnMembres" type="submit" name="filter_membres_equipe" value="Tout" form="form-Statistiques">
                            <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/512/external-football-team-football-soccer-flaticons-lineal-color-flat-icons.png"
                                alt="number Membres dans l'quipe">
                        </button>
                    </div>
                    <div class="S-m-StatNoterEquipe-Membres-Bloc-nb">
                        <label for="BtnMembres"><?php if(!empty($nbMembres[0])){echo $nbMembres[0];}else{echo 0;} ?></label>
                    </div>
                </div>
                <div class="S-m-StatNoterEquipe-Membres-nom">
                    <p>Membres</p>
                </div>
            </div>
            <div class="S-main-StatNoterEquipe-Actif">
                <div class="S-m-StatNoterEquipe-Actif-Bloc">
                    <div class="S-m-StatNoterEquipe-Actif-Bloc-img">
                        <button id="BtnActif" type="submit"name="filter_membres_equipe" value="Actif" form="form-Statistiques">
                            <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/512/external-player-football-soccer-flaticons-lineal-color-flat-icons.png"
                                alt="number Membres qui sont Actif">
                        </button>
                    </div>
                    <div class="S-m-StatNoterEquipe-Actif-Bloc-nb">
                        <label for="BtnActif"><?php if(!empty($nbActif[0])){echo $nbActif[0];}else{echo 0;} ?></label>
                    </div>
                </div>
                <div class="S-m-StatNoterEquipe-Actif-nom">
                    <p>Actif</p>
                </div>
            </div>
            <div class="S-main-StatNoterEquipe-Blesse">
                <div class="S-m-StatNoterEquipe-Blesse-Bloc">
                    <div class="S-m-StatNoterEquipe-Blesse-Bloc-img">
                        <button id="BtnBlesse" type="submit" name="filter_membres_equipe" value="Blesse" form="form-Statistiques">
                            <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/512/external-medical-kit-football-soccer-flaticons-lineal-color-flat-icons.png"
                                alt="number Membres qui sont Blesse">
                        </button>
                    </div>
                    <div class="S-m-StatNoterEquipe-Blesse-Bloc-nb">
                        <label for="BtnBlesse"><?php if(!empty($nbBlesse[0])){echo $nbBlesse[0];}else{echo 0;} ?></label>
                    </div>
                </div>
                <div class="S-m-StatNoterEquipe-Blesse-nom">
                    <p>Blessé</p>
                </div>
        
            </div>
            <div class="S-main-StatNoterEquipe-Absent">
                <div class="S-m-StatNoterEquipe-Absent-Bloc">
                    <div class="S-m-StatNoterEquipe-Absent-Bloc-img">
                        <button id="BtnAbsent" type="submit" name="filter_membres_equipe" value="Absent" form="form-Statistiques">
                            <img src="https://img.icons8.com/color/512/who.png " alt="number Membres qui sont Absent">
                        </button>
                    </div>
                    <div class="S-m-StatNoterEquipe-Absent-Bloc-nb">
                        <label for="BtnAbsent"><?php if(!empty($nbAbsent[0])){echo $nbAbsent[0];}else{echo 0;} ?></label>
                    </div>
                </div>
                <div class="S-m-StatNoterEquipe-Absent-nom">
                    <p>Absent</p>
                </div>
            </div>
            <div class="S-main-StatNoterEquipe-Suspendu">
                <div class="S-m-StatNoterEquipe-Suspendu-Bloc">
                    <div class="S-m-StatNoterEquipe-Suspendu-Bloc-img">
                        <button id="BtnSuspendu" type="submit" name="filter_membres_equipe" value="Suspendu" form="form-Statistiques">
                            <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/512/external-foul-football-soccer-flaticons-lineal-color-flat-icons.png"
                                alt="number Membres qui ont Suspendu">
                        </button>
                    </div>
                    <div class="S-m-StatNoterEquipe-Suspendu-Bloc-nb">
                        <label for="BtnSuspendu"><?php if(!empty($nbSuspendu[0])){echo $nbSuspendu[0];}else{echo 0;} ?></label>
                    </div>
                </div>
                <div class="S-m-StatNoterEquipe-Suspendu-nom">
                    <p>Suspendu</p>
                </div>
            </div>
        </div>
        <div class="S-main-dicor"></div>
        <div class="S-main-TableStatMembresNotreEquipe">
            <table>
                <caption>Tableau du Membres Notre Equipe</caption>
                <tbody>
                    <tr>
                        <th id="N_ht">N</th>
                        <th id="Photo_ht">Photo</th>
                        <th id="Nom_ht">Nom</th>
                        <th id="Etat_ht">État</th>
                        <th id="Poste_prefere_ht">Poste préféré</th>
                        <th id="Titulaire_ht">Titulaire</th>
                        <th id="Remplacer_ht">Remplacer</th>
                        <th id="Carte_Rouge_ht">Carte rouge</th>
                        <th id="Carte_Joune_ht">Carte joune</th>
                        <th id="Matchs_gagnes_ht">Matchs gagnés</th>
                        <th id="Evaluations_ht">évaluations</th>
                    </tr>
                    <?php 
                        creeligneTableau_de_main_Statistiques($res);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>