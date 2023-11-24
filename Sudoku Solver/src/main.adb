with Gdk.Event;       use Gdk.Event;
with Gtk.Box;         use Gtk.Box;
with Gtk.Label;       use Gtk.Label;
with Gtk.Widget;      use Gtk.Widget;
with Gtk.Main;
with Gtk.Window;      use Gtk.Window;
WITH Gtk.Grid ;         USE Gtk.Grid ;
WITH Gtk.Button ;        USE Gtk.Button ;
with button_click;    use button_click;
with traceur; use Traceur;
with Traceur_callbacks; use Traceur_callbacks;
-- programe principale GUI sudoku
procedure Main is

   Win   : Gtk_Window;
   Box   : Gtk_Vbox;
   Box2  : Gtk_Vbox;
   Box3  : Gtk_Hbox;
   Box4  : Gtk_Hbox;
   Box5  : Gtk_Hbox;
   function Delete_Event_Cb
     (Self  : access Gtk_Widget_Record'Class;
      Event : Gdk.Event.Gdk_Event)
      return Boolean;

   ---------------------
   -- Delete_Event_Cb --
   ---------------------

   function Delete_Event_Cb
     (Self  : access Gtk_Widget_Record'Class;
      Event : Gdk.Event.Gdk_Event)
      return Boolean
   is
      pragma Unreferenced (Self, Event);
   begin
      Gtk.Main.Main_Quit;
      return True;
   end Delete_Event_Cb;

begin


   --  Initialize GtkAda.
   Gtk.Main.Init;



   --   400x400
   Gtk_New (Win);
   Win.Set_Default_Size (400, 400);
   --  creation d'un box
   Gtk_New_Vbox (Box);
   Win.Add (Box);


   Gtk_New (button_click.Label, "appuyer sur le bouton pour demarrer :)");
   Box.Add (button_click.Label);


   Gtk_New_Vbox (Box2);
   Box.Add (Box2);


   Gtk_New_Hbox (Box3);
   Box2.Add (Box3);


   Gtk_New_Hbox (Box4);
   Box3.Add (Box4);


   Gtk_New_Hbox (Box5);
   Box3.Add (Box5);


   Gtk_New (button_click.Button, "Grille non resolu");
   Box4.Add (button_click.Button);
   On_Clicked(button_click.Button, button_clicked'Access);


   Gtk_New (button_click.Button2, "resoudre Grille");
   Box5.Add (button_click.Button2);
   On_Clicked(button_click.Button2, button_clicked'Access);


   Gtk_New (button_click.Button3, "Run all tests");
   Box2.Add (button_click.Button3);
   On_Clicked(button_click.Button3, button_clicked'Access);


   -- arreter
   Win.On_Delete_Event (Delete_Event_Cb'Unrestricted_Access);

   --  montrer
   Win.Show_All;
   Win.Present;

   Gtk.Main.Main;
end Main;
