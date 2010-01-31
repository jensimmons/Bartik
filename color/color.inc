<?php
// $Id$

$info = array(
  // Pre-defined color schemes.
  'schemes' => array(
    '#ffffff,#0073b6,#000000,#3d3d3d,#3b3b3b' => t('Bartik Default'),
    '#ffffff,#0073b6,#2385c2,#5ab5ee,#3b3b3b' => t('Blue Lagoon'),    
    '#f6eecc,#6B2454,#461453,#6B2454,#2c233f' => t('Plum'),
    '#ffffff,#087095,#78B91A,#5b8b15,#585858' => t('Fresh'),
  ),

  // CSS files (excluding @import) to rewrite with new color scheme.
  'css' => array(
    'css/style.css',
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