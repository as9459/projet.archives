with Traceur; use Traceur;
with TAD_grilleSudoku; use TAD_grilleSudoku;
with remplirGrille; use remplirGrille;
with TAD_Coordonnee; use TAD_Coordonnee;
with resolutions; use resolutions;
package dessin is

   procedure dessinerGrille;
   procedure dessinerUn;
   procedure dessinerDeux;
   procedure dessinerTrois;
   procedure dessinerQuatre;
   procedure dessinerCinq;
   procedure dessinerSix;
   procedure dessinerSept;
   procedure dessinerHuit;
   procedure dessinerNeuf;
   procedure placerNombre( i : in Integer; x : Integer; y : Integer);
   procedure remplirGrileD(nu : in Integer);

end dessin;
