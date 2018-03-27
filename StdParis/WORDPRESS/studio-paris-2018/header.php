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
                <ul>
                    <li><a class="selected" href="./">HOME</a></li>
                    <li><a href="./blog.php">BLOG</a></li>
                    <li>
                        <a class="tooltip" data-tooltip-content="#tooltip_menu_prod" href="javascript:;">PRODUTOS</a>
                        <div class="tooltip_templates">
                            <span id="tooltip_menu_prod">
                                <ul>
                                    <li>
                                        <a href="./product-single.php">Boiserie</a>
                                    </li>
                                </ul>
                            </span>
                        </div>
                    </li>
                    <li><a href="javascript:;">CONTATO</a></li>
                </ul>
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
