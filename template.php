<?php
function bartik_preprocess_html(&$variables) {
  foreach (system_region_list($GLOBALS['theme']) as $region_key => $region_name) {
    if (isset($variables['page'][$region_key])) {
      $variables['classes_array'][] = 'has-region-'.$region_key;
    }
  }
}