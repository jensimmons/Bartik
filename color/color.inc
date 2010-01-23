<?php
// $Id$

$info = array(
  // Pre-defined color schemes.
  'schemes' => array(
    '#ffffff,#0073b6,#1a1a1a,#161617,#3b3b3b' => t('Bartik Default'),
  ),

  // CSS files (excluding @import) to rewrite with new color scheme.
  'css' => array(
    'css/color.css',
  ),
  
  // Files to copy
  'copy' => array(
    'logo.png',
  ),

  // Coordinates of gradient (x, y, width, height).
  'gradient' => array(0, 0, 0, 0),

  // Color areas to fill (x, y, width, height).
  'fill' => array(),

  // Coordinates of all the theme slices (x, y, width, height)
  // with their filename as used in the stylesheet.
  'slices' => array(
  ),

  // Reference color used for blending. Matches the base.png's colors.
  'blend_target' => '#ffffff',

  // Preview files.
  'preview_image' => 'color/preview.png',
  'preview_css' => 'color/preview.css',

  // Base file for image generation.
  'base_image' => 'color/base.png',
);