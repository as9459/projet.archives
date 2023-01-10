pragma Ada_2012;
package body TAD_grilleSudoku is

   ----------------------
   -- construireGrille --
   ----------------------

   function construireGrille return Type_Grille is
      grille:Type_Grille;
   begin
      for i in 1..9 loop
         for z in 1..9 loop
            grille(i,z) := 0;
         end loop;
      end loop;
   return grille;
   end construireGrille;

   --------------
   -- caseVide --
   --------------

   function caseVide
     (g : in Type_Grille; c : in Type_Coordonnee) return Boolean
   is
   begin
     if g(obtenirLigne(c),obtenirColonne(c)) < 1 then
      return True;
   else
      return False;
     end if;
   end caseVide;

   --------------------
   -- obtenirChiffre --
   --------------------

   function obtenirChiffre
     (g : in Type_Grille; c : in Type_Coordonnee) return Integer is
   begin
      if caseVide(g,c) then
         raise OBTENIR_CHIFFRE_NUL;
      end if;
      return g(obtenirLigne(c),obtenirColonne(c));
   end obtenirChiffre;

   --------------------
   -- nombreChiffres --
   --------------------

   function nombreChiffres (g : in Type_Grille) return Integer is
      Nb_Chiffres: integer;
   begin
      Nb_Chiffres := 0;
      for i in 1..9 loop
         for z in 1..9 loop
            if g(i,z) /= 0 then
               Nb_Chiffres := Nb_Chiffres + 1;
            end if;
         end loop;
      end loop;
      return Nb_Chiffres;
   end nombreChiffres;

   ------------------
   -- fixerChiffre --
   ------------------

   procedure fixerChiffre
     (g : in out Type_Grille; c : in Type_Coordonnee; v : in Integer; cpt : in out Integer) is
   begin
      if caseVide(g,c) then
         g(obtenirLigne(c),obtenirColonne(c)):= v;
      else
         raise FIXER_CHIFFRE_NON_NUL;
      end if;
      cpt := cpt+1;
   end fixerChiffre;

   ---------------
   -- viderCase --
   ---------------

   procedure viderCase (g : in out Type_Grille; c : in out Type_Coordonnee) is
      begin
         if caseVide(g,c) then
            raise VIDER_CASE_VIDE;
         end if;
         g(obtenirLigne(c),obtenirColonne(c)) := 0;
   end viderCase;

   ----------------
   -- estRemplie --
   ----------------

   function estRemplie (g : in Type_Grille) return Boolean is
      coord :Type_Coordonnee;
   begin
      for i in 1 .. 9 loop
         for z in 1 .. 9 loop
            coord := construireCoordonnees(i,z);
            if caseVide(g,coord) then
               return false;
            end if;
         end loop;
      end loop;
      return true;
   end estRemplie;

   ------------------------------
   -- obtenirChiffresDUneLigne --
   ------------------------------

   function obtenirChiffresDUneLigne
     (g : in Type_Grille; numLigne : in Integer) return Type_Ensemble is
      coord: Type_Coordonnee;
      ligneC: Type_Ensemble;
   begin
      ligneC := construireEnsemble;
      for i in 1..9 loop
         coord := construireCoordonnees(numLigne,i);
         if not caseVide(g,coord) then
            ajouterChiffre(ligneC,obtenirChiffre(g,coord));
         end if;
      end loop;
      return ligneC;
   end obtenirChiffresDUneLigne;

   --------------------------------
   -- obtenirChiffresDUneColonne --
   --------------------------------

   function obtenirChiffresDUneColonne(g : in Type_Grille; numColonne : in Integer) return Type_Ensemble is
      Colonne : Type_Ensemble;
      coord : Type_Coordonnee;
      begin
      Colonne := construireEnsemble;
         for i in 1..9 loop
            coord := construireCoordonnees(i,numColonne);
            if not caseVide(g,coord) then
               ajouterChiffre(Colonne,obtenirChiffre(g,coord));
         end if;
      end loop;
      return colonne;
      end obtenirChiffresDUneColonne;

   -----------------------------
   -- obtenirChiffresDUnCarre --
   -----------------------------

   function obtenirChiffresDUnCarre
     (g : in Type_Grille; numCarre : in Integer) return Type_Ensemble
   is
         Un_Carre : Type_Ensemble;
         coord :Type_Coordonnee;
         ligneC : integer;
         cord :integer;

      begin
         Un_Carre := construireEnsemble;
         coord := obtenirCoordonneeCarre(numCarre);
         ligneC := obtenirLigne(coord);
         cord := obtenirColonne(coord);

         for i in 1..3 loop
            for z in 1..3 loop
               coord := construireCoordonnees(i + ligneC-1,z + cord - 1);
               if not caseVide(g,coord) then
                  ajouterChiffre(Un_Carre,obtenirChiffre(g,coord));
               end if;
            end loop;
         end loop;
      return Un_Carre;
   end obtenirChiffresDUnCarre;

end TAD_grilleSudoku;
