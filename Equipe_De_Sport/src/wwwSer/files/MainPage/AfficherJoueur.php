<main>
    <form class="S-main-from-joueurSection" id="from-joueurSection" action="<?php echo $_SERVER['REQUEST_URI'].'/'; ?>" method="post"></form>
        <div class="Style-main">
            <div class="S-main-head">
                <div class="S-main-head-BtnRetourne">
                    <button type="submit" form="from-joueurSection" formaction="<?php urlRetourne('0'); ?>" >
                        Retourne
                    </button>
                </div>
                <div class="S-main-head-NomJoueur">
                    <h2>
                        <?php echo $vJoueur['nom'].' '.$vJoueur['prenom']; ?>
                    </h2>
                </div>
                <div class="S-main-head-BtnNouveau">
                    <?php AfficherButtonModifierProfil(); ?>
                </div>
            </div>
            <div class="S-main-dicor"></div>
            <div class="S-main-joueurInfo" >
                <div class="S-main-joueurInfo">
                    <div class="S-main-joueurInfo-joueurImg">
                        <img src="./wwwSerImg/<?php echo $vJoueurImg.'.png'; ?>" alt="" loading="lazy" referrerpolicy="no-referrer">
                    </div>
                    <div class="S-main-joueurInfo-Bloc">
                        <div class="S-main-joueurInfo-BlocRow">
                            <div class="S-main-joueurInfo-BlocLabel">
                                <p>Licence : </p>
                            </div>
                            <div class="S-main-joueurInfo-Blocinfo">
                                <p><?php echo $vJoueur['numeroLicence']; ?></p>
                            </div>
                        </div>
                        
                        <div class="S-main-joueurInfo-BlocRow">
                            <div class="S-main-joueurInfo-BlocLabel">
                                <p>Date de Naissance : </p>
                            </div>
                            <div class="S-main-joueurInfo-Blocinfo">
                                <p><?php echo date("d/m/Y", strtotime($vJoueur['dateNaissance'])); ?></p>
                            </div>
                        </div>

                        <div class="S-main-joueurInfo-BlocRow">
                            <div class="S-main-joueurInfo-BlocLabel">
                                <p>Hauteur : </p>
                            </div>
                            <div class="S-main-joueurInfo-Blocinfo">
                                <p><?php echo $vJoueur['taille']; ?></p>
                            </div>
                        </div>
                        
                        <div class="S-main-joueurInfo-BlocRow">
                            <div class="S-main-joueurInfo-BlocLabel">
                                <p>Poids : </p>
                            </div>
                            <div class="S-main-joueurInfo-Blocinfo">
                                <p><?php echo $vJoueur['poids']; ?></p>
                            </div>
                        </div>

                        <div class="S-main-joueurInfo-BlocRow">
                            <div class="S-main-joueurInfo-BlocLabel">
                                <p>etat : </p>
                            </div>
                            <div class="S-main-joueurInfo-Blocinfo">
                                <p><?php echo $vJoueurStatut[0]; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="S-main-joueurInfo-Postes" style="background-image: url(./wwwSerImg/TERRAIN_FOOTBALL.png);">
                        <div class="S-main-joueurInfo-PostesP">
                        </div>
                        <div class="S-main-joueurInfo-PostesP">
                            <div>
                                <input type="checkbox" name="AG" title="Attaques au Gauche" <?php cocherPostes($vJoueur['iD_joueurs'],'AG');?> disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="BT" title="Attaques du Lance" <?php cocherPostes($vJoueur['iD_joueurs'],'BT');?> disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="AD" title="Attaques au Droit" <?php cocherPostes($vJoueur['iD_joueurs'],'AD');?>  disabled>
                            </div>
                        </div>
                        <div class="S-main-joueurInfo-PostesP">
                        </div>
                        <div class="S-main-joueurInfo-PostesP">
                        </div>
                        <div class="S-main-joueurInfo-PostesP">
                            <div>
                                <input type="checkbox" name="MG" title="Milieu au Gauche" <?php cocherPostes($vJoueur['iD_joueurs'],'MG');?> disabled >
                            </div>
                            <div></div><div></div>
                            <div>
                                <input type="checkbox" name="MOC" title="Milieu au Coeur de terrain" <?php cocherPostes($vJoueur['iD_joueurs'],'MOC');?> disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="MC" title="Milieu de Coeur" <?php cocherPostes($vJoueur['iD_joueurs'],'MC');?> disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="MD" title="Milieu au Droit" <?php cocherPostes($vJoueur['iD_joueurs'],'MD');?> disabled >
                            </div>
                        </div>
                        <div class="S-main-joueurInfo-PostesP">
                        </div>
                        <div class="S-main-joueurInfo-PostesP">
                        </div>
                        <div class="S-main-joueurInfo-PostesP">
                            <div>
                                <input type="checkbox" name="DG" title="Defenses  au Gauche" <?php cocherPostes($vJoueur['iD_joueurs'],'DG');?> disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="DC" title="Defenses  de Coeur" <?php cocherPostes($vJoueur['iD_joueurs'],'DC');?> disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="DD" title="Defenses  au Droit" <?php cocherPostes($vJoueur['iD_joueurs'],'DD');?> disabled >
                            </div>
                        </div>
                        <div class="S-main-joueurInfo-PostesP">
                        </div>
                        <div class="S-main-joueurInfo-PostesP">
                            <div>
                                <input type="checkbox" name="G" title="Gardien" <?php cocherPostes($vJoueur['iD_joueurs'],'G');?> disabled >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="S-main-dicor"></div>
            <div class="S-main-joueurStatistiques">
                <div class="S-main-joueurStatistiques-Moyen">
                    <div class="S-m-jStat-Moyen-Bloc">
                        <div class="S-m-jStat-Moyen-img">
                            <img src="<?php echo $linkeImgWeb['Moyen']; ?>" alt="Moyen">
                        </div>
                        <div class="S-m-jStat-Moyen-Bloc-nb">
                            <p><?php echo  $vMoyen; ?></p>
                        </div>
                    </div>
                    <div class="S-m-jStat-Moyen-nom">
                        <p>Moyen</p>
                    </div>
                </div>
                <div class="S-main-joueurStatistiques-goals">
                    <div class="S-m-jStat-goals-Bloc">
                        <div class="S-m-jStat-goals-Bloc-img">
                            <img src="<?php echo $linkeImgWeb['goals']; ?>" alt="goals">
                        </div>
                        <div class="S-m-jStat-goals-Bloc-nb">
                            <p><?php echo $vTirs ; ?></p>
                        </div>
                    </div>
                    <div class="S-m-jStat-goals-nom">
                        <p>goals</p>
                    </div>
                </div>
                <div class="S-main-joueurStatistiques-victoire">
                    <div class="S-m-jStat-victoire-Bloc">
                        <div class="S-m-jStat-victoire-Bloc-img">
                            <img src="<?php echo $linkeImgWeb['victoire']; ?>" alt="victoire">
                        </div>
                        <div class="S-m-jStat-victoire-Bloc-nb">
                            <p><?php echo $vNbVictoire ; ?></p>
                        </div>
                    </div>
                    <div class="S-m-jStat-victoire-nom">
                        <p>victoire</p>
                    </div>
                    
                </div> 
                <div class="S-main-joueurStatistiques-egalite">
                    <div class="S-m-jStat-egalite-Bloc">
                        <div class="S-m-jStat-egalite-Bloc-img">
                            <img src="<?php echo $linkeImgWeb['egalite']; ?>" alt="egalite">
                        </div>
                        <div class="S-m-jStat-egalite-Bloc-nb">
                            <p><?php echo $vNbEgalite ; ?></p>
                        </div>
                    </div>
                    <div class="S-m-jStat-egalite-nom">
                        <p>egalite</p>
                    </div>
                </div>
                <div class="S-main-joueurStatistiques-perte">
                    <div class="S-m-jStat-perte-Bloc">
                        <div class="S-m-jStat-perte-Bloc-img">
                            <img src="<?php echo $linkeImgWeb['perte']; ?>" alt="perte">
                        </div>
                        <div class="S-m-jStat-perte-Bloc-nb">
                            <p><?php echo $vNbPerte ; ?></p>
                        </div>
                    </div>
                    <div class="S-m-jStat-perte-nom">
                        <p>perte</p>
                    </div>
                </div>
                <div class="S-main-joueurStatistiques-CrSort">
                    <div class="S-m-jStat-CrSort-CarteRouge">
                        <div class="S-m-jStat-CrSort-CarteRouge-img"></div>
                        <div class="S-m-jStat-CrSort-CarteRouge-nb">
                            <p><?php echo $vCRouge ; ?></p>
                        </div>
                    </div>
                    <div class="S-m-jStat-CrSort-Sorte">
                        <div class="S-m-jStat-Cjentr-Sorte-Blocimg">
                            <div class="S-m-jStat-CrSort-Sorte-ArrowR">
                                <div class="S-m-jStat-CrSort-Sorte-ARimg1"></div>
                                <div class="S-m-jStat-CrSort-Sorte-ARimg2"></div>
                            </div>
                            <div class="S-m-jStat-CrSort-Sorte-ArrowL">
                                <div class="S-m-jStat-CrSort-Sorte-ALimg1"></div>
                                <div class="S-m-jStat-CrSort-Sorte-ALimg2"></div>
                            </div>
                        </div>
                        <div class="S-m-jStat-CrSort-Sorte-nb">
                            <p><?php echo $vNbSorti ; ?></p>
                        </div>
                    </div>
                </div>
                <div class="S-main-joueurStatistiques-Cjentr">
                    <div class="S-m-jStat-Cjentr-Cartejoune">
                        <div class="S-m-jStat-Cjentr-Cartejoune-img"></div>
                        <div class="S-m-jStat-Cjentr-Cartejoune-nb">
                            <p><?php echo $vCJaune ; ?></p>
                        </div>
                    </div>
                    <div class="S-m-jStat-Cjentr-Entre">
                        <div class="S-m-jStat-Cjentr-Entre-Blocimg">
                            <div class="S-m-jStat-Cjentr-Entre-ArrowR">
                                <div class="S-m-jStat-Cjentr-Entre-ARimg1"></div>
                                <div class="S-m-jStat-Cjentr-Entre-ARimg2"></div>
                            </div>
                            <div class="S-m-jStat-Cjentr-Entre-ArrowL">
                                <div class="S-m-jStat-Cjentr-Entre-ALimg1"></div>
                                <div class="S-m-jStat-Cjentr-Entre-ALimg2"></div>
                            </div>
                        </div>
                        <div class="S-m-jStat-Cjentr-Entre-nb">
                            <p><?php echo $vNbEntre ; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="S-main-dicor"></div>
            <div  class="S-main-joueurSection-titre">
                <h3>Section</h3>
            </div>
            <div class="S-main-joueurSection">
                <?php
                    creeligneButtonSection_de_main_joueurSection($vJoueur['iD_joueurs'],$linkpdo);
                ?>
            </div>
        </div>
</main>
