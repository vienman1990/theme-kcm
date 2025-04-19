<?php 
  $column = new WP_Query(array(
    'post_type' => 'column',
    'posts_per_page' => 3
  ));
?>
<?php if($column->have_posts()): ?>
  <div class="max-w-[1040px] mx-auto px-5 mb-10">
    <h1 class="text-3xl font-bold my-20  text-center">Column</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
      <?php 
        while($column->have_posts()): $column->the_post();
          get_template_part( 'parts/column/item' );
        endwhile;  
      ?>
    </div>
    <div class="text-right my-10">
      <a href="<?php echo get_post_type_archive_link('column'); ?>" class="btn btn-primary">一覧</a>
    </div>
  </div>
<?php 
  endif;
  wp_reset_postdata();  
?>