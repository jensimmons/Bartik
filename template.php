<?php
// $Id$

/**
 * Add body classes if certain regions have content.
 */
function bartik_preprocess_html(&$variables) {
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

/**
 * Override or insert variables into the page template for HTML output.
 */
function bartik_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/**
 * Override or insert variables into the page template.
 */
function bartik_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
  // Always print the site name, but don't always actually show it - the class
  // "header-hidden" is added when it's supposed to be hidden.
  $variables['site_name']   = filter_xss_admin(variable_get('site_name', 'Drupal'));
  $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));

  $variables['show_site_name']   = !is_null(theme_get_setting('toggle_name')) ? theme_get_setting('toggle_name') : TRUE;
  $variables['show_site_slogan'] = !is_null(theme_get_setting('toggle_slogan')) ? theme_get_setting('toggle_slogan') : TRUE;

  // Load sample content if requested.
  if (theme_get_setting('bartik_sample_regions') && user_access('administer themes')) {
    include_once './' . drupal_get_path('theme', 'bartik') . '/theme-settings.php';
    _bartik_process_page($variables);
  }
}

/**
 * Override or insert variables into the node template.
 */
function bartik_process_node(&$variables) {
  $published = theme_get_setting('authoring_' . $variables['node']->type)
    ? theme_get_setting('authoring_' . $variables['node']->type)
    : t('Published by [node:author] on [node:created]');

  $variables['published'] = filter_xss_admin(token_replace($published, array('node' => $variables['node'])));
}
