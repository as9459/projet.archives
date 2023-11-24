<main>
    <div class="Style-main">
        <div class="S-main-dicor"></div>
        <div class="S-main-Connexion">
            <div class="S-main-Connexion-img">
                <img src="<?php echo $linkeImgWeb['Connexion']; ?>">
            </div>
            <div class="S-main-Connexion-titre">
                <h2>Se connecter</h2>
            </div>
            <form class="S-main-form-Connexion" action="" method="POST" id="fromInput"  autocomplete="off" > 
                <div class="S-main-Connexion-InputRow">
                    <div class="S-main-Connexion-InputLabel">
                        <label for="name">Nom utilisateur :</label>
                    </div>
                    <div class="S-main-Connexion-InputChamp">
                        <input type="text" id="User" name="User"  placeholder=" Entrez le nom d'utilisateur..." minlength="4" maxlength="16" size="20" autocomplete="off" required>
                    </div>
                </div>
                <div class="S-main-Connexion-InputRow">
                    <div class="S-main-Connexion-InputLabel">
                        <label for="name">Mot de passe :</label>
                    </div>
                    <div class="S-main-Connexion-InputChamp">
                        <input type="password" id="password" name="password"  placeholder=" Entrez le mot de passe..."  minlength="4" maxlength="16" size="20"  autocomplete="off" required>
                    </div>
                </div>
                <div class="S-main-Connexion-BtnConnexion">
                    <button name="BtnConnexion"  name="ClickBtnConnexion">
                        Connexion
                    </button>
                </div>
            </form>
        </div>
        <div class="S-main-dicor"></div>
    </div>
</main>