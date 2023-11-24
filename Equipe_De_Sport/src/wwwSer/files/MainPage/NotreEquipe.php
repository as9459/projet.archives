<main>
    <form action="<?php $_SERVER['REQUEST_URI'].'/'; ?>" method="POST" id="form-noterEquipe"  autocomplete="off" ></form>
        <div class="Style-main">
            <div class="S-main-head">
                <div class="S-main-head-BtnNouveau">
                    <button name="BtnNouveauJoueur" value="CkilckBtnNouveauJoueur" type="submit" form="form-noterEquipe" formaction="Nouveau_Joueur/" formmethod="POST">
                        Nouveau joueur
                    </button>
                </div>
            </div>
            <div class="S-main-dicor"></div>
            <div class="S-main-NoterEquipe-Statistiques">
                <div class="S-main-NoterEquipe-Statistiques-Membres">
                    <div class="S-m-NoterEquipe-Membres-Bloc">
                        <div class="S-m-NoterEquipe-Membres-img">
                            <button id="BtnMembres" type="submit" formmethod="GET" name="filter_membres_equipe" value="Tout"  form="form-noterEquipe">
                                <img src="<?php echo $linkeImgWeb['Membres']; ?>" alt="number Membres dans l'quipe">
                            </button>
                        </div>
                        <div class="S-m-NoterEquipe-Membres-Bloc-nb">
                            <label for="BtnMembres"><?php if((!empty($nbMembres))){ echo $nbMembres[0];} ?></label>
                        </div>
                    </div>
                    <div class="S-m-NoterEquipe-Membres-nom">
                        <p>Membres</p>
                    </div>
                </div>
                <div class="S-main-NoterEquipe-Statistiques-Actif">
                    <div class="S-m-NoterEquipe-Actif-Bloc">
                        <div class="S-m-NoterEquipe-Actif-Bloc-img">
                            <button id="BtnActif" type="submit" formmethod="GET" name="filter_membres_equipe" value="Actif" form="form-noterEquipe">
                                <img src="<?php echo $linkeImgWeb['Actif']; ?>" alt="number Membres qui sont Actif">
                            </button>
                        </div>
                        <div class="S-m-NoterEquipe-Actif-Bloc-nb">
                            <label for="BtnActif"><?php if((!empty($nbActif))){ echo $nbActif[0];} ?></label>
                        </div>
                    </div>
                    <div class="S-m-NoterEquipe-Actif-nom">
                        <p>Actif</p>
                    </div>
                </div>
                <div class="S-main-NoterEquipe-Statistiques-Blesse">
                    <div class="S-m-NoterEquipe-Blesse-Bloc">
                        <div class="S-m-NoterEquipe-Blesse-Bloc-img">
                            <button id="BtnBlesse" type="submit" formmethod="GET" name="filter_membres_equipe" value="Blesse" form="form-noterEquipe">
                                <img src="<?php echo $linkeImgWeb['Blesse']; ?>" alt="number Membres qui sont Blesse">
                            </button>
                        </div>
                        <div class="S-m-NoterEquipe-Blesse-Bloc-nb">
                            <label for="BtnBlesse"><?php if((!empty($nbBlesse))){ echo $nbBlesse[0];} ?></label>
                        </div>
                    </div>
                    <div class="S-m-NoterEquipe-Blesse-nom">
                        <p>Blessé</p>
                    </div>
                    
                </div>
                <div class="S-main-NoterEquipe-Statistiques-Absent">
                    <div class="S-m-NoterEquipe-Absent-Bloc">
                        <div class="S-m-NoterEquipe-Absent-Bloc-img">
                            <button id="BtnAbsent" type="submit" formmethod="GET" name="filter_membres_equipe" value="Absent" form="form-noterEquipe">
                                <img src="<?php echo $linkeImgWeb['Absent']; ?> " alt="number Membres qui sont Absent">
                            </button>
                        </div>
                        <div class="S-m-NoterEquipe-Absent-Bloc-nb">
                            <label for="BtnAbsent"><?php if((!empty($nbAbsent))){ echo $nbAbsent[0];} ?></label>
                        </div>
                    </div>
                    <div class="S-m-NoterEquipe-Absent-nom">
                        <p>Absent</p>
                    </div>
                    
                </div>
                <div class="S-main-NoterEquipe-Statistiques-Suspendu">
                    <div class="S-m-NoterEquipe-Suspendu-Bloc">
                        <div class="S-m-NoterEquipe-Suspendu-Bloc-img" >
                            <button id="BtnSuspendu" type="submit" formmethod="GET" name="filter_membres_equipe" value="Suspendu" form="form-noterEquipe">
                                <img src="<?php echo $linkeImgWeb['Suspendu']; ?>" alt="number Membres qui ont Suspendu">
                            </button>
                        </div>
                        <div class="S-m-NoterEquipe-Suspendu-Bloc-nb">
                            <label for="BtnSuspendu"><?php if((!empty($nbSuspendu))){ echo $nbSuspendu[0];} ?></label>
                        </div>
                    </div>
                    <div class="S-m-NoterEquipe-Suspendu-nom">
                        <p>Suspendu</p>
                    </div>
                </div>
            </div>
            <div class="S-main-dicor"></div>
            <div class="S-main-MembresNotreEquipe">
                <table>
                    <caption>Tableau du Membres Notre Equipe</caption>
                    <tr>
                        <th id="N_ht">N</th>
                        <th id="Photo_ht">Photo</th>
                        <th id="Nom_ht">Nom</th>
                        <th id="Prenom_ht">Prenom</th>
                        <th id="Poste_ht">Poste</th>
                        <th id="Taille_ht">Taille</th>
                        <th id="Poids_ht">Poids</th>
                        <th id="Evaluations_ht">évaluations</th>
                        <th id="Commentaires_ht">commentaires</th>
                        <th id="Action_ht">action</th>
                    </tr>
                    <?php 
                        creeligneTableau_de_main_MembresNotreEquipe($res,$linkpdo);
                    ?>
                </table>
            </div>
        </div>
</main>