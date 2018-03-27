<!-- https://theme336-tile-stone.myshopify.com/ -->
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title><?php wp_title(' | '); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <![endif]-->

        <?php if (is_singular()): ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php endif; ?>

        <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fontawesome-free-5.0.8/web-fonts-with-css/css/fontawesome-all.min.css" />
        <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/reset.css" />
        <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/responsive-grid.css" />
        <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/jquery/slippry-1.4.0/dist/slippry.css" />
        <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/jquery/tooltipster/dist/css/tooltipster.bundle.min.css" />
        <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" />
        <?php wp_head(); ?>
    </head>
    <body>
        <div id="slider-top">
            <div id="logo-top">
                <a href="./">
                  STUDIO PARIS
                </a>
            </div>
            <div id="overlay-top"></div>
            <div id="menu-top">
                <?php
                $menu      = wp_get_nav_menu_object("sp_menu_header");
                $menuItems = wp_get_nav_menu_items( $menu->term_id );

                if(!empty($menuItems)){
                  echo "<ul>";

                  foreach( $menuItems as $menuItem ) {
                    $parentId  = $menuItem->ID;
                    $menuArray = [];
                    $classSub  = "";
                    $propSub   = "";
                    $nameDvSub = "";

                    $arrChild  = get_nav_menu_item_children($parentId, $menuItems);
                    foreach( $arrChild as $submenu ) {
                      if( $submenu->menu_item_parent == $parentId ) {
                        $nameDvSub   = "tooltip_menu_prod_$parentId";
                        $classSub    = "tooltip";
                        $propSub     = ' data-tooltip-content="#'.$nameDvSub.'" ';
                        $menuArray[] = "<li><a href='".$submenu->url."'>".$submenu->title."</a></li>";
                      }
                    }

                    if ( $menuItem->menu_item_parent == 0 ) {
                      $url   = ($menuItem->url == "" || $menuItem->url == "#") ? "javascript:;": $menuItem->url;
                      $title = $menuItem->title;

                      echo "<li>";
                      echo "  <a class='$classSub' $propSub href='$url'>";
                      echo "    $title";
                      echo "  </a>";

                      if(count($menuArray) > 0){
                        echo "<div class='tooltip_templates'>";
                        echo "  <span id='$nameDvSub'>";
                        echo "    <ul>";
                        echo "    " . implode("", $menuArray);
                        echo "    </ul>";
                        echo "  </span>";
                        echo "</div>";
                      }

                      echo "</li>";
                    }
                  }

                  echo "</ul>";
                }
                ?>
            </div>

            <?php
            $sliderUrls = simple_fields_values("sf_fields_home_slider_url_imagem", 4);
            ?>
            <ul id="out-of-the-box-demo">
                <?php
                for($i=0; $i<count($sliderUrls); $i++){
                  $vCount  = $i+1;
                  $vImgUrl = $sliderUrls[$i];

                  echo "<li>";
                  echo "  <a href='#slide$vCount'>";
                  echo "    <img alt='Slider Bolserie Decoração Parede $vCount' src='$vImgUrl' />";
                  echo "  </a>";
                  echo "</li>";
                }
                ?>
            </ul>
        </div>
