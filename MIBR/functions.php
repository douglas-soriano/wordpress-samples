<?php
/* functions */

# - Registra os menus criados no tema
if (function_exists('register_nav_menu')) {
    register_nav_menu('menu_principal', 'Menu exibido na pagina principal');
    register_nav_menu('menu_rodape', 'Menu do rodapé');
}

# - Remove barra do Wordpress no topo do site
function remove_admin_bar() {
    return false;
}
add_filter("show_admin_bar", "remove_admin_bar");

# - Detecta dispositivo
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

# - Adiciona Imagem Destacada aos produtos
add_theme_support('post-thumbnails');
#add_post_type_support( 'produtos', 'thumbnail' );
#add_post_type_support( 'eventos', 'thumbnail' );

# - Remove paginação
add_action('pre_get_posts', function ($query) {
    if ($query->is_main_query() && ! is_admin() && $query->is_search()):
        $query->set('posts_per_page', -1);
    endif;
});

# - Limita textos
function limitText ($str, $limit=100) {
    return strlen($str) > $limit ? mb_substr($str, 0, $limit)."..." : $str;
}

# - Menu Active
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

# - Converte URL do Youtube para embed
function convertYoutube ($url, $autoplay=true) {
    return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"100%\" height=\"100%\" src=\"//www.youtube.com/embed/$1?".($autoplay?'autoplay=1&controls=0&showinfo=0&autohide=1&mute=1':'')."&rel=0\" frameborder=\"0\" allowfullscreen></iframe>",$url);
}

# - Convert URL do Youtube para code
function convertYoutubeToCode ($url) {
    return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "$1", $url);
}

# - Duplicar post
function rd_duplicate_post_as_draft(){
    global $wpdb;
    if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
        wp_die('No post to duplicate has been supplied!');
    }
    if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) ) return;
    $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
    $post = get_post( $post_id );
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;
    if (isset( $post ) && $post != null) {
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status'    => $post->ping_status,
            'post_author'    => $new_post_author,
            'post_content'   => $post->post_content,
            'post_excerpt'   => $post->post_excerpt,
            'post_name'      => $post->post_name,
            'post_parent'    => $post->post_parent,
            'post_password'  => $post->post_password,
            'post_status'    => 'draft',
            'post_title'     => $post->post_title,
            'post_type'      => $post->post_type,
            'to_ping'        => $post->to_ping,
            'menu_order'     => $post->menu_order
        );
        $new_post_id = wp_insert_post( $args );
        $taxonomies = get_object_taxonomies($post->post_type);
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }
        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($post_meta_infos)!=0) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ($post_meta_infos as $meta_info) {
              $meta_key = $meta_info->meta_key;
              if( $meta_key == '_wp_old_slug' ) continue;
              $meta_value = addslashes($meta_info->meta_value);
              $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query.= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }
        wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
        exit;
    } else {
        wp_die('Post creation failed, could not find original post: ' . $post_id);
    }
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );

# - Duplicar post
function rd_duplicate_post_link( $actions, $post ) {
  if (current_user_can('edit_posts')) {
    $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
  }
  return $actions;
}
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );

# - Limita texto
function limit_text ($content, $length = 400) {
    return mb_strimwidth($content, 0, $length, '...');
}

# - Paginação Bootstrap 4
if ( !function_exists( 'bt_pagination' ) ) {
    function bt_pagination () {
        global $wp_query;
        $pagination = paginate_links([
            'base' => str_replace(PHP_INT_MAX, '%#%', esc_url(get_pagenum_link(PHP_INT_MAX))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'type' => 'array',
            'prev_text' => sprintf('%1$s', __( 'Newer Posts', 'text-domain' ) ),
            'next_text' => sprintf('%1$s', __( 'Older Posts', 'text-domain' ) ),
            'prev_next' => false,
            'add_args' => false
        ]);
        $pag = '';
        if (!empty($pagination)):
            $pag .= '<ul class="pagination justify-content-center bt_pagination">';
            foreach ($pagination as $key => $page_link):
                $pag .= '<li class="page-item '.((strpos($page_link, 'current' ) !== false) ? 'active' : '').'">';
                $pag .=     str_replace('page-numbers', 'page-link', $page_link);
                $pag .= '</li>';
            endforeach;
            $pag .= '</ul>';
        endif;
        return $pag;
    }
}

# - ROOT do Wordpress
function fs_get_wp_root_path() {
    $base = dirname(__FILE__);
    $path = false;
    if (@file_exists(dirname(dirname($base))."/wp-config.php")) {
        $path = dirname(dirname($base)).'/';
    } else if (@file_exists(dirname(dirname(dirname($base)))."/wp-config.php")) {
        $path = dirname(dirname(dirname($base))).'/';
    } else $path = false;
    if ($path != false) {
        $path = str_replace("\\", "/", $path);
    }
    return $path;
}

# - Twitch - Pega Access Token e salva no banco periodicamente
function twitch_get_access_token () {
    # - Checa se access token ainda é válido
    if (!get_option('twitch_api_access_token_expire_at') || (strtotime('now') >= strtotime(get_option('twitch_api_access_token_expire_at')))):
        # - Inicia a API
        #require (ABSPATH . WPINC . '/Twitch/Twitch.php');
        $twitch_client_id = do_shortcode('[sv slug="twitch-client-id"]');
        $twitch_client_secret = do_shortcode('[sv slug="twitch-client-secret"]');
        # - Busca novo access token
        $tw = new Twitch($twitch_client_id, $twitch_client_secret);
        $response = $tw->getAccessToken();
        # - Salva os dados
        if ($response->success):
            $api_access_token = $response->response->access_token;
            if (get_option('twitch_api_access_token_expire_at')):
                update_option('twitch_api_access_token', $api_access_token);
                update_option('twitch_api_access_token_expire_at', date('Y-m-d H:i:s', strtotime('now') + $response->response->expires_in));
            else:
                add_option('twitch_api_access_token', $api_access_token);
                add_option('twitch_api_access_token_expire_at', date('Y-m-d H:i:s', strtotime('now') + $response->response->expires_in));
            endif;
        endif;
    endif;
}

# API

# - /streamers
function api_get_streamers () {
    require (ABSPATH . WPINC . '/Twitch/Twitch.php');

    twitch_get_access_token();

    $twitch_client_id = do_shortcode('[sv slug="twitch-client-id"]');
    $twitch_client_secret = do_shortcode('[sv slug="twitch-client-secret"]');

    $tw = new Twitch($twitch_client_id, $twitch_client_secret);
    $streamers_usernames = do_shortcode('[sv slug="twitch-streamers"]');
    if (!empty($streamers_usernames)):
        $streamers_usernames = str_replace(" ", "", $streamers_usernames);
        $streamers_usernames = explode(",", $streamers_usernames);
    endif;
    $streamers = $tw->getStreamers($streamers_usernames);
    return $streamers;
}
add_action('rest_api_init', function () {
    register_rest_route('mibr/v1', '/streamers', ['methods' => 'GET', 'callback' => 'api_get_streamers']);
});

# - /youtube/videos
function api_get_youtube_videos () {
    require (ABSPATH . WPINC . '/Youtube/Youtube.php');
    $yt = new Youtube();
    $channel_id = do_shortcode('[sv slug="youtube-channel-id"]');
    $videos = $yt->getVideos($channel_id);
    return $videos;
}
add_action('rest_api_init', function () {
    register_rest_route('mibr/v1', 'youtube/videos', ['methods' => 'GET', 'callback' => 'api_get_youtube_videos']);
});

# - Converte items do menu para array
function get_menu_items_as_array ($menu_name = 'menu_principal') {
    # - Busca dados
    $locations = get_nav_menu_locations();
    $nav_menu = wp_get_nav_menu_object($locations[$menu_name]);
    $items = wp_get_nav_menu_items($nav_menu->term_id);
    # - Monta array
    $menu = [];
    $n_menu = 0;
    $n_sub = 0;
    foreach ($items as $item):
        if (intval($item->menu_item_parent)):
            $n_sub++;
            $page_code = $n_menu.'_'.$n_sub;
        else:
            $n_sub = 0;
            $n_menu++;
            $page_code = $n_menu;
        endif;
        $menu[] = [
            'page_code' => $page_code,
            'title' => $item->title,
            'url' => $item->url,
            'is_sub' => intval($item->menu_item_parent) ? true : false
        ];
    endforeach;
    return $menu;
}

function create_ACF_meta_in_REST() {
    $postypes_to_exclude = ['acf-field-group','acf-field'];
    $extra_postypes_to_include = ["page"];
    $post_types = array_diff(get_post_types(["_builtin" => false], 'names'),$postypes_to_exclude);

    array_push($post_types, $extra_postypes_to_include);

    foreach ($post_types as $post_type) {
        register_rest_field( $post_type, 'ACF', [
            'get_callback'    => 'expose_ACF_fields',
            'schema'          => null,
       ]
     );
    }

}

function expose_ACF_fields( $object ) {
    $ID = $object['id'];
    return get_fields($ID);
}

add_action( 'rest_api_init', 'create_ACF_meta_in_REST' );