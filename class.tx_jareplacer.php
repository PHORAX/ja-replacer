<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 John Angel <johnange@gmail.com>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Class for the Content Replacer
 * Replaces string patterns from the page content. You can use it to replace URLs for Content Delivery Network (CDN).
 *
 * @author     John Angel <johnange@gmail.com>
 * @author     Simon Schick <simonsimcity@gmail.com>
 */
class tx_jareplacer {
    /**
     * Search links to resource and replace them with e.g. a CDN-Link
     *
     * You must set the Search and Replace patterns via TypoScript.
     * usage from TypoScript:
     *   config.tx_ja_replacer {
     *     search {
     *       1="typo3temp/pics/
     *       2="fileadmin/
     *     }
     *     replace {
     *       1="http://mycdn.com/i/
     *       2="http://mycdn.com/f/
     *     }
     *   }
     *
     * @param    array    $params
     * @param    tslib_fe $obj
     * @return    void
     */
	function hook_strreplace(&$params, &$obj) {
			// Fetch configuration
		$config = $obj->config['config']['tx_ja_replacer.'];

			// Quit immediately if no replace array setup
		if (!$config || !isset($config['search.']) || !$config['search.'] || !isset($config['replace.']) || !$config['replace.'])
			return;

		$params['search']  += $config['search.'];
		$params['replace'] += $config['replace.'];
	}
}