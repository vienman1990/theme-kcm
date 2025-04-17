<?php 
  $link = dmNewsGetLink(get_the_ID());
?>
<div class="pb-5 border-b border-base-300 relative">
  <a 
    href="<?php echo $link; ?>" 
    target="<?php echo $link !== get_permalink(get_the_ID()) ? '_blank' : '' ?>" 
    class=" absolute w-full h-full top-0 left-0"
  ></a>
  <div class="flex items-center gap-5 mb-2.5">
    <div class="text-sm"><?php echo get_the_date(); ?></div>
    <div class="text-sm badge badge-dash badge-primary"><?php echo firstTermName( get_the_ID(), 'news_cat' ); ?></div>
  </div>
  <span class=""><?php echo get_the_title(); ?></span>
</div>