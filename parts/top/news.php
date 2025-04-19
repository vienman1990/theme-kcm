<?php 
  $column = new WP_Query(array(
    'post_type' => 'news',
    'posts_per_page' => 5
  ));
?>
<?php if($column->have_posts()): ?>
  <div class="max-w-[1040px] mx-auto px-5 mb-5">
    <h1 class="text-3xl font-bold my-20 text-center">News</h1>
    <div class="grid grid-cols-1 gap-5">
      <?php 
        while($column->have_posts()): $column->the_post();
          get_template_part( 'parts/news/item' );
        endwhile;  
      ?>
    </div>
    <div class="text-right my-10">
      <a href="<?php echo get_post_type_archive_link('news'); ?>" class="btn btn-primary">一覧</a>
    </div>
  </div>
<?php 
  endif;
  wp_reset_postdata();  
?>