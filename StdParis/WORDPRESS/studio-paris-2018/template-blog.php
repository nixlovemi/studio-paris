<?php
get_header();
?>

<div id="pre-content">
    <div class="content-wrap">
        <h1 class="blog-section-title">BLOG</h1>
    </div>
</div>

<div id="content" class="mt-40">
    <div class="content-wrap">
        <div class="section group">
          <div class="col span_3_of_3">
            <?php
            $arrCategories = getArrUniqueCatFromPosts();
            ?>
            <ul id="blog-tag-list">
              <?php
              foreach($arrCategories as $catName => $category){
                echo "<li>";
                echo "  <a href='javascript:;' class='button'>$catName</a>";
                echo "</li>";
              }
              ?>
            </ul>
          </div>
        </div>

        <?php
        $i      = 0;
        $quebra = 3;
        if ( have_posts() ) : while ( have_posts() ) : the_post();

          if($i == 0){
            echo "<div class='section group blog-home'>";
          }

          $postId      = get_the_ID();
          $postDate    = get_the_date("d/m/Y", $postId);
          $postTitle   = get_the_title();
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

          $i++;
          if($i == $quebra){
            $i = 0;
            echo "</div>";
          }
        endwhile; endif;

        if($i != 0){
          echo "</div>";
        }
        ?>

        <div style="margin-top: 30px;">
            <?php wp_pagenavi(); ?>
        </div>
    </div>
</div>

<?php
get_footer();
