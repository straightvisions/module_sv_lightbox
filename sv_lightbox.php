<?php
namespace sv100;

/**
 * @version         4.000
 * @author			straightvisions GmbH
 * @package			sv100
 * @copyright		2019 straightvisions GmbH
 * @link			https://straightvisions.com
 * @since			1.000
 * @license			See license.txt or https://straightvisions.com
 */

class sv_lightbox extends init {
	public function init() {
		// Module Info
		$this->set_module_title( 'SV Lightbox' );
		$this->set_module_desc( __( 'Links to Images will be opened as Lightbox', 'sv100' ) );

		// Section Info
		$this->set_section_title( __( 'Lighhtbox', 'sv100' ) );
		$this->set_section_desc( __( 'Manage Lightbox', 'sv100' ) );
		$this->set_section_type( 'settings' );
		$this->get_root()->add_section( $this );

		$this->load_settings()->register_scripts();
	}
	public function load_settings(): sv_lightbox {
		$this->get_setting( 'activate' )
				->set_title( __( 'Enable Lightbox', 'sv100' ) )
				->set_description( __( 'Links to Images will be opened in a Lightbox', 'sv100' ) )
				->load_type( 'checkbox' );

		return $this;
	}
	protected function register_scripts(): sv_lightbox{
		if($this->get_setting( 'activate' )->run_type()->get_data()) {
			$this->get_script('lightbox')->set_path('lib/frontend/css/lightbox.min.css');
			$this->get_script('lightbox_js')
				->set_type('js')
				->set_deps(array('jquery'))
				->set_path('lib/frontend/js/lightbox.min.js');
			$this->get_script('default')
				->set_type('js')
				->set_deps(array('lightbox_js'))
				->set_path('lib/frontend/js/default.js');
		}
		return $this;
	}
}