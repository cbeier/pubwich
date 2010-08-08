<?php
	defined('PUBWICH') or die('No direct access allowed.');

	/**
	 * @classname Digg
	 * @description Fetch data from Digg.com
	 * @version 1.0 (20100807)
	 * @author Patrick Weaver (painswitch.com)
	 * @methods Diggs Submissions History Favorites
	 */

	class Digg extends Service {

		public $username;

		public function setVariables( $config ) {
			$this->username = $config['username'];
			$this->total = $config['total'];
			$this->setURLTemplate('http://digg.com/users/'.$config['username'].'/');
		}

		public function buildCache() {
			parent::buildCache();
		}

		public function getData() {
			return parent::getData();
		}

		public function init() {
			parent::init();
		}

	}

	class Diggs extends Digg {

		public function __construct( $config ) {
			parent::setVariables( $config );

			$this->setURL( 'http://digg.com/users/'.$this->username.'/history/diggs.rss' );
			$this->setItemTemplate('<li><a class="clearfix" href="{{{link}}}">{{{title}}}</a><br /><i>{{{date}}}</i><br />{{{description}}}</li>'."\n");

			parent::__construct( $config );
		}

		/**
		 * @return SimpleXMLElement
		 */
		public function getData() {
			$data = parent::getData();
			return $data->channel->item;
		}

		/**
		 * @return array
		 */
		public function populateItemTemplate( &$item ) {
			return array(
						'link' => htmlspecialchars( $item->link ),
						'title' => $item->title,
						'description' => $item->description,
						'date' => $item->pubDate,
						'author' => $item->author,
						);
		}

	}

	class Submissions extends Digg {

		public function __construct( $config ) {
			parent::setVariables( $config );

			$this->setURL( 'http://digg.com/users/'.$this->username.'/history/submissions.rss' );
			$this->setItemTemplate('<li><a class="clearfix" href="{{{link}}}">{{{title}}}</a><br /><i>{{{date}}}</i><br />{{{description}}}</li>'."\n");

			parent::__construct( $config );
		}

		/**
		 * @return SimpleXMLElement
		 */
		public function getData() {
			$data = parent::getData();
			return $data->channel->item;
		}

		/**
		 * @return array
		 */
		public function populateItemTemplate( &$item ) {
			return array(
						'link' => htmlspecialchars( $item->link ),
						'title' => $item->title,
						'description' => $item->description,
						'date' => $item->pubDate,
						'author' => $item->author,
						);
		}

	}

	class History extends Digg {

		public function __construct( $config ) {
			parent::setVariables( $config );

			$this->setURL( 'http://digg.com/users/'.$this->username.'/history/history.rss' );
			$this->setItemTemplate('<li><a class="clearfix" href="{{{link}}}">{{{title}}}</a><br /><i>{{{date}}}</i><br />{{{description}}}</li>'."\n");

			parent::__construct( $config );
		}

		/**
		 * @return SimpleXMLElement
		 */
		public function getData() {
			$data = parent::getData();
			return $data->channel->item;
		}

		/**
		 * @return array
		 */
		public function populateItemTemplate( &$item ) {
			return array(
						'link' => htmlspecialchars( $item->link ),
						'title' => $item->title,
						'description' => $item->description,
						'date' => $item->pubDate,
						'author' => $item->author,
						);
		}

	}

	class Favorites extends Digg {

		public function __construct( $config ) {
			parent::setVariables( $config );

			$this->setURL( 'http://digg.com/users/'.$this->username.'/history/favorites.rss' );
			$this->setItemTemplate('<li><a class="clearfix" href="{{{link}}}">{{{title}}}</a><br /><i>{{{date}}}</i><br />{{{description}}}</li>'."\n");

			parent::__construct( $config );
		}

		/**
		 * @return SimpleXMLElement
		 */
		public function getData() {
			$data = parent::getData();
			return $data->channel->item;
		}

		/**
		 * @return array
		 */
		public function populateItemTemplate( &$item ) {
			return array(
						'link' => htmlspecialchars( $item->link ),
						'title' => $item->title,
						'description' => $item->description,
						'date' => $item->pubDate,
						'author' => $item->author,
						);
		}

	}