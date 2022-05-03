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

namespace NickDavis\BlockIdSubmenu\Application;

final class MenuGenerator {

	/**
	 * Parses the Post content for Group blocks with ID attribute set and
	 * returns an array of title and IDs.
	 *
	 * @return array
	 */
	public function generate(): array {
		global $post;

		$blocks    = parse_blocks( $post->post_content );
		$menu_items = [];

		foreach ( $blocks as $block ) {

			if ( 'core/group' === $block['blockName'] ) {
				preg_match( '/id="([^"]*)"/', $block['innerHTML'], $ids );

				if ( ! isset( $ids[1] ) ) {
					continue;
				}

				$menu_items[] = [
					'title' => ucwords( str_replace( [ '-', 'section ' ], [ ' ', '' ], $ids[1] ) ),
					'id'      => $ids[1],
				];

			}

		}

		return $menu_items;
	}

}
