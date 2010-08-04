<?php
	defined('PUBWICH') or die('No direct access allowed.');

	/**
	 * @classname WoWArmory
	 * @description Fetch Character Activity
	 * @version 1.0 (20100802)
	 * @author Patrick Weaver (painswitch.com)
	 * @methods None
	 */

	class WoWArmory extends Service {

		public function __construct( $config ){
			$config['link'] = 'http://www.wowarmory.com/character-sheet.xml?r='.$config['realm'].'&cn='.$config['character'];
			$config['url'] = 'http://www.wowarmory.com/character-feed.atom?r='.$config['realm'].'&cn='.$config['character'].'&locale='.$config['locale'];
			$this->total = $config['total'];
			$this->character = $config['character'];
			$this->setURL( $config['url'] );
			$this->setHeaderLink( array( 'url' => $config['url'], 'type' => 'application/atom+xml' ) );
			$this->setURLTemplate( $config['link'] );
			$this->setItemTemplate('<li class="clearfix"><span class="datename"><a href="{{{link}}}">{{{character}}}</a><br />{{{date}}}</span>{{{content}}}</li>'."\n");
			parent::__construct( $config );
		}

		/**
		 * @return SimpleXMLElement
		 */
		public function getData() {
			$data = parent::getData();
			return $data->entry;
		}

		/**
		 * @return array
		 */
		public function populateItemTemplate( &$item ) {
			$link = $item->link->attributes()->href;
			return array(
						'link' => htmlspecialchars( $link ),
						'title' => trim( $item->title ),
						'date' => Pubwich::time_since( $item->published ),
						'content' => $item->content,
						'character' => $this->character,
			);
		}
	}
