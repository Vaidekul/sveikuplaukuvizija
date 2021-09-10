<?php

if ( !class_exists( 'Dahzextender_Booked' ) ) {

	Class Dahzextender_Booked {

		public function __construct() {

			add_filter( 'dahz_framework_default_styles', array( $this, 'dahz_framework_booked_style' ) );
			
			remove_action( 'wp_enqueue_scripts', array( 'booked_plugin', 'front_end_color_theme' ) );

		}
		
		public function dahz_framework_booked_style( $styles ){
			
			$button_color = get_option('booked_button_color','#56c477');
			
			$light_color = get_option('booked_light_color','#c4f2d4');
			
			$dark_color = get_option('booked_dark_color','#039146');
			
			$styles .= sprintf(
				'
				body .booked-calendar-wrap:not(.small) .booked-appt-list .timeslot .timeslot-time{
					padding:0!important;
					height:auto!important;
				}
				body .booked-calendar-wrap:not(.small) .booked-appt-list .timeslot .timeslot-people{
					padding:0!important;
					height:auto!important;
				}
				body .booked-calendar-wrap:not(.small) .booked-appt-list .timeslot .spots-available{
					padding:0!important;
				}
				body .booked-list-view button.booked-list-view-date-prev,
				body .booked-list-view a.booked_list_date_picker_trigger,
				body .booked-list-view button.booked-list-view-date-next{
					background-color:var(--button-secondary-background-color);
					border-color:var(--button-secondary-border-color);
					color:var(--button-secondary-color)!important;
				}
				body .booked-list-view a.booked_list_date_picker_trigger:focus,
				body .booked-list-view button.booked-list-view-date-prev:focus,
				body .booked-list-view button.booked-list-view-date-next:focus,
				body .booked-list-view a.booked_list_date_picker_trigger:hover,
				body .booked-list-view button.booked-list-view-date-prev:hover,
				body .booked-list-view button.booked-list-view-date-next:hover{
					background-color:var(--button-secondary-hover-background-color);
					border-color:var(--button-secondary-hover-border-color);
					color:var(--button-secondary-hover-color)!important;
				}
				@media only screen and (min-width: 451px) {
					body .booked-calendar-wrap:not(.small) .booked-appt-list .timeslot{
						padding:15px 0;
					}
				}
				
				/* Light Color */
				#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td a.ui-state-active,
				#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td a.ui-state-active:hover,
				body table.booked-calendar th,
				body table.booked-calendar thead,
				body table.booked-calendar thead th,
				body #booked-profile-page .booked-profile-header,
				body #booked-profile-page .booked-tabs li.active a,
				body #booked-profile-page .booked-tabs li.active a:hover,
				body #booked-profile-page .appt-block .google-cal-button > a:hover,
				#ui-datepicker-div.booked_custom_date_picker .ui-datepicker-header
				{ background:%1$s !important; }

				
				body table.booked-calendar th,
				body #booked-profile-page .booked-profile-header,
				body #booked-profile-page .appt-block .google-cal-button > a:hover
				{ border-color:%1$s !important; }


				/* Dark Color */
				body table.booked-calendar tr.days,
				body table.booked-calendar tr.days th,
				body .booked-calendarSwitcher.calendar,
				body #booked-profile-page .booked-tabs,
				#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar thead,
				#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar thead th
				{ background:%2$s !important; }

				body table.booked-calendar tr.days th,
				body #booked-profile-page .booked-tabs
				{ border-color:%2$s !important; }

				#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td.ui-datepicker-today a,
				#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td.ui-datepicker-today a:hover,
				body #booked-profile-page .booked-profile-appt-list .appt-block.approved .status-block,
				body #booked-profile-page .appt-block .google-cal-button > a,
				body .booked-modal p.booked-title-bar,
				body table.booked-calendar td:hover .date span,
				body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active,
				body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active:hover,
				.booked-ms-modal .booked-book-appt /* Multi-Slot Booking */
				{ background:%3$s; }

				
				body #booked-profile-page .appt-block .google-cal-button > a,
				body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active,
				body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active:hover
				{ border-color:%3$s; }

				body .booked-modal .bm-window p i.fa,
				body .booked-modal .bm-window a,
				body .booked-appt-list .booked-public-appointment-title,
				body .booked-modal .bm-window p.appointment-title,
				.booked-ms-modal.visible:hover .booked-book-appt
				{ color:%3$s; }

				.booked-appt-list .timeslot.has-title .booked-public-appointment-title { color:inherit; }
				',
				$light_color,
				$dark_color,
				$button_color
			);
			
			return $styles;
			
		}

	}

	new Dahzextender_Booked();
	
	/* Primary Button background Color 
		body #booked-profile-page input[type=submit].button-primary,
		body table.booked-calendar input[type=submit].button-primary,
		body .booked-list-view button.button, body .booked-list-view input[type=submit].button-primary,
		body .booked-list-view button.button, body .booked-list-view input[type=submit].button-primary,
		body .booked-modal input[type=submit].button-primary,
		body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button,
	*/
	/* Primary Button border Color 
		body #booked-profile-page input[type=submit].button-primary,
		body table.booked-calendar input[type=submit].button-primary,
		body .booked-list-view button.button, body .booked-list-view input[type=submit].button-primary,
		body .booked-list-view button.button, body .booked-list-view input[type=submit].button-primary,
		body .booked-modal input[type=submit].button-primary,
		body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button,
	*/
	
	/* hover Button background Color 
		body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover,
		body #booked-profile-page input[type=submit].button-primary:hover,
		body .booked-list-view button.button:hover, body .booked-list-view input[type=submit].button-primary:hover,
		body table.booked-calendar input[type=submit].button-primary:hover,
		body .booked-modal input[type=submit].button-primary:hover,
	*/
	
	/* hover Button border Color 
		body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover,
		body #booked-profile-page input[type=submit].button-primary:hover,
		body table.booked-calendar input[type=submit].button-primary:hover,
		body .booked-list-view button.button:hover, body .booked-list-view input[type=submit].button-primary:hover,
		body .booked-modal input[type=submit].button-primary:hover,
	*/
}