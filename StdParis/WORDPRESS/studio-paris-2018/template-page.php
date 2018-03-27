<?php
get_header();
?>

<div id="content" class="">
    <div class="content-wrap">
        <?php
        if ( have_posts() ) {
        	while ( have_posts() ) {
        		the_post();
            ?>

            <div class="section group mt-50">
              <div class="col span_3_of_3">
                <h1 class="title mt-50 mb-30"><?php the_title(); ?></h1>
                <div class="template-page-content">
                  <?php
                  echo the_content();
                  ?>
                </div>
              </div>
            </div>

            <?php
        	} // end while
        } // end if
        ?>
    </div>
</div>

<?php
get_footer();
