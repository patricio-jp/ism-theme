<?php

class ism_navmenu_walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat("\t", $depth);
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
		$indent = ($depth) ? str_repeat("\t", $depth) : '';

		$li_attributes = '';
//		$classNames = '';

		$classes = empty($item->classes) ? array() : $item->classes;

		$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
		$classes[] = 'nav-item';
		$classes[] = 'nav-item-' . $item->ID;
		if ($depth && $args->walker->has_children) $classes[] = 'dropdown-menu dropdown-menu-end';

		$classNames = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$classNames = ' class="' . esc_attr($classNames) . '"';

		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
		$id = strlen($id) ? 'id="' . esc_attr($id) . '"' : '';

		$output .= $indent . '<li ' . $id . $classNames . $li_attributes . '>';

		$attributes = !empty($item->attr_title) ? 'title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target) ? 'target="' . esc_attr($item->target) . '"' : '';
		$attributes .= !empty($item->xfn) ? 'xfn="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= !empty($item->url) ? 'href="' . esc_attr($item->url) . '"' : '';

		$activeClass = ( $item->current || $item->current_item_ancestor || in_array('current_page_parent', $item->classes, true) || in_array('current_post_ancestor', $item->classes, true)) ? 'active' : '';

		$navLinkClass = ($depth > 0) ? 'dropdown-item ' : 'nav-link ';

		$attributes .= ($args->walker->has_children) ? ' class="' . $navLinkClass . $activeClass . ' dropdown-toggle"' : ' class="' . $navLinkClass . $activeClass . '"';

		$dropdownIcon = ($args->walker->has_children) ? '<span class="dropdownToggle"><i class="fa-solid fa-caret-down"></i></span>' : '';

		$itemOutput = $args->before;
		$itemOutput .= '<a ' . $attributes . '>';
		$itemOutput .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $dropdownIcon . $args->link_after;
		$itemOutput .= '</a>';
		$itemOutput .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $itemOutput, $item, $depth, $args);
	}
}