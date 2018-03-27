        <div id="footer" class="mt-80">
            <div class="content-wrap">
                <div class="section footer-sections">
                    <div class="col span_1_of_3 fs-item">
                        <div class="title">INFORMAÇÃO</div>
                        <div class="content">
                            <?php
                            $menu      = wp_get_nav_menu_object("sp_menu_header");
                            $menuItems = wp_get_nav_menu_items( $menu->term_id );

                            if(!empty($menuItems)){
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
                                    $classSub    = "tooltip-footer";
                                    $propSub     = ' data-tooltip-content="#'.$nameDvSub.'" ';
                                    $menuArray[] = "<li><a href='".$submenu->url."'>".$submenu->title."</a></li>";
                                  }
                                }

                                if ( $menuItem->menu_item_parent == 0 ) {
                                  $url   = ($menuItem->url == "" || $menuItem->url == "#") ? "javascript:;": $menuItem->url;
                                  $title = $menuItem->title;

                                  echo "<p>";
                                  echo "  <a class='$classSub' $propSub href='$url'>";
                                  echo "    $title";
                                  echo "  </a>";
                                  echo "</p>";
                                }
                              }
                            }
                            ?>

                            <?php
                            /*
                            <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a></p>
                            <p><a class="tooltip-footer" data-tooltip-content="#tooltip_menu_prod" href="javascript:;">PRODUTOS</a></p>
                            <p><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">BLOG</a></p>
                            <p><a href="javascript:;">CONTATO</a></p>
                            */
                            ?>
                        </div>
                    </div>
                    <div class="col span_1_of_3 fs-item">
                        <div class="title">SIGA-NOS</div>
                        <div class="content">
                            <ul class="social-footer">
                                <li>
                                    <i class="fab fa-facebook-square" aria-hidden="true"></i>
                                </li>
                                <li>
                                    <i class="fab fa-twitter-square" aria-hidden="true"></i>
                                </li>
                                <li>
                                    <i class="fab fa-youtube-square" aria-hidden="true"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col span_1_of_3 fs-item">
                        <div class="title">CONTATO</div>
                        <div class="content">
                            <p>+55 11 3468-3244</p>
                            <p>studioparis@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php bloginfo('template_url'); ?>/jquery.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/jquery/slippry-1.4.0/dist/slippry.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/jquery/tooltipster/dist/js/tooltipster.bundle.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/master.js"></script>

        <?php wp_footer(); ?>
    </body>
</html>
