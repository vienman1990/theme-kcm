<?php

function dh_get_thumbnail_url()
{
  if (has_post_thumbnail()) {
    return get_the_post_thumbnail_url();
  }

  return get_template_directory_uri() . '/img/noimage.svg';
}

function dh_thumbnail_url()
{
  echo dh_get_thumbnail_url();
}