<?php
get_header();
?>

<?php
// check if comes from category link
$catTitle   = ucfirst(single_cat_title("", false));
$isCategory = $catTitle != "";
?>

<div id="pre-content">
    <div class="content-wrap">
        <?php
        if($isCategory){
            echo "<h1 class='blog-section-title'>CATEGORIA: $catTitle</h1>";
            echo "<p>BLOG</p>";
        } else {
            echo "<h1 class='blog-section-title'>STUDIO PARIS DECORAÇÃO - BLOG</h1>";
        }
        ?>
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
                $cssCat = (strtolower($catTitle) == strtolower($catName)) ? " button-selected ": "";
                $catURL = get_category_link( $category->term_id );

                echo "<li>";
                echo "  <a href='$catURL' class='button $cssCat'>$catName</a>";
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

              <p class="bh-tags mb-15">
                <?php
                $post_categories = wp_get_post_categories( $postId );
                $cats = array();

                foreach($post_categories as $c){
                    $cat     = get_category( $c );
                    $catName = $cat->name;
                    $catURL  = get_category_link( $cat->term_id );

                    echo "<a href='$catURL'>";
                    echo "  <i class='fas fa-tag'></i> $catName";
                    echo "</a>";
                }
                ?>
              </p>

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
