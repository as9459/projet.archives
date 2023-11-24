package TAD_Coordonnee is

   type Type_Coordonnee is private;

   -- retourne la valeur d'une Coordonnee
   function construireCoordonnees
     (ligne   : Integer;
      colonne : Integer) return Type_Coordonnee;

   -- retourne le numero de la ligne dans lequel se trouve la coordonnee c
   function obtenirLigne (c : Type_Coordonnee) return Integer;

   -- retourne le numero de la colonne dans lequel se trouve la coordonnee c
   function obtenirColonne (c : Type_Coordonnee) return Integer;

   -- retourne le numero du carre dans lequel se trouve la coordonnee c
   function obtenirCarre (c : Type_Coordonnee) return Integer;

   -- retourne les coordonnees en haut a droite du carre numCarre
   function obtenirCoordonneeCarre (numCarre : Integer) return Type_Coordonnee;

private
   type Type_Coordonnee is record
      ligne   : Integer; -- ligne d'une coordonnée
      colonne : Integer; -- colonne d'une coordonnée
   end record;

end TAD_Coordonnee;
