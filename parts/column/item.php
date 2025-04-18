<a href="<?php the_permalink(); ?>" class="card bg-base-100 shadow-sm w-full">
  <figure>
    <img
      src="<?php dh_thumbnail_url(); ?>"
      alt="Shoes" />
  </figure>
  <div class="card-body pt-2.5">
    <div class="badge badge-soft badge-primary"><?php echo firstTermName( get_the_ID(), 'column_cat' ); ?></div>
    <h2 class="text-base"><?php the_title(); ?></h2>
  </div>
</a>