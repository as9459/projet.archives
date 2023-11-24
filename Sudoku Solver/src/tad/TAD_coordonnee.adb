pragma Ada_2012;
package body TAD_Coordonnee is

   ---------------------------
   -- construireCoordonnees --
   ---------------------------

   function construireCoordonnees
     (ligne : Integer; colonne : Integer) return Type_Coordonnee
   is
      coord : Type_Coordonnee;
   begin
      coord.ligne := ligne;
      coord.colonne := colonne;
      return coord;
   end construireCoordonnees;

   ------------------
   -- obtenirLigne --
   ------------------

   function obtenirLigne (c : Type_Coordonnee) return Integer is
   begin
      return c.ligne;
   end obtenirLigne;

   --------------------
   -- obtenirColonne --
   --------------------

   function obtenirColonne (c : Type_Coordonnee) return Integer is
   begin
      return c.colonne;
   end obtenirColonne;

   ------------------
   -- obtenirCarre --
   ------------------

   function obtenirCarre (c : Type_Coordonnee) return Integer is
   begin
      return 3 * ((c.ligne-1)/ 3) + ((c.colonne-1) / 3) + 1;
   end obtenirCarre;

   -------------------------------
   -- obtenirCoordonneeCarre -----
   -- Nb : On ne peut pas faire --
   -- moins de 10 lignes car -----
   -- c'est quasi-impossible -----
   -------------------------------

   function obtenirCoordonneeCarre (numCarre : Integer) return Type_Coordonnee
   is
      coord : Type_Coordonnee;
   begin
      if numCarre = 1 then
         coord.ligne := 1;
         coord.colonne := 1;
      elsif numCarre = 2 then
         coord.ligne := 1;
         coord.colonne := 4;
      elsif numCarre = 3 then
         coord.ligne := 1;
         coord.colonne := 7;
      elsif numCarre = 4 then
         coord.ligne := 4;
         coord.colonne := 1;
      elsif numCarre = 5 then
         coord.ligne := 4;
         coord.colonne := 4;
      elsif numCarre = 6 then
         coord.ligne := 4;
         coord.colonne := 7;
      elsif numCarre = 7 then
         coord.ligne := 7;
         coord.colonne := 1;
      elsif numCarre = 8 then
         coord.ligne := 7;
         coord.colonne := 4;
      elsif numCarre = 9 then
         coord.ligne := 7;
         coord.colonne := 7;
      end if;
      return coord;
   end obtenirCoordonneeCarre;
end TAD_Coordonnee;
