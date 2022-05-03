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

namespace NickDavis\BlockIdSubmenu\UI;

use BrightNucleus\Views;
use NickDavis\BlockIdSubmenu\Application\MenuGenerator;
use NickDavis\BlockIdSubmenu\Registerable;

final class Submenu implements Registerable {

	public function register(): void {
		add_action( 'block_id_submenu', [ $this, 'render' ] );
	}

	public function render(): void {
		if ( empty( $this->get_menu() ) ) {
			return;
		}

		echo Views::render( 'block-id-submenu', [ 'menu' => $this->get_menu() ] );
	}

	private function get_menu(): array {
		return ( new MenuGenerator() )->generate();
	}

}
