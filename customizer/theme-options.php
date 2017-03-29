<?php
require_once get_template_directory() . '/customizer/options-config.php';
	if( ! class_exists('Magzen_Customizer_API_Wrapper') ) {
			require_once get_template_directory() . '/customizer/class.magzen-customizer-api-wrapper.php';
	}


Magzen_Customizer_API_Wrapper::getInstance($options);
