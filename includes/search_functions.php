<?php
/*search*/
function add_search_to_wp_menu ( $items, $args ) {
	if( 'primary' === $args -> theme_location ) {
		
		$items .= '<li class="menu-item menu-item-search">';
		$items .= '<form method="get" class="menu-search-form" action="' . get_bloginfo('home') . '/"><p><input class="text_input" type="text" value="Enter Text &amp; Click to Search" name="s" id="s" onfocus="if (this.value == \'Enter Text &amp; Click to Search\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \'Enter Text &amp; Click to Search\';}" /><input type="submit" class="my-wp-search" id="searchsubmit" value="search" /></p></form>';
		$items .= '</li>';
	}
return $items;
}
add_filter('wp_nav_menu_items','add_search_to_wp_menu',10,2);

/*search support*/

add_theme_support('html5', array('search-form'));
/*end search*/


/**
*include category and post tag name in search
 */ 
add_filter( 'posts_join', 'custom_posts_join', 10, 2 );
/**
 * Callback for WordPress 'posts_join' filter.'
 * 
 * @global $wpdb
 * @see https://codex.wordpress.org/Class_Reference/wpdb
 * 
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 * 
 * @param  string   $join     The sql JOIN clause.
 * @param  WP_Query $wp_query The current WP_Query instance.
 * @return string   $join     The sql JOIN clause.
 */
function custom_posts_join( $join, $query ) {
    
    global $wpdb;
    //* if main query and search...
    if ( is_main_query() && is_search() ) {
        
        //* join term_relationships, term_taxonomy, and terms into the current SQL where clause
        $join .= "
        LEFT JOIN 
        ( 
            {$wpdb->term_relationships}
            INNER JOIN 
                {$wpdb->term_taxonomy} ON {$wpdb->term_taxonomy}.term_taxonomy_id = {$wpdb->term_relationships}.term_taxonomy_id 
            INNER JOIN 
                {$wpdb->terms} ON {$wpdb->terms}.term_id = {$wpdb->term_taxonomy}.term_id 
        ) 
        ON {$wpdb->posts}.ID = {$wpdb->term_relationships}.object_id ";
        
    }
    return $join;
    
}
/**
 * Do not include php tags
 */ 
add_filter( 'posts_where', 'custom_posts_where', 10, 2 );
/**
 * Callback for WordPress 'posts_where' filter.
 * 
 * Modify the where clause to include searches against a WordPress taxonomy.
 * 
 * @see https://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 * 
 * @param  string   $where The where clause.
 * @param  WP_Query $query The current WP_Query.
 * @return string          The where clause.
 */ 
function custom_posts_where( $where, $query ) {
    
    global $wpdb;
    if ( is_main_query() && is_search() ) {
        
        //* get additional where clause for the user
        $user_where = get_user_posts_where();
        
        $where .= " OR (
                        {$wpdb->term_taxonomy}.taxonomy IN( 'category', 'post_tag' ) 
                        AND
                        {$wpdb->terms}.name LIKE '%" . esc_sql( get_query_var( 's' ) ) . "%'
                        {$user_where}
                    )";
                    
    }
    return $where;
    
}
/**
 * Get a where clause dependent on the current user's status.
 *
 * @global $wpdb
 * @see https://codex.wordpress.org/Class_Reference/wpdb
 * 
 * @uses get_current_user_id()
 * @see http://codex.wordpress.org/Function_Reference/get_current_user_id
 * 
 * @return string The user where clause.
 */
function get_user_posts_where() {
    
    global $wpdb;
    $user_id = get_current_user_id();
    $sql     = '';
    $status  = array( "'publish'" );
    if ( 0 !== $user_id ) {
        
        $status[] = "'private'";
        
        $sql .= " AND {$wpdb->posts}.post_author = " . absint( $user_id );
        
    }
    $sql .= " AND {$wpdb->posts}.post_status IN( " . implode( ',', $status ) . " ) ";
    
    return $sql;
    
}
/**
 * Do not include php tags
 */ 
add_filter( 'posts_groupby', 'custom_posts_groupby', 10, 2 );
/**
 * Callback for WordPress 'posts_groupby' filter.
 * 
 * Set the GROUP BY clause to post IDs.
 * 
 * @global $wpdb
 * @see https://codex.wordpress.org/Class_Reference/wpdb
 * 
 * @param  string   $groupby The GROUPBY caluse.
 * @param  WP_Query $query   The current WP_Query object.
 * @return string            The GROUPBY clause.
 */ 
function custom_posts_groupby( $groupby, $query ) {
    
    global $wpdb;
    //* if is main query and a search...
    if ( is_main_query() && is_search() ) {
        $groupby = "{$wpdb->posts}.ID";
    }
    return $groupby;
    
}
?>