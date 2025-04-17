<?php

class PageNavi_Call {

	protected $args;

	function __construct( $args ) {
		$this->args = $args;
	}

/*************  ✨ Windsurf Command ⭐  *************/
	/**
	 * @param string $key
	 * @return mixed
	 */
/*******  d814d2bd-1e1e-41ce-ba9c-32e61774e363  *******/
	function __get( $key ) {
		return $this->args[ $key ];
	}

	function get_pagination_args() {
		global $numpages;

		$query = $this->query;

		switch( $this->type ) {
			case 'multipart':
				// Multipart page
				$posts_per_page = 1;
				$paged = max( 1, absint( get_query_var( 'page' ) ) );
				$total_pages = max( 1, $numpages );
				break;
			case 'users':
				// WP_User_Query
				$posts_per_page = $query->query_vars['number'];
				$paged = max( 1, floor( $query->query_vars['offset'] / $posts_per_page ) + 1 );
				$total_pages = max( 1, ceil( $query->total_users / $posts_per_page ) );
				break;
			default:
				// WP_Query
				$posts_per_page = intval( $query->get( 'posts_per_page' ) );
				$paged = max( 1, absint( $query->get( 'paged' ) ) );
				$total_pages = max( 1, absint( $query->max_num_pages ) );
				break;
		}

		return array( $posts_per_page, $paged, $total_pages );
	}

	function get_single( $page, $raw_text, $attr, $format = '%PAGE_NUMBER%' ) {
		if ( empty( $raw_text ) )
			return '';

		$text = str_replace( $format, number_format_i18n( $page ), $raw_text );

		$attr['href'] = $this->get_url( $page );

		return html( 'a', $attr, $text );
	}

	function get_url( $page ) {
		return ( 'multipart' == $this->type ) ? get_multipage_link( $page ) : get_pagenum_link( $page );
	}
}

/**
 * Generate an HTML tag. Atributes are escaped. Content is NOT escaped.
 *
 * @param string $tag
 *
 * @return string
 */
if ( ! function_exists( 'html' ) ):
	function html( $tag ) {
		static $SELF_CLOSING_TAGS = array( 'area', 'base', 'basefont', 'br', 'hr', 'input', 'img', 'link', 'meta' );

		$args = func_get_args();

		$tag = array_shift( $args );

		if ( is_array( $args[0] ) ) {
			$closing = $tag;
			$attributes = array_shift( $args );
			foreach ( $attributes as $key => $value ) {
				if ( false === $value ) {
					continue;
				}

				if ( true === $value ) {
					$value = $key;
				}

				$tag .= ' ' . $key . '="' . esc_attr( $value ) . '"';
			}
		} else {
			list( $closing ) = explode( ' ', $tag, 2 );
		}

		if ( in_array( $closing, $SELF_CLOSING_TAGS ) ) {
			return "<{$tag} />";
		}

		$content = implode( '', $args );

		return "<{$tag}>{$content}</{$closing}>";
	}
endif;

function dm_wp_pagenavi( $args = array() ) {
	if ( !is_array( $args ) ) {
		$argv = func_get_args();

		$args = array();
		foreach ( array( 'before', 'after', 'options' ) as $i => $key ) {
			$args[ $key ] = isset( $argv[ $i ]) ? $argv[ $i ] : '';
		}
	}

	$args = wp_parse_args( $args, array(
		'before' => '',
		'after' => '',
		'wrapper_tag' => 'div',
		'wrapper_class' => 'join',
		'options' => array(),
		'query' => $GLOBALS['wp_query'],
		'type' => 'posts',
		'echo' => true
	) );

	extract( $args, EXTR_SKIP );

	$options = wp_parse_args( $options, array(
		"pages_text" => "",
		"current_text" => "%PAGE_NUMBER%",
		"page_text" => "%PAGE_NUMBER%",
		"first_text" => "",
		"last_text" => "",
		"prev_text" => "<",
		"next_text" => ">",
		"dotleft_text" => "…",
		"dotright_text" => "…",
		"num_pages" => "5",
		"num_larger_page_numbers" => "3",
		"larger_page_numbers_multiple" => "10",
		"always_show" => "",
		"use_pagenavi_css" => "1",
		"style" => "1"
	) );

	$instance = new PageNavi_Call( $args );

	list( $posts_per_page, $paged, $total_pages ) = $instance->get_pagination_args();

	if ( 1 == $total_pages && !$options['always_show'] )
		return;

	$pages_to_show = absint( $options['num_pages'] );
	$larger_page_to_show = absint( $options['num_larger_page_numbers'] );
	$larger_page_multiple = absint( $options['larger_page_numbers_multiple'] );
	$pages_to_show_minus_1 = $pages_to_show - 1;
	$half_page_start = floor( $pages_to_show_minus_1/2 );
	$half_page_end = ceil( $pages_to_show_minus_1/2 );
	$start_page = $paged - $half_page_start;

	if ( $start_page <= 0 )
		$start_page = 1;

	$end_page = $paged + $half_page_end;

	if ( ( $end_page - $start_page ) != $pages_to_show_minus_1 )
		$end_page = $start_page + $pages_to_show_minus_1;

	if ( $end_page > $total_pages ) {
		$start_page = $total_pages - $pages_to_show_minus_1;
		$end_page = $total_pages;
	}

	if ( $start_page < 1 )
		$start_page = 1;

	// Support for filters to change class names
	$class_names = array(
		'pages' => apply_filters( 'wp_pagenavi_class_pages', 'join-item btn'),
		'first' => apply_filters( 'wp_pagenavi_class_first', 'join-item btn' ),
		'previouspostslink' => apply_filters( 'wp_pagenavi_class_previouspostslink', 'join-item btn' ),
		'extend' => apply_filters( 'wp_pagenavi_class_extend', 'dot' ),
		'smaller' => apply_filters( 'wp_pagenavi_class_smaller', 'smaller' ),
		'page' => apply_filters( 'wp_pagenavi_class_page', 'join-item btn' ),
		'current' => apply_filters( 'wp_pagenavi_class_current', 'join-item btn btn-active' ),
		'larger' => apply_filters( 'wp_pagenavi_class_larger', 'larger' ),
		'nextpostslink' => apply_filters( 'wp_pagenavi_class_nextpostslink', 'join-item btn'),
		'last' => apply_filters( 'wp_pagenavi_class_last', 'join-item btn'),
	);

	$out = '';
	switch ( intval( $options['style'] ) ) {
		// Normal
		case 1:
			// Text
			if ( !empty( $options['pages_text'] ) ) {
				$pages_text = str_replace(
					array( "%CURRENT_PAGE%", "%TOTAL_PAGES%" ),
					array( number_format_i18n( $paged ), number_format_i18n( $total_pages ) ),
					__( $options['pages_text'], 'wp-pagenavi' ) );
				$out .= "<span class='{$class_names['pages']}'>$pages_text</span>";
			}

			if ( $start_page >= 2 && $pages_to_show < $total_pages ) {
				// First
				$first_text = str_replace( '%TOTAL_PAGES%', number_format_i18n( $total_pages ), __( $options['first_text'], 'wp-pagenavi' ) );
				$out .= $instance->get_single( 1, $first_text, array(
					'class' => $class_names['first'],
					'aria-label' => __('First Page'),
				), '%TOTAL_PAGES%' );
			}

			// Previous
			if ( $paged > 1 && !empty( $options['prev_text'] ) ) {
				$out .= $instance->get_single( $paged - 1, $options['prev_text'], array(
					'class' => $class_names['previouspostslink'],
					'rel'   => 'prev',
					'aria-label' => __('Previous Page'),
				) );
			}

			if ( $start_page >= 2 && $pages_to_show < $total_pages ) {
				if ( !empty( $options['dotleft_text'] ) )
					$out .= "<span class='{$class_names['extend']}'>{$options['dotleft_text']}</span>";
			}

			// Smaller pages
			$larger_pages_array = array();
			if ( $larger_page_multiple )
				for ( $i = $larger_page_multiple; $i <= $total_pages; $i+= $larger_page_multiple )
					$larger_pages_array[] = $i;

			$larger_page_start = 0;
			foreach ( $larger_pages_array as $larger_page ) {
				if ( $larger_page < ($start_page - $half_page_start) && $larger_page_start < $larger_page_to_show ) {
					$out .= $instance->get_single( $larger_page, $options['page_text'], array(
						'class' => "{$class_names['smaller']} {$class_names['page']}",
						'title' => sprintf( __( 'Page %s', 'wp-pagenavi' ), number_format_i18n( $larger_page ) ),
					) );
					$larger_page_start++;
				}
			}

			if ( $larger_page_start )
				$out .= "<span class='{$class_names['extend']}'>{$options['dotleft_text']}</span>";

			// Page numbers
			$timeline = 'smaller';
			foreach ( range( $start_page, $end_page ) as $i ) {
				if ( $i == $paged && !empty( $options['current_text'] ) ) {
					$current_page_text = str_replace( '%PAGE_NUMBER%', number_format_i18n( $i ), $options['current_text'] );
					$out .= "<span aria-current='page' class='{$class_names['current']}'>$current_page_text</span>";
					$timeline = 'larger';
				} else {
					$out .= $instance->get_single( $i, $options['page_text'], array(
						'class' => "{$class_names['page']} {$class_names[$timeline]}",
						'title' => sprintf( __( 'Page %s', 'wp-pagenavi' ), number_format_i18n( $i ) ),
					) );
				}
			}

			// Large pages
			$larger_page_end = 0;
			$larger_page_out = '';
			foreach ( $larger_pages_array as $larger_page ) {
				if ( $larger_page > ($end_page + $half_page_end) && $larger_page_end < $larger_page_to_show ) {
					$larger_page_out .= $instance->get_single( $larger_page, $options['page_text'], array(
						'class' => "{$class_names['larger']} {$class_names['page']}",
						'title' => sprintf( __( 'Page %s', 'wp-pagenavi' ), number_format_i18n( $larger_page ) ),
					) );
					$larger_page_end++;
				}
			}

			if ( $larger_page_out ) {
				$out .= "<span class='{$class_names['extend']}'>{$options['dotright_text']}</span>";
			}
			$out .= $larger_page_out;

			if ( $end_page < $total_pages ) {
				if ( !empty( $options['dotright_text'] ) )
					$out .= "<span class='{$class_names['extend']}'>{$options['dotright_text']}</span>";
			}

			// Next
			if ( $paged < $total_pages && !empty( $options['next_text'] ) ) {
				$out .= $instance->get_single( $paged + 1, $options['next_text'], array(
					'class' => $class_names['nextpostslink'],
					'rel'   => 'next',
					'aria-label' => __('Next Page'),
				) );
			}

			if ( $end_page < $total_pages ) {
				// Last
				$out .= $instance->get_single( $total_pages, __( $options['last_text'], 'wp-pagenavi' ), array(
					'class' => $class_names['last'],
					'aria-label' => __('Last Page'),
				), '%TOTAL_PAGES%' );
			}
			break;

		// Dropdown
		case 2:
			$out .= '<form action="" method="get">'."\n";
			$out .= '<select size="1" onchange="document.location.href = this.options[this.selectedIndex].value;">'."\n";

			foreach ( range( 1, $total_pages ) as $i ) {
				$page_num = $i;
				if ( $page_num == 1 )
					$page_num = 0;

				if ( $i == $paged ) {
					$current_page_text = str_replace( '%PAGE_NUMBER%', number_format_i18n( $i ), $options['current_text'] );
					$out .= '<option value="'.esc_url( $instance->get_url( $page_num ) ).'" selected="selected" class="'.$class_names['current'].'">'.$current_page_text."</option>\n";
				} else {
					$page_text = str_replace( '%PAGE_NUMBER%', number_format_i18n( $i ), $options['page_text'] );
					$out .= '<option value="'.esc_url( $instance->get_url( $page_num ) ).'">'.$page_text."</option>\n";
				}
			}

			$out .= "</select>\n";
			$out .= "</form>\n";
			break;

		// Dropdown
		case 3:

			// Text
			if ( !empty( $options['pages_text'] ) ) {
				$pages_text = str_replace(
					array( "%CURRENT_PAGE%", "%TOTAL_PAGES%" ),
					array( number_format_i18n( $paged ), number_format_i18n( $total_pages ) ),
					__( $options['pages_text'], 'wp-pagenavi' ) );
				$out .= "<span class='{$class_names['pages']}'>$pages_text</span>";
			}

			if ( $start_page >= 2 && $pages_to_show < $total_pages ) {
				// First
				$first_text = str_replace( '%TOTAL_PAGES%', number_format_i18n( $total_pages ), __( $options['first_text'], 'wp-pagenavi' ) );
				$out .= $instance->get_single( 1, $first_text, array(
					'class' => $class_names['first'],
					'aria-label' => __('First Page'),
				), '%TOTAL_PAGES%' );
			}

			// Previous
			if ( $paged > 1 && !empty( $options['prev_text'] ) ) {
				$out_li = $instance->get_single( $paged - 1, $options['prev_text'], array(
					'class' => $class_names['previouspostslink'],
					'rel'   => 'prev',
					'aria-label' => __('Previous Page'),
				) );
				$out .= sprintf('<li class="%s">%s</li>', $class_names['previouspostslink'], $out_li );
			}

			if ( $start_page >= 2 && $pages_to_show < $total_pages ) {
				if ( !empty( $options['dotleft_text'] ) )
					$out .= sprintf('<li class="%s"><span>%s</span></li>', $class_names['extend'], $options['dotleft_text']);
			}

			// Smaller pages
			$larger_pages_array = array();
			if ( $larger_page_multiple )
				for ( $i = $larger_page_multiple; $i <= $total_pages; $i+= $larger_page_multiple )
					$larger_pages_array[] = $i;

			$larger_page_start = 0;
			foreach ( $larger_pages_array as $larger_page ) {
				if ( $larger_page < ($start_page - $half_page_start) && $larger_page_start < $larger_page_to_show ) {
					$out_li = $instance->get_single( $larger_page, $options['page_text'], array(
						'class' => "{$class_names['smaller']} {$class_names['page']}",
						'title' => sprintf( __( 'Page %s', 'wp-pagenavi' ), number_format_i18n( $larger_page ) ),
					) );
					$out .= sprintf('<li class="%s">%s</li>', $class_names['smaller'], $out_li);
					$larger_page_start++;
				}
			}

			if ( $larger_page_start )
				$out .= sprintf('<li class="%s"><span>%s</span></li>', $class_names['extend'], $options['dotleft_text']);

			// Page numbers
			$timeline = 'smaller';
			foreach ( range( $start_page, $end_page ) as $i ) {
				if ( $i == $paged && !empty( $options['current_text'] ) ) {
					$current_page_text = str_replace( '%PAGE_NUMBER%', number_format_i18n( $i ), $options['current_text'] );
					$out_li = "<span aria-current='page' class='{$class_names['current']}'>$current_page_text</span>";
					$out .= sprintf('<li class="%s"><a href="" >%s</a></li>', $class_names['current'], $out_li);
					$timeline = 'larger';
				} else {
					$out_li = $instance->get_single( $i, $options['page_text'], array(
						'class' => "{$class_names['page']} {$class_names[$timeline]}",
						'title' => sprintf( __( 'Page %s', 'wp-pagenavi' ), number_format_i18n( $i ) ),
					) );
					$out .= sprintf('<li>%s</li>', $out_li);
				}
			}

			// Large pages
			$larger_page_end = 0;
			$larger_page_out = '';
			foreach ( $larger_pages_array as $larger_page ) {
				if ( $larger_page > ($end_page + $half_page_end) && $larger_page_end < $larger_page_to_show ) {
					$larger_page_out_li = $instance->get_single( $larger_page, $options['page_text'], array(
						'class' => "{$class_names['larger']} {$class_names['page']}",
						'title' => sprintf( __( 'Page %s', 'wp-pagenavi' ), number_format_i18n( $larger_page ) ),
					) );
					$larger_page_out .= sprintf('<li>%s</li>', $larger_page_out_li);
					$larger_page_end++;
				}
			}

			if ( $larger_page_out ) {
				$out .= sprintf('<li class="%s">%s</li>', $class_names['extend'], $options['dotright_text']);
			}
			$out .= $larger_page_out;

			if ( $end_page < $total_pages ) {
				if ( !empty( $options['dotright_text'] ) )
					$out .= sprintf('<li class="%s"><span>%s</span></li>', $class_names['extend'], $options['dotright_text']);
			}

			// Next
			if ( $paged < $total_pages && !empty( $options['next_text'] ) ) {
				$out_li = $instance->get_single( $paged + 1, $options['next_text'], array(
					'class' => $class_names['nextpostslink'],
					'rel'   => 'next',
					'aria-label' => __('Next Page'),
				) );
				$out .= sprintf('<li class="%s">%s</li>', $class_names['nextpostslink'], $out_li);
			}

			if ( $end_page < $total_pages ) {
				// Last
				$out .= $instance->get_single( $total_pages, __( $options['last_text'], 'wp-pagenavi' ), array(
					'class' => $class_names['last'],
					'aria-label' => __('Last Page'),
				), '%TOTAL_PAGES%' );
			}
			break;
	}
	$out = $before . "<" . $wrapper_tag . " class='" . $wrapper_class . "' role='navigation'>\n$out\n</" . $wrapper_tag . ">" . $after;

	$out = apply_filters( 'wp_pagenavi', $out, $args );

	if ( !$echo )
		return $out;

	echo $out;
}


function term_pagenavi($data, $per_page = 48)
{
	$paged = isset($_GET['term_page']) ? intval($_GET['term_page']) : 1;
	if($paged < 1) $paged = 1;
	$max_terms = count($data);
	$max_page = intval(ceil($max_terms/$per_page));

	$li_str = '';
	if ($paged > 1) {
		$li_str .= sprintf(
			'<li class="prev"><a href="%s">PREW</a></li>',
			add_query_arg('term_page', $paged - 1)
		);
	}
	for ($i=1; $i <= $max_page ; $i++) { 
		$li_str .= sprintf(
			'<li class="%2$s"><a href="%3$s" >%1$s</a></li>', 
			$i,
			$i == $paged ? 'act' : '',
			add_query_arg('term_page', $i)
		);
	}
	if ($paged < $max_page) {
		$li_str .= sprintf(
			'<li class="next"><a href="%s">NEXT</a></li>',
			add_query_arg('term_page', $paged + 1)
		);
	}

	return sprintf('<ul class="pager mt25">%s</ul>', $li_str);

}