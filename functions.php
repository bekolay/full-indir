<?php 
$temayolu = get_bloginfo('template_directory');
$siteyolu = get_bloginfo('url');

add_theme_support('nav_menus');
add_theme_support('nax_menus');
add_action('init','my_menus');
function my_menus(){
	register_nav_menus(
		array(
			'header-menu' => 'Header Menü',
			'footer-menu' => 'Footer Menü',
			'kategori-menu' => 'Kategori Menü',
		)
	);
}

	add_action('after_setup_theme', 'remove_admin_bar');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
        function remove_admin_bar(){
        show_admin_bar(false);
    }

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}

add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


function hs_image_editor_default_to_gd( $editors ) {
$gd_editor = 'WP_Image_Editor_GD';
$editors = array_diff( $editors, array( $gd_editor ) );
array_unshift( $editors, $gd_editor );
return $editors;
}
add_filter( 'wp_image_editors', 'hs_image_editor_default_to_gd' );

function ilktemam_logo_ozelligi() {
 $varsayilanlar= array(
 'height'      => 50, // Logo resminin yüksekliği
 'width'       => 200, // Logo resminin genişliği
 'flex-height' => true, // Kırparken fare ile yükseklik değiştirilebilir
 'flex-width'  => true, // Kırparken fare ile genişlik değiştirilebilir
 'header-text' => array( 'site-title', 'site-description' ), // logo eklendiğinde, site başlığını ve sloganını sakla
 );
 add_theme_support( 'custom-logo', $varsayilanlar);
}
add_action( 'after_setup_theme', 'ilktemam_logo_ozelligi' );

function kategori_ismi($ayirici = '') { //$ayirici the_category() fonksiyonunda da var
    $kategoriler = (array) get_the_category(); //kategorileri çağıralım

    $liste = '';
    foreach($kategoriler as $kategori) {    // herbiri icin düzeltelim
        $liste .= $ayirici . $kategori->category_nicename; //linksiz halde seo uyumlu "slug" versiyonu çağıralım
    }
    echo $liste; //yazdıralım
}


class wp_bootstrap_navwalker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu-col-1\">\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';


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
                $class_names .= 'active';

            $class_names = $class_names ? ' class="nav-item ' . esc_attr( $class_names ) . '"' : '';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $value . $class_names .'>';

            $atts = array();
            $atts['title']  = ! empty( $item->title )   ? $item->title  : '';
            $atts['target'] = ! empty( $item->target )  ? $item->target : '';
            $atts['rel']    = ! empty( $item->xfn )     ? $item->xfn    : '';


            if ( $args->has_children && $depth === 0 ) {
                $atts['href']           = '#';
                $atts['data-toggle']    = 'dropdown';
                $atts['class']          = 'dropdown-toggle';
                $atts['role']           = 'button';
                $atts['aria-haspopup']  = 'true';
                $atts['aria-expanded']  = 'false';



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


            if ( ! empty( $item->attr_title ) )
                $item_output .= '<a '. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
            else
                $item_output .= '<a class="nav-link active yaziboyut1"'. $attributes .'>';
            $item_output .='';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            //$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
            $item_output .='';
            $item_output .= ( $args->has_children && 0 === $depth ) ? ' </a>' : '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }


    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];


        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }


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

            $fb_output .= '<nav id="dropdown" class="template-main-menu"><ul class="dropdown-menu-col-1"';

            if ( $menu_id )
                $fb_output .= ' id="' . $menu_id . '"';

            if ( $menu_class )
                $fb_output .= ' class="' . $menu_class . '"';


            if ( $container )
                $fb_output .= '</' . $container . '>';

            echo $fb_output;
        }
    }
}

class wp_bootstrap_navwalker2 extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu-col-1\">\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';


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
                $class_names .= 'active';

            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';


            $atts = array();
            $atts['title']  = ! empty( $item->title )   ? $item->title  : '';
            $atts['target'] = ! empty( $item->target )  ? $item->target : '';
            $atts['rel']    = ! empty( $item->xfn )     ? $item->xfn    : '';


            if ( $args->has_children && $depth === 0 ) {
                $atts['href']           = '#';
                $atts['data-toggle']    = 'dropdown';
                $atts['class']          = 'dropdown-toggle';
                $atts['role']           = 'button';
                $atts['aria-haspopup']  = 'true';
                $atts['aria-expanded']  = 'false';



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


            if ( ! empty( $item->attr_title ) )
                $item_output .= '<a '. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
            else
                $item_output .= '<button class="categories-btn"><a class="cizgikaldir" '. $attributes .' '. $attributes .'>';
            $item_output .='<span class="yazirenk3 yaziboyut1">';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            //$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
            $item_output .='</span>';
            $item_output .= ( $args->has_children && 0 === $depth ) ? ' </a></button>' : '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

      


        }
    }


    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];


        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }


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

            $fb_output .= '<nav id="dropdown" class="template-main-menu"><ul class="dropdown-menu-col-1"';

            if ( $menu_id )
                $fb_output .= ' id="' . $menu_id . '"';

            if ( $menu_class )
                $fb_output .= ' class="' . $menu_class . '"';


            if ( $container )
                $fb_output .= '</' . $container . '>';

            echo $fb_output;
        }
    }
}




function aramafilitresi($query){
	if($query ->is_search && !$query->is_admin){
		$query->set('post_type','post');
	}
	return $query;
}

function the_paganation(){
    if(is_singular()) return;
    global $wp_query;

    if($wp_query->max_num_pages <= 1) return;
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max  = intval($wp_query ->max_num_pages);

    /*for ($i=1; $i <= $max ; $i++) { 
        $links[] = $i; 
        }
        */

        if($paged >= 1)
            $links[] = $paged;
        
        if($paged >= 3){
            $links[] = $paged-1;
        }

        if($paged+1 <= $max){
            $links[] = $paged+1;
        }
        echo '<div class="pagination-layout1 mt-5"><ul>';
        if(!in_array(1,$links)){
            $class = 1 == $paged ? ' class="active kutuyukseklik"': "";
            printf('<li class="kutuyukseklik" ><a class"%s" href="%s">%s</a></li>', $class,esc_url(get_pagenum_link(1)),'1');
        }


            sort($links);
            foreach((array) $links as $link) {
                $class = $paged == $link ? ' class="active kutuyukseklik"': "";
                printf('<li class="kutuyukseklik" ><a class"%s" href="%s">%s</a></li>', $class,esc_url(get_pagenum_link($link)),$link);
            
        }
        if(!in_array($max,$links)){
            $class = $max == $paged ? ' class="active kutuyukseklik"': "";
            printf('<li class="kutuyukseklik"><a class"%s" href="%s">%s</a></li>', $class,esc_url(get_pagenum_link($max)),$max);
        }    
        echo '</ul></div>';   
    }
    


 ?>