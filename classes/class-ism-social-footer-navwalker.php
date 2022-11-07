<?php

class ism_social_footer_navmenu_walker extends Walker_Nav_Menu {
	private $icons = array(
		"facebook" => "fa-brands fa-facebook",
		"instagram" => "fa-brands fa-instagram",
		"twitter" => "fa-brands fa-twitter",
		"linkedin" => "fa-brands fa-linkedin"
	);

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$classNames = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$classes[] = 'nav-item-' . $item->ID;
		$classNames = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$classNames = ' class="' . esc_attr($classNames) . '"';

		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';

		$output .= $indent . '';

		$attributes = !empty($item->attr_title) ? 'title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target) ? 'target="' . esc_attr($item->target) . '"' : '';
		$attributes .= !empty($item->xfn) ? 'xfn="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= !empty($item->url) ? 'href="' . esc_attr($item->url) . '"' : '';

		$itemOutput = $args->before;
		if (strpos($item->url, 'facebook') !== false) {
			$itemOutput .= '<a ' . $attributes . '><i class="fa-brands fa-facebook"></i>' . '</a>';
			$itemOutput .= $args->after;
		} else if (strpos($item->url, 'instagram') !== false) {
			$itemOutput .= '<a ' . $attributes . '><i class="fa-brands fa-instagram"></i>' . '</a>';
			$itemOutput .= $args->after;
		} else if (strpos($item->url, 'twitter') !== false) {
			$itemOutput .= '<a ' . $attributes . '><i class="fa-brands fa-twitter"></i>' . '</a>';
			$itemOutput .= $args->after;
		} else if (strpos($item->url, 'linkedin') !== false) {
			$itemOutput .= '<a ' . $attributes . '><i class="fa-brands fa-linkedin"></i>' . '</a>';
			$itemOutput .= $args->after;
		} else if (strpos($item->url, 'youtube') !== false || strpos($item->url, 'youtu.be') !== false) {
			$itemOutput .= '<a ' . $attributes . '><i class="fa-brands fa-youtube"></i>' . '</a>';
			$itemOutput .= $args->after;
		} else if (strpos($item->url, 'whatsapp') !== false || strpos($item->url, 'wa.me') !== false) {
			$itemOutput .= '<a ' . $attributes . '><i class="fa-brands fa-whatsapp"></i>' . '</a>';
			$itemOutput .= $args->after;
		} else if (strpos($item->url, 'mailto:') !== false) {
			$itemOutput .= '<a ' . $attributes . '><i class="fa-solid fa-envelope"></i>' . '</a>';
			$itemOutput .= $args->after;
		}

		$output .= apply_filters('walker_nav_menu_start_el', $itemOutput, $item, $depth, $args);
	}

	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "\n";
	}
}
