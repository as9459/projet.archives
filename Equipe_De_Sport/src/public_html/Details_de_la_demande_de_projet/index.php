<?php
	include './../../wwwSer/files/Script/VariableHead.php';
	$vMarge = './.';
	include './../../wwwSer/files/Script/phpHead.php';
?>
<html dir="ltr" xml:lang="fr" class="yui3-js-enabled" lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="240">

    <title>CSC De Cayenne</title>
    <link rel="icon" type="image/png" href="<?php echo $linkeImgWeb['icon']; ?>">
    
    <meta name="author" content="ALHABSI Ayoub, Kémit">
    <meta name="description" content = "Projet : gestion d'équipe du football.
    L’objectif de cette ressource est de poursuivre l'apprentissage de la programmation autour de technologies web. ">
    <link rel="stylesheet" href="https://moodle.iut-tlse3.fr/theme/styles.php/boost/1680507154_1625582821/all">
    <link rel ="stylesheet" href="/Style/style.css">
</head>
<body id="page-course-view-topics" class="format-topics path-course path-course-view gecko dir-ltr lang-fr yui-skin-sam yui3-skin-sam moodle-iut-tlse3-fr pagelayout-course course-742 context-49360 category-3800 jsenabled">
<section id="region-main" aria-label="Contenu">
                <div class="summary"><div class="no-overflow"><h1 style="text-align: center;"><span style="color: #008000;"><span style="color: #ff6600;">Projet : gestion d'une équipe de sport</span><br></span></h1>
<p><strong>&nbsp;</strong></p><p><strong>Votre équipe favorite a besoin de vous !</strong></p>
<p>L'entraîneur vous demande de réaliser une application qui l'aidera à faire les sélections des joueurs pour les matchs.</p>
<p>Il souhaite pouvoir administrer la liste de ses joueurs (avec leurs noms et prénoms, une photo, leur numéro de licence, leur date de naissance, leur taille et leur poids, et leur poste préféré dans l'équipe) ainsi que celle des matchs (avec la date et l'heure, le nom de l'équipe adverse, le lieu de rencontre - domicile ou extérieur -, et le résultat qui sera saisi une fois le match terminé).</p>
<p>Il souhaite également pouvoir ajouter des notes personnelles (commentaires) sur chaque joueur et préciser leur statut : Actif, Blessé, Suspendu, ou Absent.</p>
<p>Avant chaque match il veut pouvoir choisir la liste des joueurs qui participeront, en précisant qui sera titulaire et qui sera remplaçant. Il ne faudra lui proposer que les joueurs actifs.</p>
<p>Après chaque match, il souhaite pouvoir évaluer la performance de chaque joueur ayant participé au match ; l'évaluation peut être mise en oeuvre par un système de notation (de 1 à 5 par exemple) ou un système d'étoiles par exemple.</p>
<p>Enfin, il souhaite avoir des statistiques qui l'aideront dans sa prise de décision.</p>
</div></div><ul class="section img-text" id="yui_3_17_2_1_1684442626579_27"><li class="activity label modtype_label " id="module-51376"><div id="yui_3_17_2_1_1684442626579_26"><div class="mod-indent-outer w-100" id="yui_3_17_2_1_1684442626579_25"><div class="mod-indent"></div><div id="yui_3_17_2_1_1684442626579_24"><div class="contentwithoutlink " id="yui_3_17_2_1_1684442626579_23"><div class="no-overflow" id="yui_3_17_2_1_1684442626579_22"><div class="no-overflow" id="yui_3_17_2_1_1684442626579_21">
<p><span style="text-decoration: underline; font-size: medium;"><strong>Upload de la photo du joueur<br></strong></span></p>
<p id="yui_3_17_2_1_1684442626579_36">Pour uploader la photo des joueurs vous devez suivre les instructions suivantes :</p>
<p>1/ créer un dossier, par exemple "projet-photos" <span style="text-decoration: underline;">en dehors du dossier www</span> (voir les notions de sécurité du cours) ;</p>
<p>2/ ajouter le droit d'écriture à ce nouveau dossier pour les autres ;</p>
<p>3/ uploader vos photos dans ce nouveau dossier.</p>
<p>Les photos ainsi téléchargées appartiennent à l'utilisateur www-data, celui utilisé pour exécuter apache.</p>
<p></p>
<p><span style="text-decoration: underline; font-size: medium;"><strong>Modèle de données</strong></span></p>
<p id="yui_3_17_2_1_1684442626579_33">Sur papier ou à l'aide de l'outil de votre choix, réaliser le modèle de données pour cette application.</p>
</div></div></div></div></div></div></li><li class="activity label modtype_label " id="module-51377"><div><div class="mod-indent-outer w-100"><div class="mod-indent"></div><div><div class="contentwithoutlink "><div class="no-overflow"><div class="no-overflow"><p><span style="text-decoration: underline; font-size: medium;"><strong>&nbsp;</strong></span></p>
<p><span style="text-decoration: underline; font-size: medium;"><strong>Gestion des joueurs et des matchs<br></strong></span></p>
<p>Créer les pages nécessaires à l'affichage, l'ajout, la modification, et la suppression des joueurs et des matchs.</p></div></div></div></div></div></div></li><li class="activity label modtype_label " id="module-51378"><div id="yui_3_17_2_1_1684442626579_42"><div class="mod-indent-outer w-100" id="yui_3_17_2_1_1684442626579_41"><div class="mod-indent"></div><div id="yui_3_17_2_1_1684442626579_40"><div class="contentwithoutlink " id="yui_3_17_2_1_1684442626579_39"><div class="no-overflow" id="yui_3_17_2_1_1684442626579_38"><div class="no-overflow" id="yui_3_17_2_1_1684442626579_37"><p><span style="text-decoration: underline; font-size: medium;"><strong>&nbsp;</strong></span></p>
<p><span style="text-decoration: underline; font-size: medium;"><strong>Saisie des feuilles de match</strong></span></p>
<p id="yui_3_17_2_1_1684442626579_44">Créer une page permettant de faire une sélection parmi les joueurs actifs et de définir pour chaque joueur choisi s'il sera titulaire ou remplaçant. Si le nombre minimum de joueurs n'est pas atteint, la sélection ne devra pas pouvoir être validée. L'interface de sélection devra afficher les informations des joueurs : photo, taille, poids, poste préféré, commentaires et évaluations de l'entraineur.</p>
<p>Adapter l'affichage des matchs pour permettre de visualiser et modifier la sélection.</p></div></div></div></div></div></div></li><li class="activity label modtype_label " id="module-51379"><div id="yui_3_17_2_1_1684442626579_50"><div class="mod-indent-outer w-100" id="yui_3_17_2_1_1684442626579_49"><div class="mod-indent"></div><div id="yui_3_17_2_1_1684442626579_48"><div class="contentwithoutlink " id="yui_3_17_2_1_1684442626579_47"><div class="no-overflow" id="yui_3_17_2_1_1684442626579_46"><div class="no-overflow" id="yui_3_17_2_1_1684442626579_45"><p><span style="text-decoration: underline; font-size: medium;"><strong>&nbsp;</strong></span></p>
<p><span style="text-decoration: underline; font-size: medium;"><strong>Statistiques</strong></span></p>
<p>Si ce n'est pas déjà fait, modifier la page de modification d'un match pour permettre la saisie du résultat ainsi que les évaluations de l'entraîneur.</p>
<p>Créer ensuite une page affichant les statistiques suivantes :</p>
<ul id="yui_3_17_2_1_1684442626579_77">
<li id="yui_3_17_2_1_1684442626579_76">Le nombre total et le pourcentage de matchs gagnés, perdus, ou nuls.</li>
<li>Un tableau avec pour chaque joueur : son statut actuel, son poste préféré, le nombre total de sélections en tant que titulaire, le nombre total de sélections en tant que remplaçant, la moyenne des évaluations de l'entraîneur, et le pourcentage de matchs gagnés lorsqu'il a participé.</li>
<li>Si possible, ajouter également le nombre de sélections consécutives (facultatif).</li>
</ul></div></div></div></div></div></div></li><li class="activity label modtype_label " id="module-51380"><div id="yui_3_17_2_1_1684442626579_57"><div class="mod-indent-outer w-100" id="yui_3_17_2_1_1684442626579_56"><div class="mod-indent"></div><div id="yui_3_17_2_1_1684442626579_55"><div class="contentwithoutlink " id="yui_3_17_2_1_1684442626579_54"><div class="no-overflow" id="yui_3_17_2_1_1684442626579_53"><div class="no-overflow" id="yui_3_17_2_1_1684442626579_52"><p><span style="text-decoration: underline; font-size: medium;"><strong>&nbsp;</strong></span></p>
<p id="yui_3_17_2_1_1684442626579_78"><span style="text-decoration: underline; font-size: medium;"><strong>Cadre de l'application</strong></span></p>
<p>Sécuriser l'application en créant une page d'authentification (à l'aide d'un nom d'utilisateur et d'un mot de passe définis à l'avance). Aucune autre page de l'application ne devra être accessible si l'utilisateur n'est pas authentifié.</p>
<p>Mettre en place un menu qui sera affiché sur chaque page pour permettre à l'utilisateur de naviguer dans l'application. Ajouter tous les liens nécessaires entre les différentes pages.</p>
<p></p></div></div></div></div></div></div></li><li class="activity label modtype_label " id="module-51381"><div id="yui_3_17_2_1_1684442626579_63"><div class="mod-indent-outer w-100" id="yui_3_17_2_1_1684442626579_62"><div class="mod-indent"></div><div id="yui_3_17_2_1_1684442626579_61"><div class="contentwithoutlink " id="yui_3_17_2_1_1684442626579_60"><div class="no-overflow" id="yui_3_17_2_1_1684442626579_59"><div class="no-overflow" id="yui_3_17_2_1_1684442626579_58"><p><span style="text-decoration: underline; font-size: medium;"><strong>&nbsp;</strong></span></p>
<p><span style="text-decoration: underline; font-size: medium;"><strong>Mise en forme</strong></span></p>
<p id="yui_3_17_2_1_1684442626579_66">Utiliser les feuilles de style (CSS) et les bases d'ergonomie logicielle pour faire en sorte que l'utilisation de l'application soit la plus agréable et intuitive possible.</p>
<p></p></div></div></div></div></div></div></li></ul></section>
</body></html>