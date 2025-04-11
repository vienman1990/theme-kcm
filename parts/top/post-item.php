<a href="<?php the_permalink(); ?>" class="card bg-base-100 w-96 shadow-sm w-full">
  <figure>
    <img
      src="<?php dh_thumbnail_url(); ?>"
      alt="Shoes" />
  </figure>
  <div class="card-body">
    <h2 class="card-title"><?php the_title(); ?></h2>
  </div>
</a>