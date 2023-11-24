pragma Ada_2012;
package body resolutions is

   -----------------------
   -- estChiffreValable --
   -----------------------

   function estChiffreValable
     (g : in Type_Grille; v : Integer; c : Type_Coordonnee) return Boolean
   is
   begin
      if not caseVide (g, c) then
         raise CASE_NON_VIDE;
      end if;
      if appartientChiffre (obtenirChiffresDUneLigne (g, obtenirLigne (c)), v)
      then
         return False;
      end if;
      if appartientChiffre
          (obtenirChiffresDUneColonne (g, obtenirColonne (c)), v)
      then
         return False;
      end if;
      if appartientChiffre (obtenirChiffresDUnCarre (g, obtenirCarre (c)), v)
      then
         return False;
      end if;
      return True;
   end estChiffreValable;

   -------------------------------
   -- obtenirSolutionsPossibles --
   -------------------------------

   function obtenirSolutionsPossibles
     (g : in Type_Grille; c : in Type_Coordonnee) return Type_Ensemble
   is
      e : Type_Ensemble;
   begin
      if not caseVide (g, c) then
         raise CASE_NON_VIDE;
      end if;
      e := construireEnsemble;
      for v in 1 .. 9 loop
         if estChiffreValable (g, v, c) then
            ajouterChiffre (e, v);
         end if;
      end loop;
      return e;
   end obtenirSolutionsPossibles;

   ------------------------------------------
   -- rechercherSolutionUniqueDansEnsemble --
   ------------------------------------------

   function rechercherSolutionUniqueDansEnsemble
     (resultats : in Type_Ensemble) return Integer
   is
      i   : Integer;
      res : Integer;
   begin
      i := 0;
      if ensembleVide (resultats) then
         raise ENSEMBLE_VIDE;
      end if;
      if nombreChiffres(resultats) /= 1 then
         raise PLUS_DE_UN_CHIFFRE;
      end if;
      for x in 1 .. 9 loop
         if appartientChiffre (resultats, x) then
            res := x;
         end if;
      end loop;

      return res;
   end rechercherSolutionUniqueDansEnsemble;

   --------------------
   -- resoudreSudoku --
   --------------------

   procedure resoudreSudoku (g : in out Type_Grille; trouve : out Boolean; cpt : out Integer) is
      c       : Type_Coordonnee;
      ens     : Type_Ensemble;
      temp    : Type_Grille;
      change  : Boolean;
      x, y, z, n, ct: Integer;
   begin
      ct := 0;
      n := 0;
      trouve := False;
      change := True;
      while not trouve and change loop
         change := False;
         for i in 1 .. 9 loop
            for j in 1 .. 9 loop
               c := construireCoordonnees (i, j);
               if caseVide (g, c) then
                  ens := obtenirSolutionsPossibles (g, c);
                  if nombreChiffres (ens) = 1 then
                     fixerChiffre (g, c, rechercherSolutionUniqueDansEnsemble (ens), n);
                     change := True;
                  end if;
               end if;
            end loop;
         end loop;
         trouve := estRemplie (g);
      end loop;
      x      := 0;
      y      := 1;
      change := True;
      while not trouve and change loop
         if x = 9 then
            x := 1;
            y := y + 1;
         else
            x := x + 1;
         end if;
         c := construireCoordonnees (y, x);
         if caseVide (g, c) then
            ens := obtenirSolutionsPossibles (g, c);
            z   := 1;
            while not trouve and change loop
               if appartientChiffre (ens, z) then
                  temp := g;
                  fixerChiffre (temp, c, z, n);
                  resoudreSudoku (temp, trouve, ct);
                  trouve := estRemplie (temp);
                  if trouve then
                     g := temp;
                  end if;
                  trouve := estRemplie (g);
               end if;
               z := z + 1;
               if z = 10 then
                  change := False;
               end if;
            end loop;
         end if;
         if x = 9 and y = 9 then
            change := False;
         end if;
      end loop;
      cpt:= n + ct;
   end resoudreSudoku;
end resolutions;
