-- Types
with TAD_grilleSudoku;  use TAD_grilleSudoku;
-- Affichages
with affichage; use affichage;
-- Resolution
with remplirGrille; use remplirGrille;
with resolutions;   use resolutions;
-- E/S
with Ada.Text_IO;         use Ada.Text_IO;
with Ada.Integer_Text_IO; use Ada.Integer_Text_IO;

procedure evaluations is
   g                : Type_Grille;
   trouve           : Boolean;
   nbChiffresDepart : Integer;
   cpt              : Integer := 0;

begin

   -------------------------------
   -- tests resolution grille 1 --
   -------------------------------
   Put_Line
     ("********* Sudoku trÃ¨s trÃ¨s facile : grille1TresTresFacileDuNouvelAn2018");
   g := grille1TresTresFacileDuNouvelAn2018;
   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 2 --
   -------------------------------
   Put_Line
     ("********* Sudoku trÃ¨s trÃ¨s facile : grille2TresTresFacile");
   g := grille2TresTresFacile;

   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 3 --
   -------------------------------
   Put_Line ("********* Sudoku trÃ¨s facile : grille3TresFacile");
   g := grille3TresFacile;

   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 4 --
   -------------------------------
   Put_Line ("********* Sudoku facile : grille4Facile");
   g := grille4Facile;

   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 5 --
   -------------------------------
   Put_Line ("********* Sudoku facile : grille5Facile");
   g := grille5Facile;
   cpt := 0;
   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 6 --
   -------------------------------
   Put_Line ("********* Sudoku moyen : grille6Moyen");
   g := grille6Moyen;

   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 7 --
   -------------------------------
   Put_Line ("********* Sudoku difficile : grille7Difficile");
   g := grille7Difficile;

   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 8 --
   -------------------------------
   Put_Line ("********* Sudoku difficile : grille8Difficile");
   g := grille8Difficile;

   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

   -------------------------------
   -- tests resolution grille 9 --
   -------------------------------
   Put_Line ("********* Sudoku trÃ¨s difficile : grille9TresDifficile");
   g := grille9TresDifficile;

   nbChiffresDepart := nombreChiffres (g);
   resoudreSudoku (g, trouve, cpt);
   afficherResultat (g, trouve, nbChiffresDepart, cpt);

end evaluations;
