<?php declare( strict_types=1 );

/**
 * Block ID Submenu.
 *
 * @package   NickDavis\BlockIdSubmenu
 * @author    Nick Davis
 * @license   MIT
 * @link      https://nickdavis.net
 * @copyright 2022 Nick Davis
 */

namespace NickDavis\BlockIdSubmenu;

interface Registerable {
	public function register(): void;
}
