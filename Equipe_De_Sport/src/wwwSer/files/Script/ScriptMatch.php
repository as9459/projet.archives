<?php
if(($_SERVER['REQUEST_URI']=='/Matchs/')){
    

    $linkpdo = connexion();
    $req = 'SELECT count(*) FROM `matchs`  WHERE matchs.score <> "N - N" ';
    $resMatchTotal = $linkpdo->query($req);
    if(!empty($resMatchTotal)) {
        $vNbMatchTotal = $resMatchTotal->fetch();
        $vNbMatchTotal = $vNbMatchTotal[0];
    }else{
        $vNbMatchTotal = '0';
    }
    
    $req = 'SELECT count(*) FROM `matchs`  WHERE  matchs.score <> "N - N" AND trim(substr(matchs.score,1,instr(matchs.score, " - ")-1)) < trim(substr(matchs.score,instr(matchs.score, " - ")+2)) ';
    $resMatchPerte = $linkpdo->query($req);
    if(!empty($resMatchPerte)) {
        $vNbMatchPerte = $resMatchPerte->fetch();
        $vNbMatchPerte = (intval($vNbMatchPerte[0])/intval($vNbMatchTotal))*100;
    }else{
        $vNbMatchPerte = 0;
    }
    
    
    $req = 'SELECT count(*) FROM `matchs` WHERE matchs.score <> "N - N" AND trim(substr(matchs.score,1,instr(matchs.score, " - ")-1)) = trim(substr(matchs.score,instr(matchs.score, " - ")+2)) ';
    $resMatchEgalite = $linkpdo->query($req);
    if(!empty($resMatchEgalite)) {
        $vNbMatchEgalite = $resMatchEgalite->fetch();
        $vNbMatchEgalite = (intval($vNbMatchEgalite[0])/intval($vNbMatchTotal))*100;
    }else{
        $vNbMatchEgalite = 0;
    }
    
    $req = 'SELECT count(*) FROM `matchs`  WHERE  matchs.score <> "N - N" AND trim(substr(matchs.score,1,instr(matchs.score, " - ")-1)) < trim(substr(matchs.score,instr(matchs.score, " - ")+2)) ';
    $resMatchPerte = $linkpdo->query($req);
    if(!empty($resMatchPerte)) {
        $vNbMatchPerte = $resMatchPerte->fetch();
        $vNbMatchPerte = (intval($vNbMatchPerte[0])/intval($vNbMatchTotal))*100;
    }else{
        $vNbMatchPerte = 0;
    }
    
    
    $req = 'SELECT count(*) FROM `matchs`  WHERE  matchs.score <> "N - N" AND trim(substr(matchs.score,1,instr(matchs.score, " - ")-1)) < trim(substr(matchs.score,instr(matchs.score, " - ")+2)) ';
    $resMatchPerte = $linkpdo->query($req);
    if(!empty($resMatchPerte)) {
        $vNbMatchPerte = $resMatchPerte->fetch();
        $vNbMatchPerte = (intval($vNbMatchPerte[0])/intval($vNbMatchTotal))*100;
    }else{
        $vNbMatchPerte = 0;
    }
    
    
    $req = 'SELECT count(*) FROM `matchs`  WHERE  matchs.score <> "N - N" AND trim(substr(matchs.score,1,instr(matchs.score, " - ")-1)) > trim(substr(matchs.score,instr(matchs.score, " - ")+2)) ';
    $resMatchVictoire = $linkpdo->query($req);
    if(!empty($resMatchVictoire)) {
        $vNbMatchVictoire = $resMatchVictoire->fetch();
        $vNbMatchVictoire = (intval($vNbMatchVictoire[0])/intval($vNbMatchTotal))*100;;
    }else{
        $vNbMatchVictoire = 0;
    }
        
    $linkpdo = null;
    
    function creeligneTableau_de_main_LesMatchs(){
        
        $linkpdo = connexion();
        $req = 'SELECT matchs.iD_matchs, 	matchs.dateMatch, 	matchs.heureMatch, 	matchs.equipeAdverse, matchs.score  FROM `matchs` ORDER by 2 desc ,3 desc,1 ';
        $resMatch = $linkpdo->query($req);
            while ($data = $resMatch->fetch()) {
                
                $req = 'SELECT count(*)  FROM `participer` WHERE  iD_matchs = '.$data['iD_matchs'].' AND  id_etat in ("TTM","TAS") ';
                $resMatchT = $linkpdo->query($req);
                $vMatchT = $resMatchT->fetch();
                $vMatchT = $vMatchT[0];
                
                $req = 'SELECT count(*)  FROM `participer` WHERE  iD_matchs = '.$data['iD_matchs'].' AND  id_etat in ("RTM","RAE") ';
                $resMatchR = $linkpdo->query($req);
                $vMatchR = $resMatchR->fetch();
                $vMatchR = $vMatchR[0];
                
                echo '<tr id="tr_N_'.$data['iD_matchs'].'">
                    <td aria-valuetext="'.$data['iD_matchs'].'" headers="N_ht">'.$data['iD_matchs'].'</td>';
                    if($data['dateMatch'] < date('Y-m-d')){
                        echo '<td aria-valuetext="passé" headers="etat_ht">passé</td>';
                    } else if($data['dateMatch']> date('Y-m-d')) {
                        echo '<td aria-valuetext="à venir" headers="etat_ht">à venir</td>';
                    } else {
                        echo '<td aria-valuetext="aujourdhui" headers="etat_ht">aujourdhui</td>';
                    }
    
                    echo '<td aria-valuetext="'.$data['score'].'" headers="Score_ht">'.$data['score'].'</td>
                    <td aria-valuetext="'.$data['equipeAdverse'].'" headers="Contre_ht">'.$data['equipeAdverse'].'</td>
                    <td aria-valuetext="le '.date("d/m/Y", strtotime($data['dateMatch'])).' à '.date("H:i", strtotime($data['heureMatch'])).'" headers="DateETheure_ht">le '.date("d/m/Y", strtotime($data['dateMatch'])).' à '.date("H:i", strtotime($data['heureMatch'])).'</td>
                    <td aria-valuetext="'.$vMatchT.'" headers="T_ht">'.$vMatchT.'</td>
                    <td aria-valuetext="'.$vMatchR.'" headers="R_ht">'.$vMatchR.'</td>
                    <td headers="action_ht">';
                    
                    
                    if(($data['dateMatch'] < date('Y-m-d')) && $data['score'] != "N - N"){
                        echo '<button type="submit" title="Modifier le resultat du match" name="Affiche" value="Fromagi-2023-01-19" formaction="Matche/" form="fromInput" formmethod="GET">
                                    Affiche matche
                            </button>';
                    } else if(($data['dateMatch']> date('Y-m-d')) && ($data['score'] == "N - N")) {
                        echo '<button type="submit" title="Modifier le resultat du match" name="Modifier_matche" value="Paris Saint Germain-2023-02-01" formaction="Modifier/" form="fromInput" formmethod="GET">
                                    Modifier matche
                        </button>';
                    } else if (($data['dateMatch'] < date('Y-m-d')) &&  ($data['score'] == "N - N")){
                        echo '<button type="submit" title="Modifier le resultat du match" name="Mettez_resultat" value="Fromagi-2023-01-19" formaction="Saisire_Resultat_Matche/" form="fromInput" formmethod="GET">
                                    Mettez le résultat 
                            </button>';
                    }
                    
                        
                    echo '
                    </td>
                </tr>';
                $resComment=null;
            }
    
            $resMatch->closeCursor();
            $resMatch=null;
            $linkpdo=null;
            
        }
}
?>