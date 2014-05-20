<?php 
/**
* Web Services Shortcodes
* @copyright  Copyright 2014 Roy Rosenzweig Center for History and New Media
* @license   [description]http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
*/

/**
 * The Web Services Shortcodes plugin
 *
 * @package  WebServicesShortcodes
 */

class WebServicesShortcodesPlugin extends Omeka_Plugin_AbstractPlugin
{
	protected $_hooks = array (
		'initialize',
		);

	public function hookInitialize()
	{
		add_shortcode('viewshare', array($this, 'viewshareShortcode'));
	}

	public function viewshareShortcode($args, $view)
	{
		$url = $args['url'];

		$pattern = '#^http://viewshare.org/views/[A-Za-z0-9_/-]*/$#';

		if (preg_match($pattern, $url)) {
			$embed_url = $url .'embed.js';
		}

		$content = '<script id="freemix-embed" src="' . $embed_url . '" type="text/javascript"></script>';

		return $content;
	}
}

 ?>