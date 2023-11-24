with Gtk.Button;  use Gtk.Button;
with Gtk.Label;       use Gtk.Label;
with Traceur; use Traceur;
with dessin; use dessin;
with tests_Resolutions; use tests_Resolutions;
with tests_TAD_Coordonnee; use tests_TAD_Coordonnee;
with tests_TAD_Ensemble; use tests_TAD_Ensemble;
with tests_TAD_Grille; use tests_TAD_Grille;
package button_click is

   Button: Gtk_Button;
   Button2: Gtk_Button;
   Button3: Gtk_Button;
   Label : Gtk_Label;
   procedure button_clicked (Self : access Gtk_Button_Record'Class);

end button_click;
