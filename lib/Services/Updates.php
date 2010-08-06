<?php
	defined('PUBWICH') or die('No direct access allowed.');

	/**
	 * @classname Updates
	 * @description Display an update block. Like a news post.
	 * @version 1.0 (20100805)
	 * @author Patrick Weaver (painswitch.com)
	 * @methods None
	 */
	class Updates extends Service {

		public function __construct( $config ){
			$this->text = ((file_get_contents("./inc/update.txt")) ? file_get_contents("./inc/update.txt") : "No updates currently available.");
			$this->setItemTemplate('{{{text}}}'."\n");
			parent::__construct( $config );
		}

		/**
		 * @return SimpleXMLElement
		 */
		public function getData() {
			return array( $this->text );
		}

		/**
		 * @return array
		 */
		public function populateItemTemplate( &$item ) {
			return array(
				'text' => $this->text
			);
		}

		/**
		 * @return array
		 */
		public function populateBoxTemplate( ) {
		 	return array(
				'class' => $this->title ? '' : 'no-title'
			) + parent::populateBoxTemplate();
		}

	}

