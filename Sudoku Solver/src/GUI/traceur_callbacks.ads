--  with Cairo; use Cairo;
with Gtk.Drawing_Area; use Gtk.Drawing_Area;
with Gtk.Handlers; use Gtk.Handlers;
with Gtk.Widget; use Gtk.Widget;
with Gtk.Window; use Gtk.Window;

package Traceur_callbacks is

   package Window_Cb is new Gtk.Handlers.Return_Callback
      (Gtk_Window_Record, Boolean);

   package Event_Cb is new Gtk.Handlers.Return_Callback
     (Gtk_Drawing_Area_Record, Boolean);

end Traceur_callbacks;
