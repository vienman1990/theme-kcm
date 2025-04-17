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

function firstTerm($id, $term)
{
  $terms = get_the_terms($id, $term);
  if ($terms) {
    return current($terms);
  }
  return false;
}

function firstTermName($id, $term)
{
  $term = firstTerm($id, $term);
  if ($term) {
    return $term->name;
  }
  return "";
}

function dmNewsGetLink($id)
{
  $type = get_field('type', $id);
  switch ($type) {
    case 'link':
      $link = get_field('link', $id);
      if ($link) {
        return $link['url'];
      }
      break;
    case 'pdf':
      $pdf = get_field('pdf', $id);
      if ($pdf) {
        return $pdf['url'];
      }
      break;
  }

  return get_permalink($id);
}
