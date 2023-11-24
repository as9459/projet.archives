pragma Warnings (Off);
pragma Ada_95;
pragma Source_File_Name (ada_main, Spec_File_Name => "b__trait.ads");
pragma Source_File_Name (ada_main, Body_File_Name => "b__trait.adb");
pragma Suppress (Overflow_Check);
with Ada.Exceptions;

package body ada_main is

   E065 : Short_Integer; pragma Import (Ada, E065, "system__os_lib_E");
   E016 : Short_Integer; pragma Import (Ada, E016, "ada__exceptions_E");
   E012 : Short_Integer; pragma Import (Ada, E012, "system__soft_links_E");
   E010 : Short_Integer; pragma Import (Ada, E010, "system__exception_table_E");
   E033 : Short_Integer; pragma Import (Ada, E033, "ada__containers_E");
   E061 : Short_Integer; pragma Import (Ada, E061, "ada__io_exceptions_E");
   E007 : Short_Integer; pragma Import (Ada, E007, "ada__strings_E");
   E048 : Short_Integer; pragma Import (Ada, E048, "ada__strings__maps_E");
   E052 : Short_Integer; pragma Import (Ada, E052, "ada__strings__maps__constants_E");
   E071 : Short_Integer; pragma Import (Ada, E071, "interfaces__c_E");
   E019 : Short_Integer; pragma Import (Ada, E019, "system__exceptions_E");
   E073 : Short_Integer; pragma Import (Ada, E073, "system__object_reader_E");
   E042 : Short_Integer; pragma Import (Ada, E042, "system__dwarf_lines_E");
   E090 : Short_Integer; pragma Import (Ada, E090, "system__soft_links__initialize_E");
   E032 : Short_Integer; pragma Import (Ada, E032, "system__traceback__symbolic_E");
   E374 : Short_Integer; pragma Import (Ada, E374, "ada__assertions_E");
   E139 : Short_Integer; pragma Import (Ada, E139, "ada__numerics_E");
   E094 : Short_Integer; pragma Import (Ada, E094, "ada__strings__utf_encoding_E");
   E100 : Short_Integer; pragma Import (Ada, E100, "ada__tags_E");
   E005 : Short_Integer; pragma Import (Ada, E005, "ada__strings__text_buffers_E");
   E188 : Short_Integer; pragma Import (Ada, E188, "gnat_E");
   E162 : Short_Integer; pragma Import (Ada, E162, "interfaces__c__strings_E");
   E112 : Short_Integer; pragma Import (Ada, E112, "ada__streams_E");
   E124 : Short_Integer; pragma Import (Ada, E124, "system__file_control_block_E");
   E123 : Short_Integer; pragma Import (Ada, E123, "system__finalization_root_E");
   E121 : Short_Integer; pragma Import (Ada, E121, "ada__finalization_E");
   E120 : Short_Integer; pragma Import (Ada, E120, "system__file_io_E");
   E166 : Short_Integer; pragma Import (Ada, E166, "system__storage_pools_E");
   E164 : Short_Integer; pragma Import (Ada, E164, "system__finalization_masters_E");
   E183 : Short_Integer; pragma Import (Ada, E183, "system__storage_pools__subpools_E");
   E145 : Short_Integer; pragma Import (Ada, E145, "ada__calendar_E");
   E110 : Short_Integer; pragma Import (Ada, E110, "ada__text_io_E");
   E168 : Short_Integer; pragma Import (Ada, E168, "system__pool_global_E");
   E143 : Short_Integer; pragma Import (Ada, E143, "system__random_seed_E");
   E157 : Short_Integer; pragma Import (Ada, E157, "glib_E");
   E160 : Short_Integer; pragma Import (Ada, E160, "gtkada__types_E");
   E265 : Short_Integer; pragma Import (Ada, E265, "gdk__frame_timings_E");
   E199 : Short_Integer; pragma Import (Ada, E199, "glib__glist_E");
   E239 : Short_Integer; pragma Import (Ada, E239, "gdk__visual_E");
   E201 : Short_Integer; pragma Import (Ada, E201, "glib__gslist_E");
   E193 : Short_Integer; pragma Import (Ada, E193, "gtkada__c_E");
   E179 : Short_Integer; pragma Import (Ada, E179, "glib__object_E");
   E181 : Short_Integer; pragma Import (Ada, E181, "glib__type_conversion_hooks_E");
   E195 : Short_Integer; pragma Import (Ada, E195, "glib__types_E");
   E197 : Short_Integer; pragma Import (Ada, E197, "glib__values_E");
   E187 : Short_Integer; pragma Import (Ada, E187, "gtkada__bindings_E");
   E219 : Short_Integer; pragma Import (Ada, E219, "cairo_E");
   E221 : Short_Integer; pragma Import (Ada, E221, "cairo__region_E");
   E226 : Short_Integer; pragma Import (Ada, E226, "gdk__rectangle_E");
   E213 : Short_Integer; pragma Import (Ada, E213, "glib__generic_properties_E");
   E261 : Short_Integer; pragma Import (Ada, E261, "gdk__color_E");
   E229 : Short_Integer; pragma Import (Ada, E229, "gdk__rgba_E");
   E224 : Short_Integer; pragma Import (Ada, E224, "gdk__event_E");
   E348 : Short_Integer; pragma Import (Ada, E348, "glib__key_file_E");
   E211 : Short_Integer; pragma Import (Ada, E211, "glib__properties_E");
   E279 : Short_Integer; pragma Import (Ada, E279, "glib__string_E");
   E277 : Short_Integer; pragma Import (Ada, E277, "glib__variant_E");
   E275 : Short_Integer; pragma Import (Ada, E275, "glib__g_icon_E");
   E207 : Short_Integer; pragma Import (Ada, E207, "gtk__builder_E");
   E205 : Short_Integer; pragma Import (Ada, E205, "gtk__buildable_E");
   E291 : Short_Integer; pragma Import (Ada, E291, "gtk__cell_area_context_E");
   E309 : Short_Integer; pragma Import (Ada, E309, "gtk__css_section_E");
   E241 : Short_Integer; pragma Import (Ada, E241, "gtk__enums_E");
   E251 : Short_Integer; pragma Import (Ada, E251, "gtk__orientable_E");
   E350 : Short_Integer; pragma Import (Ada, E350, "gtk__paper_size_E");
   E346 : Short_Integer; pragma Import (Ada, E346, "gtk__page_setup_E");
   E358 : Short_Integer; pragma Import (Ada, E358, "gtk__print_settings_E");
   E340 : Short_Integer; pragma Import (Ada, E340, "gtk__target_entry_E");
   E338 : Short_Integer; pragma Import (Ada, E338, "gtk__target_list_E");
   E314 : Short_Integer; pragma Import (Ada, E314, "pango__enums_E");
   E322 : Short_Integer; pragma Import (Ada, E322, "pango__attributes_E");
   E316 : Short_Integer; pragma Import (Ada, E316, "pango__font_metrics_E");
   E318 : Short_Integer; pragma Import (Ada, E318, "pango__language_E");
   E312 : Short_Integer; pragma Import (Ada, E312, "pango__font_E");
   E364 : Short_Integer; pragma Import (Ada, E364, "gtk__text_attributes_E");
   E366 : Short_Integer; pragma Import (Ada, E366, "gtk__text_tag_E");
   E328 : Short_Integer; pragma Import (Ada, E328, "pango__font_face_E");
   E326 : Short_Integer; pragma Import (Ada, E326, "pango__font_family_E");
   E330 : Short_Integer; pragma Import (Ada, E330, "pango__fontset_E");
   E332 : Short_Integer; pragma Import (Ada, E332, "pango__matrix_E");
   E324 : Short_Integer; pragma Import (Ada, E324, "pango__context_E");
   E354 : Short_Integer; pragma Import (Ada, E354, "pango__font_map_E");
   E334 : Short_Integer; pragma Import (Ada, E334, "pango__tabs_E");
   E320 : Short_Integer; pragma Import (Ada, E320, "pango__layout_E");
   E352 : Short_Integer; pragma Import (Ada, E352, "gtk__print_context_E");
   E237 : Short_Integer; pragma Import (Ada, E237, "gdk__display_E");
   E263 : Short_Integer; pragma Import (Ada, E263, "gdk__frame_clock_E");
   E257 : Short_Integer; pragma Import (Ada, E257, "gdk__pixbuf_E");
   E235 : Short_Integer; pragma Import (Ada, E235, "gdk__screen_E");
   E255 : Short_Integer; pragma Import (Ada, E255, "gdk__device_E");
   E273 : Short_Integer; pragma Import (Ada, E273, "gdk__drag_contexts_E");
   E259 : Short_Integer; pragma Import (Ada, E259, "gdk__window_E");
   E267 : Short_Integer; pragma Import (Ada, E267, "gtk__accel_group_E");
   E249 : Short_Integer; pragma Import (Ada, E249, "gtk__adjustment_E");
   E281 : Short_Integer; pragma Import (Ada, E281, "gtk__cell_editable_E");
   E283 : Short_Integer; pragma Import (Ada, E283, "gtk__editable_E");
   E285 : Short_Integer; pragma Import (Ada, E285, "gtk__entry_buffer_E");
   E303 : Short_Integer; pragma Import (Ada, E303, "gtk__icon_source_E");
   E356 : Short_Integer; pragma Import (Ada, E356, "gtk__print_operation_preview_E");
   E368 : Short_Integer; pragma Import (Ada, E368, "gtk__selection_data_E");
   E305 : Short_Integer; pragma Import (Ada, E305, "gtk__style_E");
   E362 : Short_Integer; pragma Import (Ada, E362, "gtk__text_iter_E");
   E297 : Short_Integer; pragma Import (Ada, E297, "gtk__tree_model_E");
   E215 : Short_Integer; pragma Import (Ada, E215, "gtk__widget_E");
   E295 : Short_Integer; pragma Import (Ada, E295, "gtk__cell_renderer_E");
   E293 : Short_Integer; pragma Import (Ada, E293, "gtk__cell_layout_E");
   E289 : Short_Integer; pragma Import (Ada, E289, "gtk__cell_area_E");
   E247 : Short_Integer; pragma Import (Ada, E247, "gtk__container_E");
   E269 : Short_Integer; pragma Import (Ada, E269, "gtk__bin_E");
   E245 : Short_Integer; pragma Import (Ada, E245, "gtk__box_E");
   E287 : Short_Integer; pragma Import (Ada, E287, "gtk__entry_completion_E");
   E336 : Short_Integer; pragma Import (Ada, E336, "gtk__misc_E");
   E342 : Short_Integer; pragma Import (Ada, E342, "gtk__notebook_E");
   E360 : Short_Integer; pragma Import (Ada, E360, "gtk__status_bar_E");
   E243 : Short_Integer; pragma Import (Ada, E243, "gtk__style_provider_E");
   E233 : Short_Integer; pragma Import (Ada, E233, "gtk__settings_E");
   E307 : Short_Integer; pragma Import (Ada, E307, "gtk__style_context_E");
   E301 : Short_Integer; pragma Import (Ada, E301, "gtk__icon_set_E");
   E299 : Short_Integer; pragma Import (Ada, E299, "gtk__image_E");
   E271 : Short_Integer; pragma Import (Ada, E271, "gtk__gentry_E");
   E253 : Short_Integer; pragma Import (Ada, E253, "gtk__window_E");
   E231 : Short_Integer; pragma Import (Ada, E231, "gtk__dialog_E");
   E344 : Short_Integer; pragma Import (Ada, E344, "gtk__print_operation_E");
   E217 : Short_Integer; pragma Import (Ada, E217, "gtk__arguments_E");
   E203 : Short_Integer; pragma Import (Ada, E203, "gtk__drawing_area_E");
   E380 : Short_Integer; pragma Import (Ada, E380, "gtk__main_E");
   E376 : Short_Integer; pragma Import (Ada, E376, "gtk__marshallers_E");
   E378 : Short_Integer; pragma Import (Ada, E378, "gtk__tree_view_column_E");
   E154 : Short_Integer; pragma Import (Ada, E154, "traceur_callbacks_E");
   E106 : Short_Integer; pragma Import (Ada, E106, "traceur_E");

   Sec_Default_Sized_Stacks : array (1 .. 1) of aliased System.Secondary_Stack.SS_Stack (System.Parameters.Runtime_Default_Sec_Stack_Size);

   Local_Priority_Specific_Dispatching : constant String := "";
   Local_Interrupt_States : constant String := "";

   Is_Elaborated : Boolean := False;

   procedure finalize_library is
   begin
      declare
         procedure F1;
         pragma Import (Ada, F1, "traceur_callbacks__finalize_spec");
      begin
         E154 := E154 - 1;
         F1;
      end;
      E378 := E378 - 1;
      declare
         procedure F2;
         pragma Import (Ada, F2, "gtk__tree_view_column__finalize_spec");
      begin
         F2;
      end;
      E203 := E203 - 1;
      declare
         procedure F3;
         pragma Import (Ada, F3, "gtk__drawing_area__finalize_spec");
      begin
         F3;
      end;
      E253 := E253 - 1;
      E215 := E215 - 1;
      E297 := E297 - 1;
      E307 := E307 - 1;
      E305 := E305 - 1;
      E360 := E360 - 1;
      E344 := E344 - 1;
      E342 := E342 - 1;
      E271 := E271 - 1;
      E287 := E287 - 1;
      E285 := E285 - 1;
      E231 := E231 - 1;
      E247 := E247 - 1;
      E295 := E295 - 1;
      E289 := E289 - 1;
      E249 := E249 - 1;
      E267 := E267 - 1;
      E263 := E263 - 1;
      E237 := E237 - 1;
      declare
         procedure F4;
         pragma Import (Ada, F4, "gtk__print_operation__finalize_spec");
      begin
         F4;
      end;
      declare
         procedure F5;
         pragma Import (Ada, F5, "gtk__dialog__finalize_spec");
      begin
         F5;
      end;
      declare
         procedure F6;
         pragma Import (Ada, F6, "gtk__window__finalize_spec");
      begin
         F6;
      end;
      declare
         procedure F7;
         pragma Import (Ada, F7, "gtk__gentry__finalize_spec");
      begin
         F7;
      end;
      E299 := E299 - 1;
      declare
         procedure F8;
         pragma Import (Ada, F8, "gtk__image__finalize_spec");
      begin
         F8;
      end;
      E301 := E301 - 1;
      declare
         procedure F9;
         pragma Import (Ada, F9, "gtk__icon_set__finalize_spec");
      begin
         F9;
      end;
      declare
         procedure F10;
         pragma Import (Ada, F10, "gtk__style_context__finalize_spec");
      begin
         F10;
      end;
      E233 := E233 - 1;
      declare
         procedure F11;
         pragma Import (Ada, F11, "gtk__settings__finalize_spec");
      begin
         F11;
      end;
      declare
         procedure F12;
         pragma Import (Ada, F12, "gtk__status_bar__finalize_spec");
      begin
         F12;
      end;
      declare
         procedure F13;
         pragma Import (Ada, F13, "gtk__notebook__finalize_spec");
      begin
         F13;
      end;
      E336 := E336 - 1;
      declare
         procedure F14;
         pragma Import (Ada, F14, "gtk__misc__finalize_spec");
      begin
         F14;
      end;
      declare
         procedure F15;
         pragma Import (Ada, F15, "gtk__entry_completion__finalize_spec");
      begin
         F15;
      end;
      E245 := E245 - 1;
      declare
         procedure F16;
         pragma Import (Ada, F16, "gtk__box__finalize_spec");
      begin
         F16;
      end;
      E269 := E269 - 1;
      declare
         procedure F17;
         pragma Import (Ada, F17, "gtk__bin__finalize_spec");
      begin
         F17;
      end;
      declare
         procedure F18;
         pragma Import (Ada, F18, "gtk__container__finalize_spec");
      begin
         F18;
      end;
      declare
         procedure F19;
         pragma Import (Ada, F19, "gtk__cell_area__finalize_spec");
      begin
         F19;
      end;
      declare
         procedure F20;
         pragma Import (Ada, F20, "gtk__cell_renderer__finalize_spec");
      begin
         F20;
      end;
      declare
         procedure F21;
         pragma Import (Ada, F21, "gtk__widget__finalize_spec");
      begin
         F21;
      end;
      declare
         procedure F22;
         pragma Import (Ada, F22, "gtk__tree_model__finalize_spec");
      begin
         F22;
      end;
      declare
         procedure F23;
         pragma Import (Ada, F23, "gtk__style__finalize_spec");
      begin
         F23;
      end;
      E368 := E368 - 1;
      declare
         procedure F24;
         pragma Import (Ada, F24, "gtk__selection_data__finalize_spec");
      begin
         F24;
      end;
      E303 := E303 - 1;
      declare
         procedure F25;
         pragma Import (Ada, F25, "gtk__icon_source__finalize_spec");
      begin
         F25;
      end;
      declare
         procedure F26;
         pragma Import (Ada, F26, "gtk__entry_buffer__finalize_spec");
      begin
         F26;
      end;
      declare
         procedure F27;
         pragma Import (Ada, F27, "gtk__adjustment__finalize_spec");
      begin
         F27;
      end;
      declare
         procedure F28;
         pragma Import (Ada, F28, "gtk__accel_group__finalize_spec");
      begin
         F28;
      end;
      E273 := E273 - 1;
      declare
         procedure F29;
         pragma Import (Ada, F29, "gdk__drag_contexts__finalize_spec");
      begin
         F29;
      end;
      E255 := E255 - 1;
      declare
         procedure F30;
         pragma Import (Ada, F30, "gdk__device__finalize_spec");
      begin
         F30;
      end;
      E235 := E235 - 1;
      declare
         procedure F31;
         pragma Import (Ada, F31, "gdk__screen__finalize_spec");
      begin
         F31;
      end;
      E257 := E257 - 1;
      declare
         procedure F32;
         pragma Import (Ada, F32, "gdk__pixbuf__finalize_spec");
      begin
         F32;
      end;
      declare
         procedure F33;
         pragma Import (Ada, F33, "gdk__frame_clock__finalize_spec");
      begin
         F33;
      end;
      declare
         procedure F34;
         pragma Import (Ada, F34, "gdk__display__finalize_spec");
      begin
         F34;
      end;
      E352 := E352 - 1;
      declare
         procedure F35;
         pragma Import (Ada, F35, "gtk__print_context__finalize_spec");
      begin
         F35;
      end;
      E320 := E320 - 1;
      declare
         procedure F36;
         pragma Import (Ada, F36, "pango__layout__finalize_spec");
      begin
         F36;
      end;
      E334 := E334 - 1;
      declare
         procedure F37;
         pragma Import (Ada, F37, "pango__tabs__finalize_spec");
      begin
         F37;
      end;
      E354 := E354 - 1;
      declare
         procedure F38;
         pragma Import (Ada, F38, "pango__font_map__finalize_spec");
      begin
         F38;
      end;
      E324 := E324 - 1;
      declare
         procedure F39;
         pragma Import (Ada, F39, "pango__context__finalize_spec");
      begin
         F39;
      end;
      E330 := E330 - 1;
      declare
         procedure F40;
         pragma Import (Ada, F40, "pango__fontset__finalize_spec");
      begin
         F40;
      end;
      E326 := E326 - 1;
      declare
         procedure F41;
         pragma Import (Ada, F41, "pango__font_family__finalize_spec");
      begin
         F41;
      end;
      E328 := E328 - 1;
      declare
         procedure F42;
         pragma Import (Ada, F42, "pango__font_face__finalize_spec");
      begin
         F42;
      end;
      E366 := E366 - 1;
      declare
         procedure F43;
         pragma Import (Ada, F43, "gtk__text_tag__finalize_spec");
      begin
         F43;
      end;
      E312 := E312 - 1;
      declare
         procedure F44;
         pragma Import (Ada, F44, "pango__font__finalize_spec");
      begin
         F44;
      end;
      E318 := E318 - 1;
      declare
         procedure F45;
         pragma Import (Ada, F45, "pango__language__finalize_spec");
      begin
         F45;
      end;
      E316 := E316 - 1;
      declare
         procedure F46;
         pragma Import (Ada, F46, "pango__font_metrics__finalize_spec");
      begin
         F46;
      end;
      E322 := E322 - 1;
      declare
         procedure F47;
         pragma Import (Ada, F47, "pango__attributes__finalize_spec");
      begin
         F47;
      end;
      E338 := E338 - 1;
      declare
         procedure F48;
         pragma Import (Ada, F48, "gtk__target_list__finalize_spec");
      begin
         F48;
      end;
      E358 := E358 - 1;
      declare
         procedure F49;
         pragma Import (Ada, F49, "gtk__print_settings__finalize_spec");
      begin
         F49;
      end;
      E346 := E346 - 1;
      declare
         procedure F50;
         pragma Import (Ada, F50, "gtk__page_setup__finalize_spec");
      begin
         F50;
      end;
      E350 := E350 - 1;
      declare
         procedure F51;
         pragma Import (Ada, F51, "gtk__paper_size__finalize_spec");
      begin
         F51;
      end;
      E309 := E309 - 1;
      declare
         procedure F52;
         pragma Import (Ada, F52, "gtk__css_section__finalize_spec");
      begin
         F52;
      end;
      E291 := E291 - 1;
      declare
         procedure F53;
         pragma Import (Ada, F53, "gtk__cell_area_context__finalize_spec");
      begin
         F53;
      end;
      E207 := E207 - 1;
      declare
         procedure F54;
         pragma Import (Ada, F54, "gtk__builder__finalize_spec");
      begin
         F54;
      end;
      E277 := E277 - 1;
      declare
         procedure F55;
         pragma Import (Ada, F55, "glib__variant__finalize_spec");
      begin
         F55;
      end;
      E179 := E179 - 1;
      declare
         procedure F56;
         pragma Import (Ada, F56, "glib__object__finalize_spec");
      begin
         F56;
      end;
      E265 := E265 - 1;
      declare
         procedure F57;
         pragma Import (Ada, F57, "gdk__frame_timings__finalize_spec");
      begin
         F57;
      end;
      E157 := E157 - 1;
      declare
         procedure F58;
         pragma Import (Ada, F58, "glib__finalize_spec");
      begin
         F58;
      end;
      E168 := E168 - 1;
      declare
         procedure F59;
         pragma Import (Ada, F59, "system__pool_global__finalize_spec");
      begin
         F59;
      end;
      E110 := E110 - 1;
      declare
         procedure F60;
         pragma Import (Ada, F60, "ada__text_io__finalize_spec");
      begin
         F60;
      end;
      E183 := E183 - 1;
      declare
         procedure F61;
         pragma Import (Ada, F61, "system__storage_pools__subpools__finalize_spec");
      begin
         F61;
      end;
      E164 := E164 - 1;
      declare
         procedure F62;
         pragma Import (Ada, F62, "system__finalization_masters__finalize_spec");
      begin
         F62;
      end;
      declare
         procedure F63;
         pragma Import (Ada, F63, "system__file_io__finalize_body");
      begin
         E120 := E120 - 1;
         F63;
      end;
      declare
         procedure Reraise_Library_Exception_If_Any;
            pragma Import (Ada, Reraise_Library_Exception_If_Any, "__gnat_reraise_library_exception_if_any");
      begin
         Reraise_Library_Exception_If_Any;
      end;
   end finalize_library;

   procedure adafinal is
      procedure s_stalib_adafinal;
      pragma Import (Ada, s_stalib_adafinal, "system__standard_library__adafinal");

      procedure Runtime_Finalize;
      pragma Import (C, Runtime_Finalize, "__gnat_runtime_finalize");

   begin
      if not Is_Elaborated then
         return;
      end if;
      Is_Elaborated := False;
      Runtime_Finalize;
      s_stalib_adafinal;
   end adafinal;

   type No_Param_Proc is access procedure;
   pragma Favor_Top_Level (No_Param_Proc);

   procedure adainit is
      Main_Priority : Integer;
      pragma Import (C, Main_Priority, "__gl_main_priority");
      Time_Slice_Value : Integer;
      pragma Import (C, Time_Slice_Value, "__gl_time_slice_val");
      WC_Encoding : Character;
      pragma Import (C, WC_Encoding, "__gl_wc_encoding");
      Locking_Policy : Character;
      pragma Import (C, Locking_Policy, "__gl_locking_policy");
      Queuing_Policy : Character;
      pragma Import (C, Queuing_Policy, "__gl_queuing_policy");
      Task_Dispatching_Policy : Character;
      pragma Import (C, Task_Dispatching_Policy, "__gl_task_dispatching_policy");
      Priority_Specific_Dispatching : System.Address;
      pragma Import (C, Priority_Specific_Dispatching, "__gl_priority_specific_dispatching");
      Num_Specific_Dispatching : Integer;
      pragma Import (C, Num_Specific_Dispatching, "__gl_num_specific_dispatching");
      Main_CPU : Integer;
      pragma Import (C, Main_CPU, "__gl_main_cpu");
      Interrupt_States : System.Address;
      pragma Import (C, Interrupt_States, "__gl_interrupt_states");
      Num_Interrupt_States : Integer;
      pragma Import (C, Num_Interrupt_States, "__gl_num_interrupt_states");
      Unreserve_All_Interrupts : Integer;
      pragma Import (C, Unreserve_All_Interrupts, "__gl_unreserve_all_interrupts");
      Detect_Blocking : Integer;
      pragma Import (C, Detect_Blocking, "__gl_detect_blocking");
      Default_Stack_Size : Integer;
      pragma Import (C, Default_Stack_Size, "__gl_default_stack_size");
      Default_Secondary_Stack_Size : System.Parameters.Size_Type;
      pragma Import (C, Default_Secondary_Stack_Size, "__gnat_default_ss_size");
      Bind_Env_Addr : System.Address;
      pragma Import (C, Bind_Env_Addr, "__gl_bind_env_addr");

      procedure Runtime_Initialize (Install_Handler : Integer);
      pragma Import (C, Runtime_Initialize, "__gnat_runtime_initialize");

      Finalize_Library_Objects : No_Param_Proc;
      pragma Import (C, Finalize_Library_Objects, "__gnat_finalize_library_objects");
      Binder_Sec_Stacks_Count : Natural;
      pragma Import (Ada, Binder_Sec_Stacks_Count, "__gnat_binder_ss_count");
      Default_Sized_SS_Pool : System.Address;
      pragma Import (Ada, Default_Sized_SS_Pool, "__gnat_default_ss_pool");

   begin
      if Is_Elaborated then
         return;
      end if;
      Is_Elaborated := True;
      Main_Priority := -1;
      Time_Slice_Value := -1;
      WC_Encoding := 'b';
      Locking_Policy := ' ';
      Queuing_Policy := ' ';
      Task_Dispatching_Policy := ' ';
      Priority_Specific_Dispatching :=
        Local_Priority_Specific_Dispatching'Address;
      Num_Specific_Dispatching := 0;
      Main_CPU := -1;
      Interrupt_States := Local_Interrupt_States'Address;
      Num_Interrupt_States := 0;
      Unreserve_All_Interrupts := 0;
      Detect_Blocking := 0;
      Default_Stack_Size := -1;

      ada_main'Elab_Body;
      Default_Secondary_Stack_Size := System.Parameters.Runtime_Default_Sec_Stack_Size;
      Binder_Sec_Stacks_Count := 1;
      Default_Sized_SS_Pool := Sec_Default_Sized_Stacks'Address;

      Runtime_Initialize (1);

      Finalize_Library_Objects := finalize_library'access;

      Ada.Exceptions'Elab_Spec;
      System.Soft_Links'Elab_Spec;
      System.Exception_Table'Elab_Body;
      E010 := E010 + 1;
      Ada.Containers'Elab_Spec;
      E033 := E033 + 1;
      Ada.Io_Exceptions'Elab_Spec;
      E061 := E061 + 1;
      Ada.Strings'Elab_Spec;
      E007 := E007 + 1;
      Ada.Strings.Maps'Elab_Spec;
      E048 := E048 + 1;
      Ada.Strings.Maps.Constants'Elab_Spec;
      E052 := E052 + 1;
      Interfaces.C'Elab_Spec;
      E071 := E071 + 1;
      System.Exceptions'Elab_Spec;
      E019 := E019 + 1;
      System.Object_Reader'Elab_Spec;
      E073 := E073 + 1;
      System.Dwarf_Lines'Elab_Spec;
      E042 := E042 + 1;
      System.Os_Lib'Elab_Body;
      E065 := E065 + 1;
      System.Soft_Links.Initialize'Elab_Body;
      E090 := E090 + 1;
      E012 := E012 + 1;
      System.Traceback.Symbolic'Elab_Body;
      E032 := E032 + 1;
      E016 := E016 + 1;
      Ada.Assertions'Elab_Spec;
      E374 := E374 + 1;
      Ada.Numerics'Elab_Spec;
      E139 := E139 + 1;
      Ada.Strings.Utf_Encoding'Elab_Spec;
      E094 := E094 + 1;
      Ada.Tags'Elab_Spec;
      Ada.Tags'Elab_Body;
      E100 := E100 + 1;
      Ada.Strings.Text_Buffers'Elab_Spec;
      Ada.Strings.Text_Buffers'Elab_Body;
      E005 := E005 + 1;
      Gnat'Elab_Spec;
      E188 := E188 + 1;
      Interfaces.C.Strings'Elab_Spec;
      E162 := E162 + 1;
      Ada.Streams'Elab_Spec;
      E112 := E112 + 1;
      System.File_Control_Block'Elab_Spec;
      E124 := E124 + 1;
      System.Finalization_Root'Elab_Spec;
      System.Finalization_Root'Elab_Body;
      E123 := E123 + 1;
      Ada.Finalization'Elab_Spec;
      E121 := E121 + 1;
      System.File_Io'Elab_Body;
      E120 := E120 + 1;
      System.Storage_Pools'Elab_Spec;
      E166 := E166 + 1;
      System.Finalization_Masters'Elab_Spec;
      System.Finalization_Masters'Elab_Body;
      E164 := E164 + 1;
      System.Storage_Pools.Subpools'Elab_Spec;
      System.Storage_Pools.Subpools'Elab_Body;
      E183 := E183 + 1;
      Ada.Calendar'Elab_Spec;
      Ada.Calendar'Elab_Body;
      E145 := E145 + 1;
      Ada.Text_Io'Elab_Spec;
      Ada.Text_Io'Elab_Body;
      E110 := E110 + 1;
      System.Pool_Global'Elab_Spec;
      System.Pool_Global'Elab_Body;
      E168 := E168 + 1;
      System.Random_Seed'Elab_Body;
      E143 := E143 + 1;
      Glib'Elab_Spec;
      Gtkada.Types'Elab_Spec;
      E160 := E160 + 1;
      E157 := E157 + 1;
      Gdk.Frame_Timings'Elab_Spec;
      Gdk.Frame_Timings'Elab_Body;
      E265 := E265 + 1;
      E199 := E199 + 1;
      Gdk.Visual'Elab_Body;
      E239 := E239 + 1;
      E201 := E201 + 1;
      E193 := E193 + 1;
      Glib.Object'Elab_Spec;
      E181 := E181 + 1;
      Glib.Values'Elab_Body;
      E197 := E197 + 1;
      E187 := E187 + 1;
      Glib.Object'Elab_Body;
      E179 := E179 + 1;
      E195 := E195 + 1;
      E219 := E219 + 1;
      E221 := E221 + 1;
      E226 := E226 + 1;
      Glib.Generic_Properties'Elab_Spec;
      Glib.Generic_Properties'Elab_Body;
      E213 := E213 + 1;
      Gdk.Color'Elab_Spec;
      E261 := E261 + 1;
      E229 := E229 + 1;
      E224 := E224 + 1;
      E348 := E348 + 1;
      E211 := E211 + 1;
      E279 := E279 + 1;
      Glib.Variant'Elab_Spec;
      Glib.Variant'Elab_Body;
      E277 := E277 + 1;
      E275 := E275 + 1;
      Gtk.Builder'Elab_Spec;
      Gtk.Builder'Elab_Body;
      E207 := E207 + 1;
      E205 := E205 + 1;
      Gtk.Cell_Area_Context'Elab_Spec;
      Gtk.Cell_Area_Context'Elab_Body;
      E291 := E291 + 1;
      Gtk.Css_Section'Elab_Spec;
      Gtk.Css_Section'Elab_Body;
      E309 := E309 + 1;
      E241 := E241 + 1;
      Gtk.Orientable'Elab_Spec;
      E251 := E251 + 1;
      Gtk.Paper_Size'Elab_Spec;
      Gtk.Paper_Size'Elab_Body;
      E350 := E350 + 1;
      Gtk.Page_Setup'Elab_Spec;
      Gtk.Page_Setup'Elab_Body;
      E346 := E346 + 1;
      Gtk.Print_Settings'Elab_Spec;
      Gtk.Print_Settings'Elab_Body;
      E358 := E358 + 1;
      E340 := E340 + 1;
      Gtk.Target_List'Elab_Spec;
      Gtk.Target_List'Elab_Body;
      E338 := E338 + 1;
      E314 := E314 + 1;
      Pango.Attributes'Elab_Spec;
      Pango.Attributes'Elab_Body;
      E322 := E322 + 1;
      Pango.Font_Metrics'Elab_Spec;
      Pango.Font_Metrics'Elab_Body;
      E316 := E316 + 1;
      Pango.Language'Elab_Spec;
      Pango.Language'Elab_Body;
      E318 := E318 + 1;
      Pango.Font'Elab_Spec;
      Pango.Font'Elab_Body;
      E312 := E312 + 1;
      E364 := E364 + 1;
      Gtk.Text_Tag'Elab_Spec;
      Gtk.Text_Tag'Elab_Body;
      E366 := E366 + 1;
      Pango.Font_Face'Elab_Spec;
      Pango.Font_Face'Elab_Body;
      E328 := E328 + 1;
      Pango.Font_Family'Elab_Spec;
      Pango.Font_Family'Elab_Body;
      E326 := E326 + 1;
      Pango.Fontset'Elab_Spec;
      Pango.Fontset'Elab_Body;
      E330 := E330 + 1;
      E332 := E332 + 1;
      Pango.Context'Elab_Spec;
      Pango.Context'Elab_Body;
      E324 := E324 + 1;
      Pango.Font_Map'Elab_Spec;
      Pango.Font_Map'Elab_Body;
      E354 := E354 + 1;
      Pango.Tabs'Elab_Spec;
      Pango.Tabs'Elab_Body;
      E334 := E334 + 1;
      Pango.Layout'Elab_Spec;
      Pango.Layout'Elab_Body;
      E320 := E320 + 1;
      Gtk.Print_Context'Elab_Spec;
      Gtk.Print_Context'Elab_Body;
      E352 := E352 + 1;
      Gdk.Display'Elab_Spec;
      Gdk.Frame_Clock'Elab_Spec;
      Gdk.Pixbuf'Elab_Spec;
      E257 := E257 + 1;
      Gdk.Screen'Elab_Spec;
      Gdk.Screen'Elab_Body;
      E235 := E235 + 1;
      Gdk.Device'Elab_Spec;
      Gdk.Device'Elab_Body;
      E255 := E255 + 1;
      Gdk.Drag_Contexts'Elab_Spec;
      Gdk.Drag_Contexts'Elab_Body;
      E273 := E273 + 1;
      Gdk.Window'Elab_Spec;
      E259 := E259 + 1;
      Gtk.Accel_Group'Elab_Spec;
      Gtk.Adjustment'Elab_Spec;
      Gtk.Cell_Editable'Elab_Spec;
      Gtk.Entry_Buffer'Elab_Spec;
      Gtk.Icon_Source'Elab_Spec;
      Gtk.Icon_Source'Elab_Body;
      E303 := E303 + 1;
      Gtk.Selection_Data'Elab_Spec;
      Gtk.Selection_Data'Elab_Body;
      E368 := E368 + 1;
      Gtk.Style'Elab_Spec;
      E362 := E362 + 1;
      Gtk.Tree_Model'Elab_Spec;
      Gtk.Widget'Elab_Spec;
      Gtk.Cell_Renderer'Elab_Spec;
      E293 := E293 + 1;
      Gtk.Cell_Area'Elab_Spec;
      Gtk.Container'Elab_Spec;
      Gtk.Bin'Elab_Spec;
      Gtk.Bin'Elab_Body;
      E269 := E269 + 1;
      Gtk.Box'Elab_Spec;
      Gtk.Box'Elab_Body;
      E245 := E245 + 1;
      Gtk.Entry_Completion'Elab_Spec;
      Gtk.Misc'Elab_Spec;
      Gtk.Misc'Elab_Body;
      E336 := E336 + 1;
      Gtk.Notebook'Elab_Spec;
      Gtk.Status_Bar'Elab_Spec;
      E243 := E243 + 1;
      Gtk.Settings'Elab_Spec;
      Gtk.Settings'Elab_Body;
      E233 := E233 + 1;
      Gtk.Style_Context'Elab_Spec;
      Gtk.Icon_Set'Elab_Spec;
      Gtk.Icon_Set'Elab_Body;
      E301 := E301 + 1;
      Gtk.Image'Elab_Spec;
      Gtk.Image'Elab_Body;
      E299 := E299 + 1;
      Gtk.Gentry'Elab_Spec;
      Gtk.Window'Elab_Spec;
      Gtk.Dialog'Elab_Spec;
      Gtk.Print_Operation'Elab_Spec;
      E217 := E217 + 1;
      Gdk.Display'Elab_Body;
      E237 := E237 + 1;
      Gdk.Frame_Clock'Elab_Body;
      E263 := E263 + 1;
      Gtk.Accel_Group'Elab_Body;
      E267 := E267 + 1;
      Gtk.Adjustment'Elab_Body;
      E249 := E249 + 1;
      Gtk.Cell_Area'Elab_Body;
      E289 := E289 + 1;
      E281 := E281 + 1;
      Gtk.Cell_Renderer'Elab_Body;
      E295 := E295 + 1;
      Gtk.Container'Elab_Body;
      E247 := E247 + 1;
      Gtk.Dialog'Elab_Body;
      E231 := E231 + 1;
      E283 := E283 + 1;
      Gtk.Entry_Buffer'Elab_Body;
      E285 := E285 + 1;
      Gtk.Entry_Completion'Elab_Body;
      E287 := E287 + 1;
      Gtk.Gentry'Elab_Body;
      E271 := E271 + 1;
      Gtk.Notebook'Elab_Body;
      E342 := E342 + 1;
      Gtk.Print_Operation'Elab_Body;
      E344 := E344 + 1;
      E356 := E356 + 1;
      Gtk.Status_Bar'Elab_Body;
      E360 := E360 + 1;
      Gtk.Style'Elab_Body;
      E305 := E305 + 1;
      Gtk.Style_Context'Elab_Body;
      E307 := E307 + 1;
      Gtk.Tree_Model'Elab_Body;
      E297 := E297 + 1;
      Gtk.Widget'Elab_Body;
      E215 := E215 + 1;
      Gtk.Window'Elab_Body;
      E253 := E253 + 1;
      Gtk.Drawing_Area'Elab_Spec;
      Gtk.Drawing_Area'Elab_Body;
      E203 := E203 + 1;
      E380 := E380 + 1;
      E376 := E376 + 1;
      Gtk.Tree_View_Column'Elab_Spec;
      Gtk.Tree_View_Column'Elab_Body;
      E378 := E378 + 1;
      Traceur_Callbacks'Elab_Spec;
      E154 := E154 + 1;
      Traceur'Elab_Spec;
      Traceur'Elab_Body;
      E106 := E106 + 1;
   end adainit;

   procedure Ada_Main_Program;
   pragma Import (Ada, Ada_Main_Program, "_ada_trait");

   function main
     (argc : Integer;
      argv : System.Address;
      envp : System.Address)
      return Integer
   is
      procedure Initialize (Addr : System.Address);
      pragma Import (C, Initialize, "__gnat_initialize");

      procedure Finalize;
      pragma Import (C, Finalize, "__gnat_finalize");
      SEH : aliased array (1 .. 2) of Integer;

      Ensure_Reference : aliased System.Address := Ada_Main_Program_Name'Address;
      pragma Volatile (Ensure_Reference);

   begin
      if gnat_argc = 0 then
         gnat_argc := argc;
         gnat_argv := argv;
      end if;
      gnat_envp := envp;

      Initialize (SEH'Address);
      adainit;
      Ada_Main_Program;
      adafinal;
      Finalize;
      return (gnat_exit_status);
   end;

--  BEGIN Object file/option list
   --   C:\Users\Yato\Desktop\But informatique\1.01\test\obj\traceur_callbacks.o
   --   C:\Users\Yato\Desktop\But informatique\1.01\test\obj\Traceur.o
   --   C:\Users\Yato\Desktop\But informatique\1.01\test\obj\trait.o
   --   -LC:\Users\Yato\Desktop\But informatique\1.01\test\obj\
   --   -LC:\Users\Yato\Desktop\But informatique\1.01\test\obj\
   --   -LC:\GtkAda\lib\gtkada\gtkada.static\gtkada\
   --   -LC:/gnat/2021/lib/gcc/x86_64-w64-mingw32/10.3.1/adalib/
   --   -static
   --   -shared-libgcc
   --   -shared-libgcc
   --   -shared-libgcc
   --   -lgnat
   --   -Wl,--stack=0x2000000
--  END Object file/option list   

end ada_main;
