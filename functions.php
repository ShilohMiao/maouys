<?php


//禁用ajax.googleapis.com
function hc_cdn_callback($buffer) {  
    return str_replace('googleapis.com', 'useso.com', $buffer);  
}  
function hc_buffer_start() {  
    ob_start("hc_cdn_callback");  
}  
function izt_buffer_end() {  
    ob_end_flush();  
}  
add_action('init', 'hc_buffer_start');  
add_action('shutdown', 'hc_buffer_end'); 


//使WordPress支持post thumbnail
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}



/*
 * 自定义内容类型 － 程序代码
 */
function maouys_custom_post_type_resources(){
    $labels = array(
        'name'               => '技术·代码',
        'singular_name'      => '技术·代码',
        'add_new'            => '添加程序代码',
        'add_new_item'       => '添加程序代码资料',
        'edit_item'          => '编辑程序代码资料',
        'new_item'           => '新程序代码',
        'all_items'          => '所有程序代码',
        'view_item'          => '查看程序代码',
        'search_items'       => '搜索程序代码',
        'not_found'          => '没找到程序代码资料',
        'not_found_in_trash' => '回收站里没找到程序代码资料', 
        'menu_name'          => '技术·代码'
    );
    $args = array(
        'public' => true,
        'labels'  => $labels,
        'menu_position' => 4,
        'supports' => array( 'title','editor','thumbnail','excerpt','custom-fields','revisions' ),
        'has_archive' => true,
        'rewrite' => array( 'with_front' => false ),
    );
    register_post_type( 'resources', $args );
}
add_action('init','maouys_custom_post_type_resources');

/*
 * 自定义内容类型的内容更新信息 - 程序代码
 */
function maouys_resources_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['resources'] = array(
    0 => '', // 没有用，信息从索引 1 开始。
    1 => sprintf( __('程序代码已更新，<a href="%s">点击查看</a>', 'maouys'), esc_url( get_permalink($post_ID) ) ),
    2 => __('自定义字段已更新。', 'maouys'),
    3 => __('自定义字段已删除。', 'maouys'),
    4 => __('程序代码已更新。', 'maouys'),
    // translators: %s: 修订版本的日期与时间 
    5 => isset($_GET['revision']) ? sprintf( __('程序代码恢复到了 %s 这个修订版本。', 'maouys'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('程序代码已发布，<a href="%s">点击查看</a>', 'maouys'), esc_url( get_permalink($post_ID) ) ),
    7 => __('程序代码已保存', 'maouys'),
    8 => sprintf( __('程序代码已提交， <a target="_blank" href="%s">点击预览</a>', 'maouys'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('程序代码发布于：<strong>%1$s</strong>， <a target="_blank" href="%2$s">点击预览</a>', 'maouys'),
      // translators: 发布选项日期格式，查看 http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('程序代码草稿已更新，<a target="_blank" href="%s">点击预览</a>', 'maouys'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'maouys_resources_updated_messages' );

/*
 * 自定义分类法1 - 程序代码类型
 */
function maouys_custom_taxonomy_genre_resources(){
    $labels = array(
      'name'                         => '分类',
      'singular_name'                => '分类',
      'search_items'                 => '搜索分类',
      'popular_items'                => '热门分类',
      'all_items'                    => '所有分类',
      'parent_item'                  => null,
      'parent_item_colon'            => null,
      'edit_item'                    => '编辑分类',
      'update_item'                  => '更新分类',
      'add_new_item'                 => '添加新分类',
      'new_item_name'                => '新分类',
      'separate_items_with_commas'   => '使用逗号分隔不同的分类',
      'add_or_remove_items'          => '添加或移除分类',
      'choose_from_most_used'        => '从使用最多的分类里选择',
      'menu_name'                    => '分类目录'
    );
    $args = array(
        'public' => true,
        'labels' => $labels,
        'show_in_nav_menus' => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'query_var'         => true,
        'rewrite'           => true,
        'show_admin_column' => true,
    );
    register_taxonomy( 'genre_resources','resources',$args );
}
add_action('init','maouys_custom_taxonomy_genre_resources');

/*
 * 设计类型分类钩子定义 - 程序代码分类
 */

function maouys_genre_resources( $post_ID = false ){
    if( $post_ID === false ) $post_ID = get_the_ID();
    $terms = get_the_terms( $post_ID, 'genre_resources' );
    if( !empty( $terms ) ){
            foreach( $terms as $term ){
                $name = $term->name;
                $link = esc_url( get_term_link( $term, 'genre_resources' ) );
                echo "<a href='$link'>$name</a>";
            }
    } 
}








/*
 * 自定义内容类型 － 设计
 */
function maouys_custom_post_type_design(){
    $labels = array(
        'name'               => '设计',
        'singular_name'      => '设计',
        'add_new'            => '添加作品',
        'add_new_item'       => '添加作品资料',
        'edit_item'          => '编辑作品资料',
        'new_item'           => '新作品',
        'all_items'          => '所有作品',
        'view_item'          => '查看作品',
        'search_items'       => '搜索作品',
        'not_found'          => '没找到作品资料',
        'not_found_in_trash' => '回收站里没找到作品资料', 
        'menu_name'          => '设计'
    );
    $args = array(
        'public' => true,
        'labels'  => $labels,
        'menu_position' => 5,
        'supports' => array( 'title','editor','thumbnail','excerpt','custom-fields','revisions' ),
        'has_archive' => true,
        'rewrite' => array( 'with_front' => false ),
    );
    register_post_type( 'design', $args );
}
add_action('init','maouys_custom_post_type_design');

/*
 * 自定义内容类型的内容更新信息 - 作品
 */
function maouys_design_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['design'] = array(
    0 => '', // 没有用，信息从索引 1 开始。
    1 => sprintf( __('作品已更新，<a href="%s">点击查看</a>', 'maouys'), esc_url( get_permalink($post_ID) ) ),
    2 => __('自定义字段已更新。', 'maouys'),
    3 => __('自定义字段已删除。', 'maouys'),
    4 => __('作品已更新。', 'maouys'),
    // translators: %s: 修订版本的日期与时间 
    5 => isset($_GET['revision']) ? sprintf( __('作品恢复到了 %s 这个修订版本。', 'maouys'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('作品已发布，<a href="%s">点击查看</a>', 'maouys'), esc_url( get_permalink($post_ID) ) ),
    7 => __('作品已保存', 'maouys'),
    8 => sprintf( __('作品已提交， <a target="_blank" href="%s">点击预览</a>', 'maouys'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('作品发布于：<strong>%1$s</strong>， <a target="_blank" href="%2$s">点击预览</a>', 'maouys'),
      // translators: 发布选项日期格式，查看 http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('作品草稿已更新，<a target="_blank" href="%s">点击预览</a>', 'maouys'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'maouys_design_updated_messages' );

/*
 * 自定义分类法1 - 作品类型
 */
function maouys_custom_taxonomy_genre(){
    $labels = array(
      'name'                         => '分类',
      'singular_name'                => '分类',
      'search_items'                 => '搜索分类',
      'popular_items'                => '热门分类',
      'all_items'                    => '所有分类',
      'parent_item'                  => null,
      'parent_item_colon'            => null,
      'edit_item'                    => '编辑分类',
      'update_item'                  => '更新分类',
      'add_new_item'                 => '添加新分类',
      'new_item_name'                => '新分类',
      'separate_items_with_commas'   => '使用逗号分隔不同的分类',
      'add_or_remove_items'          => '添加或移除分类',
      'choose_from_most_used'        => '从使用最多的分类里选择',
      'menu_name'                    => '分类目录'
    );
    $args = array(
        'public' => true,
        'labels' => $labels,
        'show_in_nav_menus' => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'query_var'         => true,
        'rewrite'           => true,
        'show_admin_column' => true,
    );
    register_taxonomy( 'genre','design',$args );
}
add_action('init','maouys_custom_taxonomy_genre');

/*
 * 自定义分类法2 - 作品标签
 */
function maouys_custom_taxonomy_tags(){
    $labels = array(
      'name'                         => '标签',
      'singular_name'                => '标签',
      'search_items'                 => '搜索标签',
      'popular_items'                => '热门标签',
      'all_items'                    => '所有标签',
      'parent_item'                  => null,
      'parent_item_colon'            => null,
      'edit_item'                    => '编辑标签',
      'update_item'                  => '更新标签',
      'add_new_item'                 => '添加新标签',
      'new_item_name'                => '新标签',
      'separate_items_with_commas'   => '使用逗号分隔不同的标签',
      'add_or_remove_items'          => '添加或移除标签',
      'choose_from_most_used'        => '从使用最多的标签里选择',
      'menu_name'                    => '标签'
    );
    $args = array(
        'public' => true,
        'labels' => $labels,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'query_var'         => true,
        'rewrite'           => true,
        'show_admin_column' => true,
    );
    register_taxonomy( 'genre_tags','design',$args );
}
add_action('init','maouys_custom_taxonomy_tags');

/*
 * 设计类型分类钩子定义 - 作品分类
 */

function maouys_genre( $post_ID = false ){
    if( $post_ID === false ) $post_ID = get_the_ID();
    $terms = get_the_terms( $post_ID, 'genre' );
    if( !empty( $terms ) ){
            foreach( $terms as $term ){
                $name = $term->name;
                $link = esc_url( get_term_link( $term, 'genre' ) );
                echo "<li><a href='$link'>$name</a></li>";
            }
    } 
}

/*
 * 设计类型分类钩子定义 - 作品标签
 */

function maouys_genre_tags( $post_ID = false ){
    if( $post_ID === false ) $post_ID = get_the_ID();
    $terms = get_the_terms( $post_ID, 'genre_tags' );
    if( !empty( $terms ) ){
            foreach( $terms as $term ){
                $name = $term->name;
                $link = esc_url( get_term_link( $term, 'genre_tags' ) );
                echo "<a href='$link'>$name</a>";
            }
    } 
}








function maouys_setup(){
    //注册主菜单
    register_nav_menu( 'primary', __( '主菜单' ) );
    //注册文章边栏菜单
    register_nav_menu( 'primary_sid', __( '文章边栏菜单' ) );
    //注册作品分类菜单
    register_nav_menu( 'primary_detag', __( '作品分类菜单' ) );
    //注册程序代码分类菜单
    register_nav_menu( 'primary_zytag', __( '程序代码分类菜单' ) );
}
add_action( 'after_setup_theme','maouys_setup' );

/*
 * 网站的页面标题，来自 Twenty Twelve 1.0
 */

function maouys_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// 添加网站名称
	$title .= get_bloginfo( 'name' );

	// 为首页添加网站描述
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// 在页面标题中添加页码
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'fenikso' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'maouys_wp_title', 10, 2 );

/*
 * 自定义搜索框
 http://sc.chinaz.com/jiaoben/160127138650.htm#down
 */
 
function maouys_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" class="navbar-form navbar-right" action="' . home_url( '/' ) . '" onsubmit="submitFn(this, event);">
                <div class="search-wrapper">
                    <div class="input-holder input-group">
                        <input class="form-control" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="输入关键词..."/>
                        <button class="search-icon" onclick="searchToggle(this, event);" value="'. esc_attr__('Search') .'"><span></span></button>
                    </div>
                    <span class="close" onclick="searchToggle(this, event);"></span>
                </div>
            </form>';

    return $form;
}
add_filter( 'get_search_form', 'maouys_search_form' );

/**
 * Bootstrap导航栏
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
class wp_bootstrap_navwalker extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			if ( $args->has_children )
				$class_names .= ' dropdown';
			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			$output .= $indent . '<li' . $id . $value . $class_names .'>';
			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= '#';
				$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			$item_output = $args->before;
			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;
        $id_field = $this->db_fields['id'];
        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {
			extract( $args );
			$fb_output = null;
			if ( $container ) {
				$fb_output = '<' . $container;
				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';
				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';
				$fb_output .= '>';
			}
			$fb_output .= '<ul';
			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';
			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';
			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';
			if ( $container )
				$fb_output .= '</' . $container . '>';
			echo $fb_output;
		}
	}
}

//时间归档
// Return an alternate title, without prefix, for every type used in the get_the_archive_title().
 function maouys_time_date($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_year() ) {
        $title = get_the_date( _x( 'Y', 'yearly archives date format' ) );
    } elseif ( is_month() ) {
        $title = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
    } elseif ( is_day() ) {
        $title = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
    } elseif ( is_tax( 'post_format' ) ) {
        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
            $title = _x( 'Asides', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
            $title = _x( 'Galleries', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
            $title = _x( 'Images', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
            $title = _x( 'Videos', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
            $title = _x( 'Quotes', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
            $title = _x( 'Links', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
            $title = _x( 'Statuses', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
            $title = _x( 'Audio', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
            $title = _x( 'Chats', 'post format archive title' );
        }
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } else {
        $title = __( 'Archives' );
    }
    return $title;
};
add_filter('get_the_archive_title', 'maouys_time_date' );

//给图片添加标签
function ludou_create_media_category() {
  $args = array(
    'label' => '媒体分类',
    'hierarchical' => true,
    'show_admin_column' => true,
    'show_ui'      => true,
    'query_var'    => true,
    'rewrite'      => true,
  );

  register_taxonomy( 'attachment_category', 'attachment', $args );
}

add_action( 'init', 'ludou_create_media_category' );

/**
 * 隐藏核心更新提示 WP 3.0+
 * 来自 http://wordpress.org/plugins/disable-wordpress-core-update/
 */
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
 
/**
 * 隐藏插件更新提示 WP 3.0+
 * 来自 http://wordpress.org/plugins/disable-wordpress-plugin-updates/
 */
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$b', "return null;" ) );
 
/**
 * 隐藏主题更新提示 WP 3.0+
 * 来自 http://wordpress.org/plugins/disable-wordpress-theme-updates/
 */
remove_action( 'load-update-core.php', 'wp_update_themes' );
add_filter( 'pre_site_transient_update_themes', create_function( '$c', "return null;" ) );

//支持svg上传
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

//去掉content图片外的p标签
function filter_ptags_on_images($content){
return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

/*
 * 小工具
 */

function maouys_widgets_init() {
  register_sidebar( array(
    'name'          =>  __( 'Sidebar Bottom' ),
    'id'            =>  'sidebar-bottom',
    'description'   =>  __( 'Sidebar Bottom', 'fenikso' ),
    'before_widget' =>  '<div id="%1$s" class="%2$s"><section>',
    'after_widget'  =>  '</section></div>',
    'before_title'  =>  '<h5>',
    'after_title'   =>  '</h5>',
  ) );
  register_sidebar( array(
    'name'          =>  __( 'Sidebar Right', 'fenikso' ),
    'id'            =>  'sidebar-right',
    'description'   =>  __( 'Sidebar Right', 'fenikso' ),
    'before_widget' =>  '<div id="%1$s" class="%2$s"><section>',
    'after_widget'  =>  '</section></div>',
    'before_title'  =>  '<div class="title-line"><h3>',
    'after_title'   =>  '</h3></div>',
  ) );
  
}
add_action( 'widgets_init', 'maouys_widgets_init' );


//保护后台登录
 add_action('login_enqueue_scripts','login_protection');
 function login_protection(){
 if($_GET['password'] != '239hiQ7h1eFxVcyhg1gH')header('Location: http://sjfan.net/');
 }

//去掉标题中的类别名称
function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );


//增强编辑器功能
function add_editor_buttons($buttons) {
$buttons[] = 'fontselect';
$buttons[] = 'fontsizeselect';
$buttons[] = 'cleanup';
$buttons[] = 'styleselect';
$buttons[] = 'hr';
$buttons[] = 'del';
$buttons[] = 'sub';
$buttons[] = 'sup';
$buttons[] = 'copy';
$buttons[] = 'paste';
$buttons[] = 'cut';
$buttons[] = 'undo';
$buttons[] = 'image';
$buttons[] = 'anchor';
$buttons[] = 'backcolor';
$buttons[] = 'wp_page';
$buttons[] = 'charmap';
return $buttons;
}
add_filter("mce_buttons_3", "add_editor_buttons");


/**
 * WordPress 修改时间的显示格式为几天前
 * https://www.wpdaxue.com/time-ago.html
 */
function Bing_filter_time(){
	global $post ;
	$to = time();
	$from = get_the_time('U') ;
	$diff = (int) abs($to - $from);
	if ($diff <= 3600) {
		$mins = round($diff / 60);
		if ($mins <= 1) {
			$mins = 1;
		}
		$time = sprintf(_n('%s 分钟', '%s 分钟', $mins), $mins) . __( '前' , 'Bing' );
	}
	else if (($diff <= 86400) && ($diff > 3600)) {
		$hours = round($diff / 3600);
		if ($hours <= 1) {
			$hours = 1;
		}
		$time = sprintf(_n('%s 小时', '%s 小时', $hours), $hours) . __( '前' , 'Bing' );
	}
	elseif ($diff >= 86400) {
		$days = round($diff / 86400);
		if ($days <= 1) {
			$days = 1;
			$time = sprintf(_n('%s 天', '%s 天', $days), $days) . __( '前' , 'Bing' );
		}
		elseif( $days > 29){
			$time = get_the_date('F j日, Y');
		}
		else{
			$time = sprintf(_n('%s 天', '%s 天', $days), $days) . __( '前' , 'Bing' );
		}
	}
	return $time;
}
add_filter('the_time','Bing_filter_time');