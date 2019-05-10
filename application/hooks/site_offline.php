<?php
/**
* Description of site_offline
*
* @author Amit pashte
*/

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Site_Offline {

	 function __construct() {
	 }

  	 public function is_offline() {
	 if(file_exists(APPPATH . 'config/config.php')) {
	 include(APPPATH . 'config/config.php');
		
	 if(isset($config['is_offline']) && $config['is_offline'] === TRUE) {
	 $this->show_site_offline();
	 exit;
	 }
	 }
	}

	private function show_site_offline() {
		echo '<html><body><span style="color:red;"><strong>The site is offline due to maintenance. We will be back soon. Please check back later</strong></span>.</body></html>';
	}

}
