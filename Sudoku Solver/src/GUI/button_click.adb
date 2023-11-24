pragma Ada_2012;
package body button_click is

   --------------------
   -- button_clicked --
   --------------------

   procedure button_clicked (Self : access Gtk_Button_Record'Class) is
   begin
       if Self = Button then
         Set_Text(Label, "Grille 6 est ouvert");
         initialiserTraceur;
         leverStylet;
         centrerStylet;
         dessinerGrille;
         remplirGrileD(1);
         afficherTraceur;
      elsif Self = Button2 then
         Set_Text(Label, "Grille 6 resolution");
         initialiserTraceur;
         leverStylet;
         centrerStylet;
         dessinerGrille;
         remplirGrileD(2);
         afficherTraceur;
      else
         if test_Resolution_Grille_1 and
           test_Resolution_Grille_2 and
           test_Resolution_Grille_3 and
           test_Resolution_Grille_4 and
           test_Resolution_Grille_5 and
           test_Resolution_Grille_6 and
           test_Resolution_Grille_7 and
           test_Resolution_Grille_8 and
           test_Resolution_Grille_9 and
           test_Ensemble_P1 and
           test_Ensemble_P2 and
           test_Ensemble_P3 and
           test_Ensemble_P4 and
           test_Ensemble_P5a and
           test_Ensemble_P5b and
           test_Ensemble_P6 and
           test_Ensemble_P7a and
             test_Ensemble_P7b and
             test_Ensemble_P8 and
             test_Ensemble_Exception1 and
             test_Ensemble_Exception2 and
             test_Coordonnees_P1 and
             test_Coordonnees_P2 and
             test_Coordonnees_P3a and
             test_Coordonnees_P3b and
             test_Coordonnees_P3c and
             test_Coordonnees_P3d and
             test_Coordonnees_P3e and
             test_Coordonnees_P3f and
             test_Coordonnees_P3g and
             test_Coordonnees_P3h and
             test_Coordonnees_P3i and
             test_Coordonnees_P3 and
             test_Coordonnees_P4 and
             test_Grille_P1 and
             test_Grille_P2 and
             test_Grille_P3 and
             test_Grille_P4 and
             test_Grille_P5 and
             test_Grille_P6 and
             test_Grille_P7a and
             test_Grille_P7b and
             test_Grille_P8 and
             test_Grille_P9 and
             test_Grille_P10a and
             test_Grille_P10b and
             test_Grille_P11 and
             test_Grille_P12 and
             test_Grille_P13 and
             test_Grille_P14a and
             test_Grille_P14b and
             test_Grille_P15 and
             test_Grille_P16 and
             test_Grille_P17 and
             test_Grille_P18 and
             test_Grille_P19 and
             test_Grille_Exception1 and
             test_Grille_Exception2 and
           test_Grille_Exception3 then
            Set_Text(Label, "Tous les tests sont OK");
         else
            Set_Text(Label, "Il y a des erreurs");
         end if;




      end if;
   end button_clicked;

end button_click;
