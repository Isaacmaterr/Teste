<?php global $smof_data, $header_setings, $post;    $data_parallax = $c_pageID = null;    if($post){        $c_pageID = $post->ID;    }    /* object menu */    $menus = wp_get_nav_menus();    /* array menu id */    $menus_id = array();    if(!empty($menus)){        foreach ($menus as $menu){            $menus_id[] = $menu->term_id;        }    }    /* menu location */    $menu_locations = get_nav_menu_locations();    $main_navigation = null;    if(!empty($menu_locations) && isset($menu_locations['main_navigation'])){         $main_navigation = $menu_locations['main_navigation'];    }    /* custom logo */    $logo = get_post_meta($c_pageID, 'cs_header_logo_image', true);    $sticky_logo = get_post_meta($c_pageID, 'cs_sticky_header_logo_image', true);    $cs_custom_logo_sticky = get_post_meta(get_the_ID(), 'cs_custom_logo_sticky', true);     $cs_hidden_logo_page = get_post_meta(get_the_ID(), 'cs_hidden_logo_page', true);         /** data parallax */    if($smof_data['header_bg_parallax'] && !empty($smof_data['background-header']['media'])){        $data_parallax = " data-stellar-background-ratio='0.6' data-background-width='{$smof_data['background-header']['media']['width']}' data-background-height='{$smof_data['background-header']['media']['height']}'";    }    if(is_page()){        $header_full_width = get_post_meta(get_the_ID(), 'cs_header_full_width', true);        $cs_logo_width = get_post_meta(get_the_ID(), 'cs_logo_width', true);         if($header_full_width != ''){            $smof_data['header_full_width'] = $header_full_width;        }        if($cs_logo_width != ''){            $smof_data['logo_width'] = $cs_logo_width;        }    }?><div class="header header-v1">    <?php if ($smof_data['header_top_widgets'] =='1' && (is_active_sidebar('cshero-header-top-widget-1') || is_active_sidebar('cshero-header-top-widget-2'))): ?>    <div id="header-top" <?php echo ''.$header_setings->top_padding; ?>>        <div class="<?php echo ($smof_data['header_full_width'])?'no-container':'container';?>">            <div class="row">                <div class="header-top clearfix">                    <div class='header-top-1 <?php echo esc_attr($smof_data['header_top_widgets_1']); ?>'>                        <?php   if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Top Widget 1")):                        endif;?>                    </div>                    <?php if ($smof_data['header_top_widgets_columns'] != '1') : ?>                        <div class='header-top-2 <?php echo esc_attr($smof_data['header_top_widgets_2']); ?>'>                            <?php   if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Top Widget 2")):                            endif;?>                        </div>                    <?php endif; ?>                    <?php if ($smof_data['header_top_widgets_columns'] != '2') : ?>                        <div class='header-top-3 <?php echo esc_attr($smof_data['header_top_widgets_3']); ?>'>                            <?php   if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Top Widget 3")):                            endif;?>                        </div>                    <?php endif; ?>                </div>            </div>        </div>    </div>    <?php endif;?>    <div id="cshero-header" class="stripe-parallax-bg <?php if(is_active_sidebar('woocommerce-cart-header')){ ?> cart-active <?php } ?> <?php if($cs_hidden_logo_page == '1') { ?> hidden-logo <?php } ?> <?php if (!$smof_data['header_sticky_mobile']) { echo 'no-sticky-mobile'; } ?> <?php if (!$smof_data['header_sticky_tablet']) { echo 'no-sticky-tablet'; } ?> <?php if($smof_data['header_fixed_top']){ echo ' transparentFixed';} ?>"<?php echo ''.$data_parallax; ?>>        <div class="<?php echo ($smof_data['header_full_width'])?'no-container':'container';?>">            <div class="row">                <div class="logo <?php if($cs_custom_logo_sticky == '1') { ?>custom-logo-sticky <?php } ?> logo-line-height-nav col-xs-6 col-sm-6 col-md-3 col-lg-3">                    <a class="main-logo" href="<?php echo esc_url(home_url()); ?>">                        <img src="<?php echo esc_url($logo ? wp_get_attachment_url($logo) : $smof_data['logo']['url']); ?>" alt="<?php esc_attr(bloginfo('name')); ?>"                             style="max-height: <?php echo esc_attr($smof_data["logo_width"]); ?>" class="normal-logo logo-v1"/>                    </a>                    <?php if($cs_custom_logo_sticky == '1') { ?>                        <a class="sticky-logo" href="<?php echo esc_url(home_url()); ?>">                            <img src="<?php echo wp_get_attachment_url($sticky_logo); ?>"                                 style="max-height: <?php echo esc_attr($smof_data["logo_width"]); ?>" class="normal-logo logo-v1"/>                        </a>                    <?php } ?>                </div>                <div id="menu" class=" main-menu-wrap col-xs-6 col-sm-6 col-md-9 col-lg-9">                    <div class="cs-main-menu-wrap <?php echo esc_attr($smof_data["menu_position"]); ?> clearfix">                                                 <div class="cshero-header-content-widget cshero-menu-mobile hidden-lg hidden-md right">                            <div class="cshero-header-content-widget-inner">                                <a class="btn-navbar" data-toggle="collapse" data-target="#cshero-main-menu-mobile" href="#" ><i class=""></i></a>                            </div>                        </div>                        <div class="cs_mega_menu main-menu-content cshero-menu-dropdown clearfix cshero-mobile right">                            <?php                            $megamenu = null;                            if(class_exists('HeroMenuWalker')){                                $megamenu = new HeroMenuWalker();                            }                            $custom_main_navigation = get_post_meta($c_pageID, 'cs_main_navigation', true);                            if (in_array($main_navigation, $menus_id) || in_array($custom_main_navigation, $menus_id)) {                                echo '<ul class="cshero-dropdown main-menu menu-item-padding">';                                wp_nav_menu(array('theme_location' => 'main_navigation','menu'=>$custom_main_navigation, 'depth' => 5, 'container' => false, 'menu_id' => 'nav', 'items_wrap' => '%3$s', 'walker'=>$megamenu));                                if(isset($smof_data['enable_hidden_sidebar']) && $smof_data['enable_hidden_sidebar']){                                    echo '<li class="cshero-hidden-sidebar hidden-xs hidden-sm">';                                        echo '<a href="#"><span class="'.esc_attr($smof_data["hidden_sidebar_icon"]).' cs_open">';                                            if(isset($smof_data['hidden_sidebar_text']) && $smof_data['hidden_sidebar_text']){                                                echo '<i>"'.esc_attr($smof_data["hidden_sidebar_text"]).'"</i>';                                            }                                        echo '</span></a>';                                       echo '</li>';                                    }                                echo '</ul>';                            } elseif (empty($menus_id)) {                                echo '<div class="menu-pages">';                                wp_nav_menu(array('depth' => 5, 'container' => false, 'menu_id' => 'nav', 'items_wrap' => '%3$s'));                                echo '</div>';                            } else {                                echo '<ul class="cshero-dropdown main-menu menu-item-padding">';                                wp_nav_menu(array('depth' => 5, 'container' => false, 'menu_id' => 'nav', 'items_wrap' => '%3$s', 'walker'=>$megamenu));                                if(isset($smof_data['enable_hidden_sidebar']) && $smof_data['enable_hidden_sidebar']){                                    echo '<li class="cshero-hidden-sidebar hidden-xs hidden-sm">';                                        echo '<a href="#"><span class="'.esc_attr($smof_data["hidden_sidebar_icon"]).' cs_open">';                                            if(isset($smof_data['hidden_sidebar_text']) && $smof_data['hidden_sidebar_text']){                                                echo '<i>"'.esc_attr($smof_data["hidden_sidebar_text"]).'"</i>';                                            }                                        echo '</span></a>';                                      echo '</li>';                                    }                                echo '</ul>';                            }                            ?>                        </div>                     </div>                    <?php if(is_active_sidebar('woocommerce-cart-header')){ ?>                        <div class="cshero-header-cart">                            <?php   if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Woocommerce Cart Header")): endif;?>                        </div>                    <?php } ?>                </div>                <div id="cshero-main-menu-mobile" class="collapse navbar-collapse cshero-mmenu"></div>            </div>        </div>        <?php if(isset($smof_data['sticky_border_bottom_image']) && $smof_data['sticky_border_bottom_image']){ ?>            <div class="border-sticky-image">                <img src="<?php echo ''.$smof_data['border_bottom_image']['url']; ?>" alt="" />            </div>        <?php } ?>     </div></div>