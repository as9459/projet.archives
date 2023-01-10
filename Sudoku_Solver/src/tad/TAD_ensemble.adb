pragma Ada_2012;
package body TAD_ensemble is

   ------------------------
   -- construireEnsemble --
   ------------------------

   function construireEnsemble return Type_Ensemble is
      ensemble : Type_Ensemble;
   begin
      for k in 1..9 loop
         ensemble(k) := False;
      end loop;
      return ensemble;
   end construireEnsemble;

   ------------------
   -- ensembleVide --
   ------------------

   function ensembleVide (e : in Type_Ensemble) return Boolean is
   begin
      for k in 1..9 loop
         if e(k) = True then
            return False;
         end if;
      end loop;
      return True;
   end ensembleVide;

   -----------------------
   -- appartientChiffre --
   -----------------------

   function appartientChiffre
     (e : in Type_Ensemble; v : Integer) return Boolean is
   begin
      if e(v) then
         return True;
      end if;
      return False;
   end appartientChiffre;

   --------------------
   -- nombreChiffres --
   --------------------

   function nombreChiffres (e : in Type_Ensemble) return Integer is
      compteur : Integer;
   begin
      compteur:=0;
      for k in 1..9 loop
         if e(k) = True then
            compteur := compteur+1;
         end if;
      end loop;
      return compteur;
   end nombreChiffres;

   --------------------
   -- ajouterChiffre --
   --------------------

   procedure ajouterChiffre (e : in out Type_Ensemble; v : in Integer) is
   begin
      if appartientChiffre(e,v) = True then
         raise APPARTIENT_ENSEMBLE;
      end if;
      e(v) := True;
   end ajouterChiffre;

   --------------------
   -- retirerChiffre --
   --------------------

   procedure retirerChiffre (e : in out Type_Ensemble; v : in Integer) is
   begin
      if appartientChiffre(e,v) = False then
         raise NON_APPARTIENT_ENSEMBLE;
      end if;
      e(v) := False;
   end retirerChiffre;

end TAD_ensemble;
