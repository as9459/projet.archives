<main>
    <form class="S-main-from-JoueurMatch" id="fromJoueurMatch" action="<?php echo $_SERVER['REQUEST_URI'].'/'; ?>" method="post"></form>
        <div class="Style-main" >
            <div class="S-main-head">
                <div class="S-main-head-BtnRetourne">
                    <button formaction="<?php urlRetourne('3'); ?>"  form="fromJoueurMatch">
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
            <div class="S-main-AfficherResultat-NomsVsEquipes">
                <div>
                    <p>CSC DeCayenne</p>
                    <p><?php if(!empty($vNoterScore)){echo $vNoterScore; }else{echo '0';}?></p>
                </div>
                <div>
                    <p><strong> VS </strong></p>
                    <p><strong> - </strong></p>
                </div>
                <div>
                    <p><?php if(!empty($vMatchP)){echo $vMatchP; }?></p>
                    <p><?php if(!empty($vAdverseScore)){echo $vAdverseScore; }else{echo '0';}?></p>
                </div>
            </div>
            <div class="S-main-dicor"></div>
            <div class="S-main-AfficherResultat-info">
                <div  class="S-main-AfficherResultat-Statistiques">
                    <div class="S-main-AfficherResultat-Crgoal">
                        <div class="S-m-ResStat-Crgoal-CarteRouge">
                            <div class="S-m-ResStat-Crgoal-CarteRouge-img"></div>
                            <div class="S-m-ResStat-Crgoal-CarteRouge-nb">
                                <p><?php if(!empty($vStatMatch['nbCarteR'])){echo $vStatMatch['nbCarteR']; }else{echo '0';}?></p>
                            </div>
                        </div>
                        <div class="S-m-ResStat-Crgoal-goals">
                            <div class="S-m-ResStat-goals-Bloc-img">
                                <img src="<?php echo $linkeImgWeb['goals']; ?>" alt="goals">
                            </div>
                            <div class="S-m-ResStat-goals-Bloc-nb">
                                <p><?php if(!empty($vStatMatch['nbTirsC'])){echo $vStatMatch['nbTirsC']; }else{echo '0';}?></p>
                            </div>
                        </div>
                    </div>
                    <div class="S-main-AfficherResultat-CrjRempls">
                        <div class="S-m-ResStat-CrjRempls-Cartejoune">
                            <div class="S-m-ResStat-CrjRempls-Cartejoune-img"></div>
                            <div class="S-m-ResStat-CrjRempls-Cartejoune-nb">
                                <p><?php if(!empty($vStatMatch['nbCarteJ'])){echo $vStatMatch['nbCarteJ']; }else{echo '0';}?></p>
                            </div>
                        </div>
                        <div class="S-m-ResStat-CrjRempls-Remplse">
                            <div class="S-m-ResStat-CrjRempls-Remplse-Blocimg">
                                <div class="S-m-ResStat-CrjRempls-Remplse-ArrowR">
                                    <div class="S-m-ResStat-CrjRempls-Remplse-ARimg1"></div>
                                    <div class="S-m-ResStat-CrjRempls-Remplse-ARimg2"></div>
                                </div>
                                <div class="S-m-ResStat-CrjRempls-Remplse-ArrowL">
                                    <div class="S-m-ResStat-CrjRempls-Remplse-ALimg1"></div>
                                    <div class="S-m-ResStat-CrjRempls-Remplse-ALimg2"></div>
                                </div>
                            </div>
                                <div class="S-m-ResStat-CrjRempls-Remplse-nb">
                                    <p><?php if(!empty($vRemplaçement)){echo $vRemplaçement; }else{echo '0';}?></p>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="S-main-AfficherResultat-img">
                    <img src="<?php if(!empty($vImg)){echo $vImg; }?>" alt="victoire">
                </div>
                <div class="S-main-AfficherResultat-BlocPostes">
                    <div class="S-main-AfficherResultat-Postes" style="background-image: url(./wwwSerImg/TERRAIN_FOOTBALL.png);">
                        <div class="S-main-AfficherResultat-PostesP">
                            <div>
                                <input type="checkbox" name="AG" title="Attaques au Gauche" disabled>
                            </div>
                            <div>
                                <input type="checkbox" name="BT" title="Attaques du Lance" disabled <?php if(!empty($tPosteA[2])){echo $tPosteA[2];} ?>>
                            </div>
                            <div>
                                <input type="checkbox" name="BT" title="Attaques du Lance" disabled <?php if(!empty($tPosteA[1])){echo $tPosteA[1];} ?>>
                            </div>
                            <div>
                                <input type="checkbox" name="BT" title="Attaques du Lance" disabled <?php if(!empty($tPosteA[3])){echo $tPosteA[3];} ?>>
                            </div>
                            <div>
                                <input type="checkbox" name="AD" title="Attaques au Droit" disabled>
                            </div>
                        </div>
                        <div class="S-main-AfficherResultat-PostesP">
                            <div>
                                <input type="checkbox" name="AG" title="Attaques au Gauche" disabled <?php if(!empty($tPosteA[4])){echo $tPosteA[4];} ?>>
                            </div>
                            <div>
                                <input type="checkbox" name="BT" title="Attaques du Lance" disabled>
                            </div>
                            <div>
                                <input type="checkbox" name="BT" title="Attaques du Lance" disabled>
                            </div>
                            <div>
                                <input type="checkbox" name="BT" title="Attaques du Lance" disabled>
                            </div>
                            <div>
                                <input type="checkbox" name="AD" title="Attaques au Droit" disabled <?php if(!empty($tPosteA[5])){echo $tPosteA[5];} ?>>
                            </div>
                        </div>
                        <div class="S-main-AfficherResultat-PostesP">
                            <div>
                                <input type="checkbox" name="AG" title="Attaques au Gauche" disabled>
                            </div>
                            <div>
                                <input type="checkbox" name="BT" title="Attaques du Lance" disabled>
                            </div>
                            <div>
                                <input type="checkbox" name="BT" title="Attaques du Lance" disabled>
                            </div>
                            <div>
                                <input type="checkbox" name="BT" title="Attaques du Lance" disabled>
                            </div>
                            <div>
                                <input type="checkbox" name="AD" title="Attaques au Droit" disabled>
                            </div>
                        </div>
                        <div class="S-main-AfficherResultat-PostesP">
                            <div>
                                <input type="checkbox" name="MG" title="Milieu au Gauche" disabled <?php if(!empty($tPosteM[2])){echo $tPosteM[2];} ?>>
                            </div>
                            <div>
                                <input type="checkbox" name="MC" title="Milieu de Coeur" disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="MC" title="Milieu de Coeur" disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="MC" title="Milieu de Coeur" disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="MD" title="Milieu au Droit" disabled <?php if(!empty($tPosteM[3])){echo $tPosteM[3];} ?>>
                            </div>
                        </div>
                        <div class="S-main-AfficherResultat-PostesP">
                            <div>
                                <input type="checkbox" name="MG" title="Milieu au Gauche" disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="MC" title="Milieu de Coeur" disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="MoC" title="Milieu au Coeur de terrain" disabled <?php if(!empty($tPosteM[1])){echo $tPosteM[1];} ?>>
                            </div>
                            <div>
                                <input type="checkbox" name="MC" title="Milieu de Coeur" disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="MD" title="Milieu au Droit" disabled >
                            </div>
                        </div>
                        <div class="S-main-AfficherResultat-PostesP">
                            <div>
                                <input type="checkbox" name="MG" title="Milieu au Gauche" disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="MC" title="Milieu de Coeur" disabled <?php if(!empty($tPosteM[4])){echo $tPosteM[4];} ?>>
                            </div>
                            <div>
                                <input type="checkbox" name="MC" title="Milieu de Coeur" disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="MC" title="Milieu de Coeur" disabled <?php if(!empty($tPosteM[5])){echo $tPosteM[5];} ?>>
                            </div>
                            <div>
                                <input type="checkbox" name="MD" title="Milieu au Droit" disabled >
                            </div>
                        </div>
                        <div class="S-main-AfficherResultat-PostesP">
                            <div>
                                <input type="checkbox" name="DG" title="Defenses  au Gauche" disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="DC" title="Defenses  de Coeur " disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="DC" title="Defenses  de Coeur " disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="DC" title="Defenses  de Coeur " disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="DD" title="Defenses  au Droit" disabled >
                            </div>
                        </div>
                        <div class="S-main-AfficherResultat-PostesP">
                            <div>
                                <input type="checkbox" name="DG" title="Defenses  au Gauche" disabled <?php if(!empty($tPosteD[4])){echo $tPosteD[4];} ?>>
                            </div>
                            <div>
                                <input type="checkbox" name="DC" title="Defenses  de Coeur " disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="DC" title="Defenses  de Coeur " disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="DC" title="Defenses  de Coeur " disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="DD" title="Defenses  au Droit" disabled <?php if(!empty($tPosteD[5])){echo $tPosteD[5];} ?>>
                            </div>
                        </div>
                        <div class="S-main-AfficherResultat-PostesP">
                            <div>
                                <input type="checkbox" name="DG" title="Defenses  au Gauche" disabled >
                            </div>
                            <div>
                                <input type="checkbox" name="DC" title="Defenses  de Coeur " disabled <?php if(!empty($tPosteD[2])){echo $tPosteD[2];} ?>>
                            </div>
                            <div>
                                <input type="checkbox" name="DC" title="Defenses  de Coeur " disabled <?php if(!empty($tPosteD[1])){echo $tPosteD[1];} ?>>
                            </div>
                            <div>
                                <input type="checkbox" name="DC" title="Defenses  de Coeur " disabled <?php if(!empty($tPosteD[3])){echo $tPosteD[3];} ?>>
                            </div>
                            <div>
                                <input type="checkbox" name="DD" title="Defenses  au Droit" disabled >
                            </div>
                        </div>
                        <div class="S-main-AfficherResultat-PostesP">
                            <div>
                                <input type="checkbox" title="Gardien" disabled checked>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="S-main-dicor"></div>
            <div  class="S-main-JoueurMatch-titre">
                <h3>Joueurs du match</h3>
            </div>
            <div class="S-main-JoueurMatch">
                <?php
                    creeButton_de_main_JoueurMatch($vMatch['iD_matchs']);
                ?>
            </div>
        </div>
</main>