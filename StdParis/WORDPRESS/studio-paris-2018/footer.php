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
                        </div>
                    </div>
                    <div class="col span_1_of_3 fs-item">
                        <div class="title">SIGA-NOS</div>
                        <div class="content">
                            <ul class="social-footer">
                                <?php
                                $idPaginaHome    = 4;
                                $socialPhone     = simple_fields_value("sf_fields_home_social_telefone", $idPaginaHome);
                                $socialFacebook  = simple_fields_value("sf_fields_home_social_facebook", $idPaginaHome);
                                $socialTwitter   = simple_fields_value("sf_fields_home_social_twitter", $idPaginaHome);
                                $socialYoutube   = simple_fields_value("sf_fields_home_social_youtube", $idPaginaHome);
                                $socialInstagram = simple_fields_value("sf_fields_home_social_instagram", $idPaginaHome);
                                $socialEmail     = simple_fields_value("sf_fields_home_social_email", $idPaginaHome);


                                if($socialFacebook != ""){
                                    echo "<li>";
                                    echo "  <a href='$socialFacebook' target='_blank'>";
                                    echo "    <i class='fab fa-facebook-square' aria-hidden='true'></i>";
                                    echo "  </a>";
                                    echo "</li>";
                                }
                                
                                if($socialTwitter != ""){
                                    echo "<li>";
                                    echo "  <a href='$socialTwitter' target='_blank'>";
                                    echo "    <i class='fab fa-twitter-square' aria-hidden='true'></i>";
                                    echo "  </a>";
                                    echo "</li>";
                                }
                                
                                if($socialYoutube != ""){
                                    echo "<li>";
                                    echo "  <a href='$socialYoutube' target='_blank'>";
                                    echo "    <i class='fab fa-youtube-square' aria-hidden='true'></i>";
                                    echo "  </a>";
                                    echo "</li>";
                                }
                                
                                if($socialInstagram != ""){
                                    echo "<li>";
                                    echo "  <a href='$socialInstagram' target='_blank'>";
                                    echo "    <i class='fab fa-instagram' aria-hidden='true'></i>";
                                    echo "  </a>";
                                    echo "</li>";
                                }

                                if($socialEmail != ""){
                                    echo "<li>";
                                    echo "  <a href='mailto:$socialEmail?Subject=Contato' target='_blank'>";
                                    echo "    <i class='far fa-envelope' aria-hidden='true'></i>";
                                    echo "  </a>";
                                    echo "</li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col span_1_of_3 fs-item">
                        <div class="title">CONTATO</div>
                        <div class="content">
                            <?php
                            if($socialPhone != ""){
                                echo "<p>$socialPhone</p>";
                            }
                            
                            if($socialEmail != ""){
                                echo "<p>$socialEmail</p>";
                            }
                            ?>
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
