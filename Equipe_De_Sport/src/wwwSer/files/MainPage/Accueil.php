<main>
    <form class="S-main-form-accueil" action="<?php echo $_SERVER['REQUEST_URI'].'/';?>" method="POST" id="accueil-form"  autocomplete="off" ></form>
        <div class="Style-main">
            <div class="S-main-dicor"></div>
            <div class="S-main-accueil-prochainMath">
                <button class="S-main-accueil-prochainMath" type="submit" form="accueil-form" disabled>
                    <div class="S-main-accueil-prochainMath-img">
                        <img src="<?php echo $linkeImgWeb['vs']; ?> " alt="match-pro">
                    </div>
                    <div class="S-main-accueil-prochainMath-info">
                        <div class="S-m-accueil-prochainMath-infoPvsP">
                            <div class="S-m-accueil-prochainMath-infoP1">
                                <p>CSC de Cayenne</p>
                            </div>
                            <div class="S-m-accueil-prochainMath-infoPVS"> 
                                <p><strong>VS</strong></p>
                            </div>
                            <div class="S-m-accueil-prochainMath-infoP2">
                                <p><?php if(!empty($vMatchArrevVS)){echo $vMatchArrevVS;} ?></p>
                            </div>
                        </div>
                        <p>le <?php if(!empty($vMatchArrevDate)){echo $vMatchArrevDate;} ?> à <?php if(!empty($vMatchArrevTime)){echo $vMatchArrevTime;} ?></p>
                    </div>
                </button>
            </div>
            <div class="S-main-dicor"></div>
            <div  class="S-main-accueil-titre-MatchePrecedents">
                <h3>Matchs précédents</h3>
            </div>
            <div class="S-main-accueil-BtnSlide">
                <button class="S-main-accueil-slide-R" onclick="Move(-1, 0)"><</button>
                <button class="S-main-accueil-slide-L" onclick="Move(1, 0)">></button>
            </div>
            <div class="S-main-accueil-MatchePrecedents">
                <?php creeButton_Matchs_precedent();?>
            </div>
            <div class="S-main-dicor"></div>
            <div  class="S-main-accueil-titre-MeilleursJoueurs">
                <h3>Nos meilleurs joueurs</h3>
            </div>
            <div class="S-main-accueil-BtnSlide">
                <button class="S-main-accueil-slide-R" onclick="Move(-1, 1)"><</button>
                <button class="S-main-accueil-slide-L" onclick="Move(1, 1)">></button>
            </div>
            <div class="S-main-accueil-MeilleursJoueurs">	
                <?php
                    creeButton_Meilleurs_joueurs();
                ?>
            </div>
        </div>
</main>