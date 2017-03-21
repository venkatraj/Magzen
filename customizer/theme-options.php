<?php
require_once get_template_directory() . '/customizer/options-config.php';
	if( ! class_exists('Wbls_Customizer_API_Wrapper') ) {
			require_once get_template_directory() . '/customizer/class.wbls-customizer-api-wrapper.php';
	}


Wbls_Customizer_API_Wrapper::getInstance($options);
