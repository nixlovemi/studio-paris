<?php
get_header();
?>

<div id="pre-content">
    <div class="content-wrap">
        Procurando Boiserie? Entre em contato que tiraremos todas suas dúvidas!
    </div>
</div>

<div id="content" class="content-background">
    <div class="content-wrap">
        <div class="section group mt-50 quem-somos">
          <div class="col span_3_of_3">
            <h2 class="title mt-50 mb-30">QUEM SOMOS</h2>
            <?php
            if ( have_posts() ) {
            	while ( have_posts() ) {
            		the_post();
                the_content();
            	} // end while
            } // end if
            ?>
          </div>
        </div>

        <?php
        $arrSessoesTitulo    = simple_fields_values("sf_fields_home_sessoes_titulo");
        $arrSessoesUrlImagem = simple_fields_values("sf_fields_home_sessoes_url_imagem");
        $arrSessoesLink      = simple_fields_values("sf_fields_home_sessoes_link");

        $count  = 0;
        $quebra = 3;

        for($i=0; $i<count($arrSessoesTitulo); $i++){
          $sessTitulo = $arrSessoesTitulo[$i];
          $sessImagem = $arrSessoesUrlImagem[$i];
          $sessLink   = ($arrSessoesLink[$i] != "") ? $arrSessoesLink[$i]: "javascript:;";
          $attachId   = get_attachment_id($sessImagem); //se não achar, retorna 0

          $arrAttach  = wp_get_attachment_image_src($attachId, 'sessao-home');
          if($arrAttach !== false){
            $imgUrl = $arrAttach[0];
            $imgAlt = get_post_meta($attachId, '_wp_attachment_image_alt', true);
          } else {
            $imgUrl = $sessImagem;
            $imgAlt = "Imagem Sessão $i | Studio Paris Decoração";
          }

          if($count == 0){
            echo "<div class='section group mt-50 images-display-home'>";
          }

          echo "<div class='col span_1_of_3'>";
          echo "  <span class='idh-text'>$sessTitulo</span>";
          echo "  <a href='$sessLink'>";
          echo "    <img class='responsive-img img-darken-effect' alt='$imgAlt' src='$imgUrl' />";
          echo "  </a>";
          echo "</div>";

          $count++;

          if($count == 3){
            $count = 0;
            echo "</div>";
          }
        }

        if($count != 0){
          echo "</div>";
        }
        ?>

        <h3 class="title mt-50 mb-30">BLOG</h3>
        <div class="section group blog-home">
            <?php
            $args = array(
              "numberposts" => 3,
              "post_status" => "publish"
            );
            $recent_posts = wp_get_recent_posts($args);
            foreach( $recent_posts as $recent ){
              $postId      = $recent["ID"];
              $postDate    = get_the_date("d/m/Y", $postId);
              $postTitle   = $recent["post_title"];
              $postLink    = get_permalink($postId);
              $postThumb   = get_the_post_thumbnail_url($postId, "blog-home");
              $postExcerpt = get_the_excerpt($postId);
              ?>

              <div class="col span_1_of_3 bh-item">
                  <div class="image mb-20">
                      <a href="<?php echo $postLink; ?>">
                        <img alt="Imagem | <?php echo $postTitle; ?>" src="<?php echo $postThumb; ?>" />
                      </a>
                  </div>
                  <div class="metadata mb-20">
                      <?php echo $postDate; ?>
                  </div>
                  <div class="title mb-20">
                      <h3>
                        <a href="<?php echo $postLink; ?>">
                          <?php echo $postTitle; ?>
                        </a>
                      </h3>
                  </div>
                  <div class="content mb-20">
                      <p>
                        <?php echo $postExcerpt; ?>
                      </p>
                  </div>

                  <p>
                      <a href="<?php echo $postLink; ?>" class="button">LEIA MAIS</a>
                  </p>
              </div>

              <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
