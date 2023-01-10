-- Types
with TAD_Coordonnee;   use TAD_Coordonnee;
with TAD_ensemble;     use TAD_ensemble;
with TAD_grilleSudoku; use TAD_grilleSudoku;
--with Pile_CasPossibles; use Pile_CasPossibles;
--with casPossible;       use casPossible;
-- Affichages
with affichage;           use affichage;
-- Resolution
with remplirGrille;       use remplirGrille;
with resolutions;         use resolutions;
-- E/S
with Ada.Text_IO;         use Ada.Text_IO;
with Ada.Integer_Text_IO; use Ada.Integer_Text_IO;

procedure affichages_tests is
   g      : Type_Grille;
   c      : Type_Coordonnee;
   e  : Type_Ensemble;
   --   p  : Type_Pile;
   --  cp : type_CasPossible;
   trouve : Boolean;
   nbChiffresDepart :Integer;
   cpt : Integer := 0;

begin

   --------------------------------------
   -- Tests affichage de la grille
   --------------------------------------
   g := construireGrille;
   afficherGrille (g);

   --------------------------------------
   -- test affichage d'un ensemble
   --------------------------------------

   g := construireGrille;
   for i in 1 .. 9 loop
      c := construireCoordonnees (1, i);
      fixerChiffre (g, c, i, cpt);
   end loop;
   e := obtenirChiffresDUneLigne (g, 1);
   afficherEnsemble (e);
   New_Line;

   -------------------------------------------------
   -- test affichage d'un cas possible dans la pile
   -------------------------------------------------
   --p := construirePile;
   -- coordonnée
   --c := construireCoordonnees (2, 4);
   -- test empilement
   --p  := empiler (p, construireCasPossible (c, 6));
   --cp := dernier (p);
   -- p := depiler(p);
   --afficher (cp);

   --------------------------------------
   -- Affichage de toutes les grilles
   --------------------------------------

   Put_Line ("********* Grille 1");
   g := grille1TresTresFacileDuNouvelAn2018;
   afficherGrille (g);

   Put_Line ("********* Grille 2");
   g := grille2TresTresFacile;
   afficherGrille (g);

   Put_Line ("********* Grille 3");
   g := grille3TresFacile;
   afficherGrille (g);

   Put_Line ("********* Grille 4");
   g := grille4Facile;
   afficherGrille (g);

   Put_Line ("********* Grille 6");
   g := grille6Moyen;
   afficherGrille (g);

   Put_Line ("********* Grille 7");
   g := grille7Difficile;
   afficherGrille (g);

   Put_Line ("********* Grille 8");
   g := grille8Difficile;
   afficherGrille (g);

   Put_Line ("********* Grille 9");
   g := grille9TresDifficile;
   afficherGrille (g);

   -------------------------------
   -- tests resolution grille 1 --
   -------------------------------
   Put_Line
     ("********* Sudoku trÃ¨s trÃ¨s facile : grille1TresTresFacileDuNouvelAn2018");
   g := grille1TresTresFacileDuNouvelAn2018;
   afficherGrille (g);
   cpt := 0;
   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku  (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 2 --
   -------------------------------
   Put_Line ("********* Sudoku trÃ¨s trÃ¨s facile : grille2TresTresFacile");
   g := grille2TresTresFacile;
   cpt := 0;
   afficherGrille (g);
   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku  (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 3 --
   -------------------------------
   Put_Line ("********* Sudoku trÃ¨s facile : grille3TresFacile");
   g := grille3TresFacile;
   cpt := 0;
   afficherGrille (g);
   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku  (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 5 --
   -------------------------------
   Put_Line ("********* Sudoku facile : grille5Facile");
   g := grille5Facile;
   afficherGrille (g);
   cpt := 0;
   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku  (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 4 --
   -------------------------------
   Put_Line ("********* Sudoku facile : grille4Facile");
   g := grille4Facile;
   afficherGrille (g);
   cpt := 0;
   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku  (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 6 --
   -------------------------------
   Put_Line ("********* Sudoku moyen : grille6Moyen");
   g := grille6Moyen;
   cpt := 0;
   afficherGrille (g);
   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku  (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 7 --
   -------------------------------
   Put_Line ("********* Sudoku difficile : grille7Difficile");
   g := grille7Difficile;
   cpt := 0;
   afficherGrille (g);
   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku  (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 8 --
   -------------------------------
   Put_Line ("********* Sudoku difficile : grille8Difficile");
   g := grille8Difficile;
   cpt := 0;
   afficherGrille (g);
   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku  (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 9 --
   -------------------------------
   Put_Line ("********* Sudoku trÃ¨s difficile : grille9TresDifficile");
   g := grille9TresDifficile;
   cpt := 0;
   afficherGrille (g);
   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku  (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

end affichages_tests;
