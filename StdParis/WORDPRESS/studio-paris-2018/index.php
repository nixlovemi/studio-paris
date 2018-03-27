<?php
if (is_front_page() && is_home()) {
  // Default homepage
  get_template_part('template', 'home'); // loop for index, file 'loop-index.php'
} elseif (is_front_page()){
  //Static homepage
  get_template_part('template', 'home'); // loop for index, file 'loop-index.php'
} elseif (is_home()){
  //Blog page
  get_template_part('template', 'blog'); // loop for index, file 'loop-index.php'
} elseif (is_single()){
  // single post page
  get_template_part('template', 'single'); // loop for index, file 'loop-index.php'
} else {
  //everything else
  get_template_part('template', 'page'); // loop for index, file 'loop-index.php'
}
