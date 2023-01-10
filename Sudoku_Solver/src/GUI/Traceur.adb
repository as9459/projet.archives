with Traceur;
with Text_IO; use Text_IO;
with Ada.Integer_Text_IO; use Ada.Integer_Text_IO;
with Ada.Numerics.Discrete_Random;


with Traceur_callbacks; use Traceur_callbacks;

package body Traceur is

	largMin:constant Integer :=1;--Borne inférieure de la zone des Nombres aléatoies;
    largMax:constant Integer :=599;-- Borne supérieure de la zone des Nombres aléatoires;	

	longMin:constant Integer :=1;--Borne inférieure de la zone des Nombres aléatoies;
    longMax:constant Integer :=799;-- Borne supérieure de la zone des Nombres aléatoires;	

	subtype IntervalleLarg is Integer range largMin .. largMax;
	subtype IntervalleLong is Integer range longMin .. longMax;
	
	package AleatoireLarg is new Ada.Numerics.Discrete_Random(IntervalleLarg);
	
	use AleatoireLarg;

	GenerateurLarg : AleatoireLarg.Generator; 
	
	package AleatoireLong is new Ada.Numerics.Discrete_Random(IntervalleLong);
	
	use AleatoireLong;

	GenerateurLong : AleatoireLong.Generator; 
	
	orientMin:constant Integer :=0;--Borne inférieure de la zone des Nombres aléatoies;
    orientMax:constant Integer :=3;-- Borne supérieure de la zone des Nombres aléatoires;
	subtype IntervalleOrient is Integer range orientMin .. orientMax;
	package AleatoireOrient is new Ada.Numerics.Discrete_Random(IntervalleOrient);
	use AleatoireOrient;
	GenerateurOrient: AleatoireOrient.Generator; 
	
	baisseMin:constant Integer :=0;--Borne inférieure de la zone des Nombres aléatoies;
    baisseMax:constant Integer :=1;-- Borne supérieure de la zone des Nombres aléatoires;
	subtype IntervalleBaisse is Integer range baisseMin .. baisseMax;
	package AleatoireBaisse is new Ada.Numerics.Discrete_Random(IntervalleBaisse);
	use AleatoireBaisse;
	GenerateurBaisse: AleatoireBaisse.Generator; 
	
	initialisationFaite :  Integer := 0;
	
   procedure centrerStylet is
    orientationStyletSauv : Orientation;
   begin
	if (initialisationFaite = 0) then
		raise traceurNonInitialise;
	end if;
    
	if baisse then
        orientationStyletSauv := orientationStylet;
		while (posX /= 400 or posY /= 300) loop
			if posX > 400 then
				orientationStylet := Ouest;
				deplacerStylet;
			else
				if posX < 400 then					
					orientationStylet := Est;
					deplacerStylet;
				end if;
			end if;
			if posY > 300 then
				orientationStylet := Nord;
				deplacerStylet;
			else
				if posY < 300 then
					orientationStylet := Sud;
					deplacerStylet;
				end if;
			end if ;
		end loop;
        orientationStylet := orientationStyletSauv ;
	else
			posX := 400;
			posY := 300;
	end if;
   end;

   procedure baisserStylet is
   begin
	   if (initialisationFaite = 0) then
			raise traceurNonInitialise;
		end if;
      contenu(posX, posY) := 1;
      baisse := TRUE;
   end;
   
    procedure leverStylet is
   begin
	   if (initialisationFaite = 0) then
			raise traceurNonInitialise;
		end if;      
      baisse := FALSE;
   end;

   procedure pivoterGauche is
   begin
   if (initialisationFaite = 0) then
		raise traceurNonInitialise;
	end if;
      case  orientationStylet is
      when  Nord =>
         orientationStylet := Ouest;
      when Sud =>
         orientationStylet := Est;
      when Est =>
         orientationStylet := Nord;
      when Ouest =>
         orientationStylet := Sud;
      end case;
   end;

   procedure orienterNord is
   begin
   if (initialisationFaite = 0) then
		raise traceurNonInitialise;
	end if;
      orientationStylet := Nord;
   end orienterNord;

   procedure pivoterDroite is
   begin
   if (initialisationFaite = 0) then
		raise traceurNonInitialise;
	end if;
      case  orientationStylet is
      when  Nord =>
         orientationStylet := Est;
      when Sud =>
         orientationStylet := Ouest;
      when Est =>
         orientationStylet := Sud;
      when Ouest =>
         orientationStylet := Nord;
      end case;
   end;

   procedure deplacerStylet is
   begin
if (initialisationFaite = 0) then
		raise traceurNonInitialise;
	end if;
      case  orientationStylet is
      when  Nord =>
         posY := posY - 1;
      when Sud =>
         posY := posY + 1;
      when Est =>
         posX := posX + 1;
      when Ouest =>
         posX := posX - 1;
      end case;


      if posX > 799 OR posX < 1 then
      	case  orientationStylet is
		  when  Nord =>
			 raise debordementNord;
		  when Sud =>
			 raise debordementSud;
		  when Est =>
			 raise debordementEst;
		  when Ouest =>
			 raise debordementOuest;
		end case;
      end if;
	  
      if posY > 599 OR posY < 1 then
		case  orientationStylet is
		  when  Nord =>
			 raise debordementNord;
		  when Sud =>
			 raise debordementSud;
		  when Est =>
			 raise debordementEst;
		  when Ouest =>
			 raise debordementOuest;
		end case;	
      end if;

      if baisse then
         contenu(posX, posY) := 1;
      end if;
   end deplacerStylet;

   
	 
   procedure dessine is
   begin

      Text_IO.Put_Line("dessine");

      deplacerStylet;

      for l in 100..500 loop
         contenu(l,250) := 1;
         --contenu(l,251) := TRUE;
      end loop;
   end dessine;

     ---------------------------------
   -- On_Main_Window_Delete_Event --
   ---------------------------------

   function On_Main_Window_Delete_Event
     (Object : access Gtk_Window_Record'Class) return Boolean
   is
      pragma Unreferenced (Object);
   begin
      Gtk.Main.Main_Quit;
      return True;
   end On_Main_Window_Delete_Event;


     ------------
   -- Redraw --
   ------------

   function Redraw (Area  : access Gtk_Drawing_Area_Record'Class;
                     Cr    : Cairo_Context) return Boolean
   is
      pragma Unreferenced (Area);
   begin
      Dessiner (Cr, Gtk_Widget (Win));
      return False;
   end Redraw;


   procedure initialiserTraceur is
   begin
	   Reset(GenerateurLarg);
	   Reset(GenerateurLong);
	   posX  := random(GenerateurLong);
	   posY  := random(GenerateurLarg);
	   
	   Reset(GenerateurOrient);
	   orientationStylet  := Orientation'Val (random(GenerateurOrient));
	   
	   Reset(GenerateurBaisse);  
	   baisse  := (IF random(GenerateurOrient) = 0 then FALSE else TRUE);
	   
	   initialisationFaite := 1;
	   
	   Gtk.Main.Init;
	   Gtk_New (Win);

	   Set_Default_Size (Win, 412, 412);

	   Set_Title(Win, "Traceur");

	   Set_Geometry_Hints(Win, null, Geometry, Mask);

	   Set_Resizable(Win, false);

	   Gtk_New (Area);
	   Win.add(Area);

	   Event_Cb.Connect (Area, Signal_Draw,
						 Event_Cb.To_Marshaller (Redraw'Unrestricted_Access));

   --   Window_Cb.Connect
   --  (Win, "delete_event",
   --   Window_Cb.To_Marshaller
   --   (On_Main_Window_Delete_Event'Unrestricted_Access));


	   --*******************************
	   for l in 1..800 loop
			 for c in 1..600 loop
				contenu(l,c) := 0;
			 end loop;
		  end loop;
		  --*******************************

	   Show_All (Win);
	end initialiserTraceur;

	procedure afficherTraceur is
	begin
		 Gtk.Main.Main;
	end afficherTraceur;


   procedure Dessiner (Cr : Cairo_Context; Win : Gtk_Widget) is
	begin

   Set_Source_Rgb (Cr, 0.0, 0.0, 0.0);
   for l in 1..800 loop
         for c in 1..600 loop
            if (contenu(l,c) = 1) then
                 Rectangle(Cr, GDouble(l), GDouble(c), GDouble(1), GDouble(1));
            end if;
         end loop;
      end loop;

      Fill (Cr);
	end Dessiner;


end Traceur;
