pragma Ada_2012;
package body dessin is

   --------------------
   -- dessinerGrille --
   --------------------

   procedure dessinerGrille is
   begin
      -- se positionner au centre sans tracer
      leverStylet;
      centrerStylet;
      --baisserStylet;

      -- orienter le stylet vers le nord
      orienterNord;

      -- haux gauche
      for i in 1..2 loop
         for c in 1..280 loop
            deplacerStylet;
         end loop;
         pivoterGauche;
      end loop;
      for i in 1..10 loop
         orienterNord;
            pivoterGauche;
            pivoterGauche;

         baisserStylet;
         for y in 1..2 loop
            for x in 1..512 loop
               deplacerStylet;
            end loop;
            leverStylet;
            orienterNord;
         end loop;
         pivoterDroite;
         for y in 1..60 loop
            deplacerStylet;
         end loop;
      end loop;
      pivoterDroite;
      pivoterDroite;
      for i in 1.. 60 loop
         deplacerStylet;
      end loop;

      for i in 1..10 loop
         orienterNord;
         pivoterGauche;

         baisserStylet;
         for y in 1..2 loop
            for x in 1..540 loop
               deplacerStylet;
            end loop;
            leverStylet;
            pivoterDroite;
            pivoterDroite;
         end loop;
         pivoterGauche;
      for y in 1..57 loop
            deplacerStylet;
         end loop;
      end loop;

      -- revenir au centre sans tracer
      --leverStylet;
      centrerStylet;
   end dessinerGrille;

   ----------------
   -- dessinerUn --
   ----------------

   procedure dessinerUn is
   begin
      leverStylet;
      orienterNord;
      for i in 1..2 loop
         pivoterDroite;
         for x in 1..22 loop
            deplacerStylet;
         end loop;
      end loop;
      pivoterGauche;
      for i in 1..6 loop
         deplacerStylet;
      end loop;
      orienterNord;
      baisserStylet;
      for i in 1..3 loop
         deplacerStylet;
         pivoterDroite;
         deplacerStylet;
         pivoterGauche;
      end loop;
      leverStylet;
      orienterNord;
      pivoterGauche;
      pivoterGauche;
      baisserStylet;
      for i in 1..20 loop
         deplacerStylet;
      end loop;
      leverStylet;
      pivoterDroite;
      baisserStylet;
      for x in 1..2 loop
         for i in 1..3 loop
            deplacerStylet;
         end loop;
         pivoterGauche;
         pivoterGauche;
      end loop;
      orienterNord;
      pivoterDroite;
      for i in 1..3 loop
         deplacerStylet;
      end loop;
      leverStylet;
   end dessinerUn;

   ------------------
   -- dessinerDeux --
   ------------------

   procedure dessinerDeux is
      c1, c2, c3, c4, c5, c6 : Integer;
   begin
      leverStylet;
      orienterNord;
      for i in 1..2 loop
         pivoterDroite;
         for x in 1..25 loop
            deplacerStylet;
         end loop;
      end loop;
      orienterNord;
      baisserStylet;
      c1 := 0;
      while c1 < 5 loop
         deplacerStylet;
         pivoterDroite;
         deplacerStylet;
         pivoterGauche;
         c1 := c1 + 1;
      end loop;
      pivoterDroite;
      c2 := 0;
      while c2 < 4 loop
         deplacerStylet;
         c2 := c2 + 1;
      end loop;
      pivoterDroite;

      c3 := 0;
      while c3 < 5 loop
         deplacerStylet;
         pivoterGauche;
         deplacerStylet;
         pivoterDroite;
         c3 := c3 + 1;
      end loop;
      pivoterDroite;

      c4 := 0;
      while c4 < 1 loop
         deplacerStylet;
         c4 := c4 + 1;
      end loop;
      pivoterGauche;

      c5 := 0;
      while c5 < 12 loop
         deplacerStylet;
         pivoterDroite;
         deplacerStylet;
         pivoterGauche;
         c5 := c5 + 1;
      end loop;

      orienterNord;
      pivoterDroite;
      c6 := 0;
      while c6 < 12 loop
         deplacerStylet;
         c6 := c6 + 1;
      end loop;

      leverStylet;
   end dessinerDeux;

   -------------------
   -- dessinerTrois --
   -------------------

   procedure dessinerTrois is
   begin

      leverStylet;

      orienterNord;
      for i in 1..2 loop
         pivoterDroite;
         for x in 1..25 loop
            deplacerStylet;
         end loop;
      end loop;
      baisserStylet;
      orienterNord;

      for i in 1..4 loop
         deplacerStylet;
         pivoterDroite;
         deplacerStylet;
         pivoterGauche;
      end loop;
      pivoterDroite;


      for j in 1..3 loop
         deplacerStylet;
      end loop;
      pivoterDroite;


      for k in 1..4 loop
         deplacerStylet;
         pivoterGauche;
         deplacerStylet;
         pivoterDroite;
      end loop;
      orienterNord;
      pivoterDroite;
      pivoterDroite;

      for l in 1..3 loop
         deplacerStylet;
      end loop;
      pivoterDroite;

      for m in 1..3 loop
         deplacerStylet;
         pivoterGauche;
         deplacerStylet;
         pivoterDroite;
      end loop;

      orienterNord;
      pivoterDroite;
      for n in 1..4 loop
         deplacerStylet;
         pivoterDroite;
         deplacerStylet;
         pivoterGauche;
      end loop;
      pivoterDroite;


      for o in 1..3 loop
         deplacerStylet;
      end loop;
      pivoterDroite;


      for p in 1..4 loop
         deplacerStylet;
         pivoterGauche;
         deplacerStylet;
         pivoterDroite;
      end loop;
      orienterNord;
      pivoterGauche;

      for q in 1..3 loop
         deplacerStylet;
      end loop;

      pivoterDroite;
      for r in 1..4 loop
         deplacerStylet;
         pivoterGauche;
         deplacerStylet;
         pivoterDroite;
      end loop;

      leverStylet;
   end dessinerTrois;

   --------------------
   -- dessinerQuatre --
   --------------------

   procedure dessinerQuatre is
   begin
      leverStylet;
      orienterNord;
      for i in 1..2 loop
         pivoterDroite;
         for x in 1..22 loop
            deplacerStylet;
         end loop;
      end loop;
      baisserStylet;
      orienterNord;

      pivoterDroite;
      pivoterDroite;

      for k in 1..10 loop
         deplacerStylet;
      end loop;
      pivoterGauche;
      for k in 1..10 loop
         deplacerStylet;
      end loop;
      pivoterGauche;
      for k in 1..10 loop
         deplacerStylet;
      end loop;
      pivoterDroite;
      pivoterDroite;
      for k in 1..22 loop
         deplacerStylet;
      end loop;

      leverStylet;
   end dessinerQuatre;

   ------------------
   -- dessinerCinq --
   ------------------

   procedure dessinerCinq is
   begin
      leverStylet;
      orienterNord;
      for i in 1..2 loop
         pivoterDroite;
         for x in 1..15 loop
            deplacerStylet;
         end loop;
      end loop;
      pivoterGauche;
      for i in 1..18 loop
         deplacerStylet;
      end loop;

      orienterNord;
      baisserStylet;
      pivoterGauche;



      for i in 1..10 loop
         deplacerStylet;
      end loop;

      pivoterGauche;

      for Z in 1..10 loop
         deplacerStylet;

      end loop;
      pivoterGauche;
      for k in 1..10 loop
         deplacerStylet;

      end loop;
      pivoterDroite;

      for p in 1..10 loop
         deplacerStylet;

      end loop;
      pivoterDroite;
      for l in 1..10 loop
         deplacerStylet;
      end loop;

    -- postcondition
      leverStylet;
   end dessinerCinq;

   -----------------
   -- dessinerSix --
   -----------------

   procedure dessinerSix is
   begin
      leverStylet;
			orienterNord;
      for i in 1..2 loop
         pivoterDroite;
         for x in 1..18 loop
            deplacerStylet;
         end loop;
      end loop;
      pivoterGauche;
      for i in 1..18 loop
         deplacerStylet;
      end loop;
      baisserStylet;
      orienterNord;
      pivoterGauche;

      for i in 1..10 loop
         deplacerStylet;
      end loop;
      pivoterGauche;

      for j in 1..20 loop
         deplacerStylet;
      end loop;
      pivoterGauche;

      for k in 1..10 loop
         deplacerStylet;
      end loop;
      pivoterGauche;

      for l in 1..10 loop
         deplacerStylet;
      end loop;
      pivoterGauche;

      for m in 1..10 loop
         deplacerStylet;
      end loop;

      leverStylet;
   end dessinerSix;

   ------------------
   -- dessinerSept --
   ------------------

   procedure dessinerSept is
      c1 : Integer;
   begin
      leverStylet;
      orienterNord;
      for i in 1..2 loop
         pivoterDroite;
         for x in 1..22 loop
            deplacerStylet;
         end loop;
      end loop;
      baisserStylet;

		orienterNord;
        pivoterDroite;

		C1:= 0;
		while C1 < 10 loop
			deplacerStylet;
			C1:= C1 + 1;
		end loop;

		pivoterDroite;

		C1:= 0;
		while C1 <7  loop
         deplacerStylet;
         deplacerStylet;
         deplacerStylet;
         pivoterDroite;
         deplacerStylet;
         pivoterGauche;
			C1:= C1 + 1;
      end loop;
      leverStylet;
   end dessinerSept;

   ------------------
   -- dessinerHuit --
   ------------------

   procedure dessinerHuit is
   begin
      leverStylet;
      orienterNord;
      for i in 1..2 loop
         pivoterDroite;
         for x in 1..27 loop
            deplacerStylet;
         end loop;
      end loop;
      orienterNord;
      baisserStylet;
      orienterNord;
      for k in 1..4 loop
         for i in 1..8 loop
               deplacerStylet;
            end loop;
            pivoterDroite;
            deplacerStylet;
            pivoterGauche;
            deplacerStylet;
         pivoterDroite;
      end loop;
      pivoterGauche;
      pivoterGauche;
      for k in 1..3 loop
         for k in 1..8 loop
            deplacerStylet;
         end loop;
         if k /= 3 then
            pivoterGauche;
            deplacerStylet;
            pivoterDroite;
            deplacerStylet;
            pivoterGauche;
         end if;
      end loop;
      leverStylet;
   end dessinerHuit;

   ------------------
   -- dessinerNeuf --
   ------------------

   procedure dessinerNeuf is
   begin
      leverStylet;
      orienterNord;
      for i in 1..2 loop
         pivoterDroite;
         for x in 1..20 loop
            deplacerStylet;
         end loop;
      end loop;
      pivoterGauche;
      for i in 1..5 loop
         deplacerStylet;
      end loop;

      baisserStylet;
      orienterNord;
      pivoterDroite;
      for i in 1..4 loop
			for m in 1..12 loop
         deplacerStylet;
         end loop;
         pivoterDroite;
      end loop;
      for i in 1..12 loop
         deplacerStylet;
      end loop;
      pivoterDroite;

      for j in 1..18 loop
         deplacerStylet;
      end loop;
      pivoterDroite;

      for k in 1..12 loop
         deplacerStylet;
      end loop;
      pivoterGauche;

      leverStylet;
   end dessinerNeuf;

   ------------------
   -- placerNombre --
   ------------------

   procedure placerNombre( i : in Integer; x : Integer; y : Integer) is
      g : Type_Grille := construireGrille;
      c : Type_Coordonnee;
      n : Integer;
      trouve : Boolean;
      cp : Integer;
   begin
      if  i = 1 then
         g := grille6Moyen;
      elsif  i = 2 then
         g := grille6Moyen;
         resoudreSudoku(g, trouve, cp);
      end if;
      c := construireCoordonnees(x, y);
      if not caseVide(g,c) then
         n := obtenirChiffre(g, c);
         if n = 1 then
            dessinerUn;
         elsif n = 2 then
            dessinerDeux;
         elsif n = 3 then
            dessinerTrois;
         elsif n = 4 then
            dessinerQuatre;
         elsif n = 5 then
            dessinerCinq;
         elsif n = 6 then
            dessinerSix;
         elsif n = 7 then
            dessinerSept;
         elsif n = 8 then
            dessinerHuit;
         elsif n = 9 then
            dessinerNeuf;
         end if;
      end if;

   end placerNombre;

   procedure remplirGrileD(nu : in Integer) is
      a, b : Integer;
   begin
      leverStylet;
      for i in 0..8 loop
         for j in 0..8 loop
            centrerStylet;
            orienterNord;
            for y in 1..2 loop
               for x in 1..280 loop
                  deplacerStylet;
               end loop;
               pivoterGauche;
            end loop;
            orienterNord;
            -- caclus pour le case courant
            pivoterDroite;
            if i /= 0 then
               for x in 1..i*60 loop
                  deplacerStylet;
               end loop;
            end if;
            orienterNord;
            pivoterDroite;
            pivoterDroite;
            if j /= 0 then
               for y in 1..j*57 loop
                  deplacerStylet;
               end loop;
            end if;
            placerNombre(nu, j + 1, i + 1);
         end loop;
      end loop;
      end remplirGrileD;
end dessin;
