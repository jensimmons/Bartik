<?php

function bartik_preprocess_html(&$variables) {
  // Adds body classes if certain regions have content:
  // .region-triptych .region-featured .footer-columns
  if (!empty($variables['page']['featured'])) {
    $variables['classes_array'][] = 'featured';
  }

  if (!empty($variables['page']['triptych_first'])
      || !empty($variables['page']['triptych_middle'])
      || !empty($variables['page']['triptych_last'])) {
    $variables['classes_array'][] = 'triptych';
  }

  if (!empty($variables['page']['footer_firstcolumn'])
      || !empty($variables['page']['footer_secondcolumn'])
      || !empty($variables['page']['footer_thirdcolumn'])
      || !empty($variables['page']['footer_fourthcolumn'])) {
    $variables['classes_array'][] = 'footer-columns';
  }
}
