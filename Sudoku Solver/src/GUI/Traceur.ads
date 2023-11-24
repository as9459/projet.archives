with Glib; use Glib;
with Cairo;         use Cairo;
with Gdk.Window;   use Gdk.Window;
with Gtk.Main;
with Gtk.Drawing_Area;  use Gtk.Drawing_Area;
with Gtk.Widget;   use Gtk.Widget;
with Gtk.Window;   use Gtk.Window;

package Traceur is
   type MATRICE is array (1..800, 1..600) of Integer;
	traceurNonInitialise : exception;
	debordementEst : exception;
	debordementNord : exception;
	debordementSud : exception;
	debordementOuest : exception;
   
   Win  : Gtk_Window;
   Area : Gtk_Drawing_Area;
   Geometry : Gdk_Geometry := (800,600, 800, 600, 800, 600, 1, 1, 1.0, 1.0, Gravity_Center);
   Mask : Gdk_Window_Hints := 7;

   modif : Boolean := FALSE;

   contenu : MATRICE;

	posX :Integer := 160 ;
	posY : Integer := 175;
	
   baisse : Boolean := FALSE;

   initialise : Boolean := FALSE;

  type Orientation is (Nord, Sud, Est, Ouest);
  orientationStylet : Orientation := Est;

   procedure leverStylet;
   procedure baisserStylet;
   procedure deplacerStylet;
   procedure centrerStylet;
   procedure pivoterDroite;
   procedure pivoterGauche;
   procedure orienterNord;
   
   procedure Dessiner (Cr : Cairo_Context; Win : Gtk_Widget);

   function Redraw (Area  : access Gtk_Drawing_Area_Record'Class;
                    Cr    : Cairo_Context) return Boolean;
   --  Callback on an draw event on Win

   function On_Main_Window_Delete_Event
     (Object : access Gtk_Window_Record'Class) return Boolean;
   --  Callback for delete_event on the main window.

   procedure initialiserTraceur ;

   procedure afficherTraceur;

end Traceur;
