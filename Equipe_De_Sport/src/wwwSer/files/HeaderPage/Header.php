<?php

?>

<header>
    <div class="Style-header">
        <form class="S-header-form" action="<?php $_SERVER['REQUEST_URI']; ?>" method="POST" id="header-form"  autocomplete="off" >
        </form>
        <div class="S-header-imgbar" >
            <button class="S-header-imgbar" name="BtnOngletIcon" value="ClickBtnOngletIcon" type="submit" form="header-form" formaction="/" >
                <div>
                    <img src="<?php echo $linkeImgWeb['icon']; ?>" alt="">
                </div>
                <div >
                    <p>CSC De</p>
                    <p>Cayenne</p>
                </div>
            </button>
        </div>
        <div class="S-header-bar <?php if(!empty($_SESSION["sEstConnexion"]) && ($_SESSION["sEstConnexion"] == 1)){}else{echo 'S-elementCache';}?>">
            <div class="S-header-bar-logOut">
                <div class="S-header-BtnLogOut">
                    <button name="BtnLogOut" value="ClickBtnLogOut" type="submit" form="header-form">
                        <img src="<?php echo $linkeImgWeb['logOut']; ?>" alt="Log out">
                    </button>
                </div>
            </div>
            <div class="S-header-bar-nav">
                <div class="S-header-bar-nav-L1 <?php if(!empty($vOngletA)){echo $vOngletA;} ?>">
                    <button name="BtnOngletAccueil" value="ClickBtnOngletAccueil" type="submit" form="header-form" formaction="/" >
                        L'accueil
                    </button>
                </div>
                <div class="S-header-bar-nav-L2 <?php if(!empty($vOngletN)){echo $vOngletN;} ?>">
                    <button name="BtnOngletNoterEquipe" value="ClickBtnOngletNoterEquipe" type="submit" form="header-form" formaction="/Notre_equipe" >
                        Noter équipe
                    </button>
                </div>
                <div class="S-header-bar-nav-L3 <?php if(!empty($vOngletL)){echo $vOngletL;} ?>">
                    <button name="BtnOngletMatchs" value="ClickBtnOngletMatchs" type="submit" form="header-form" formaction="/Matchs" >
                        Les matchs
                    </button>
                </div >
                <div class="S-header-bar-nav-L4 <?php if(!empty($vOngletS)){echo $vOngletS;} ?>">
                    <button name="BtnOngletStatistiques" value="ClickBtnOngletStatistiques" type="submit" form="header-form" formaction="/Statistiques" >
                        Statistiques
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<div>
<?php /* 
echo '<p style="font-size: 12px;">print info dans /wwwSer/files/HeaderPage/Header.php</p>';
echo '<p style="font-size: 12px;">HTTP_HOST : '.$_SERVER['HTTP_HOST'].' |||| REQUEST_URI : '.$_SERVER['REQUEST_URI'].' |||| SCRIPT_NAME : '.$_SERVER['SCRIPT_NAME'].'</p>';
echo '<p style="font-size: 12px;"> |<| HTTP_REFERER : ';
if(!empty($_SERVER['HTTP_REFERER'])){echo $_SERVER['HTTP_REFERER'];}else{echo 'NoN';}
echo '</p>';
echo '<p style="font-size: 12px;"> _POST = ';print_r($_POST);echo '</p>';
echo '<p style="font-size: 12px;"> _GET = ';print_r($_GET).'</p>'; */
?>
</div>