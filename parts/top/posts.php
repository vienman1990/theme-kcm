<div class=" container mx-auto px-5 my-10 grid grid-cols-3 gap-5">
<?php
if (have_posts()) :
  /* Start the Loop */
  while (have_posts()) :
    the_post();
    
    get_template_part('parts/top/post-item');

  endwhile;

endif;
?>
</div>