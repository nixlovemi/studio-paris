<?php
get_header();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    $postId = get_the_ID();
    ?>

    <div id="pre-content">
        <div class="content-wrap">
            <h1 class="blog-section-title"><?php the_title();  ?></h1>
        </div>
    </div>

    <div id="content" class="mt-40">
        <div class="content-wrap">
            <div class="section group blog-home">
                <div class="col span_3_of_3 article mb-50">
                  <p class="article-info">
              			<span>
              				<time class="article-time" datetime=""><?php the_time("l, d/m/Y H:i"); ?></time>
              			</span>

                    <?php
                    $comments_count = wp_count_comments($postId);
                    ?>
                    <span class="article-comments">Comentários: <?php echo $comments_count->total_comments; ?></span>
    		          </p>

                  <div class="article-content">
                    <?php
                    $postThumb = get_the_post_thumbnail_url($postId, "blog-single");
                    ?>
                    <img width="240" height="180" class="featured-image" src="<?php echo $postThumb; ?>" />
                    <?php the_content(); ?>
                  </div>

                  <p class="bh-tags mb-15">
                    <a href="/blogs/blog/tagged/ledgestones">
                      <i class="fas fa-tag"></i> projeto
                    </a>
                    <a href="/blogs/blog/tagged/ledgestones">
                      <i class="fas fa-tag"></i> inspiração
                    </a>
                  </p>
                </div>

                <div id="article-comments">
                  <?php comments_template(); ?>

                  <?php
                  /*
                  <h3 class="article-comments-title">1 comentário</h3>
                  <p class="article-comments-title">Deixe um comentário</p>

                  <div class="section group article-comments-form">
                    <div class="col span_1_of_3">
                      <label>Nome:</label>
                      <input class="form-control" value="" type="text" />
                    </div>
                    <div class="col span_2_of_3">
                      <label>Email:</label>
                      <input class="form-control" value="" type="text" />
                    </div>
                  </div>
                  <div class="section group article-comments-form">
                    <div class="col span_3_of_3">
                      <label>Mensagem:</label>
                      <textarea rows="5" class="form-control"></textarea>
                    </div>
                  </div>

                  <a href="javascript:;" class="button">ENVIAR COMENTÁRIO</a>
                  */
                  ?>
                </div>
            </div>
        </div>
    </div>

    <?php
  } // end while
} // end if

get_footer();
