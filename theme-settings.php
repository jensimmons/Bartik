<?php
// $Id$

/**
 * Implement hook_form_system_theme_settings_alter() function.
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function bartik_form_system_theme_settings_alter(&$form, &$form_state) {
  $form['bartik_sample_regions'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Display sample content in empty regions'),
    '#default_value' => theme_get_setting('bartik_sample_regions'),
    '#description'   => t("When previewing this theme, it's useful to see the styling for all regions even if they won't have any content by default."),
  );
}

/**
 * Helper function that inserts sample content into empty regions.
 */
function _bartik_process_page(&$variables) {
  // Lorem ipsum is Latin and doesn't need to be translated.
  $paragraph = '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>';
  // List of links to be used in footer regions.
  $list = theme('links', array(
    'links' => array(
      'jean-bartik' => array(
        'title' => t('Jean Bartik'),
        'href' => 'http://www.google.com/search?q=Jean+Bartik',
        'absolute'  => TRUE,
      ),
      'bartik-settings' => array(
        'title' => t('Bartik theme settings'),
        'href' => 'admin/appearance/settings/bartik',
      ),
      'drupal' => array(
        'title' => t('Drupal.org'),
        'href' => 'http://drupal.org',
        'absolute'  => TRUE,
      ),
      'theme-guide' => array(
        'title' => t('Drupal theme guide'),
        'href' => 'http://drupal.org/theme-guide',
        'absolute'  => TRUE,
      ),
    ),
  ));
  // Generate a link to the settings.
  $link = '<p class="sample-regions-link">' . t('This sample content can be turned off using the “Display sample content in empty regions” option on the !link page.', array('!link' => l(t('Bartik settings'), 'admin/appearance/settings/bartik'))) . '</p>';

  // Create a fake block.
  $block = new stdClass();
  $block->module     = 'bartik';
  $block->theme      = 'bartik';
  $block->status     = 1;
  $block->weight     = 0;
  $block->custom     = 0;
  $block->visibility = 0;
  $block->pages      = '';
  $block->title      = '';
  $block->cache      = DRUPAL_NO_CACHE;
  $block->subject    = 'Lorem ipsum';

  // Grab the list of visible regions.
  $regions = system_region_list('bartik', REGIONS_VISIBLE);
  // Ignore common regions.
  $ignore_regions = array('header', 'highlight', 'help', 'content', 'footer');

  // Generate sample content for any empty regions.
  $bid = 1000;
  foreach ($regions as $region => $label) {
    if (!in_array($region, $ignore_regions) && empty($variables['page'][$region])) {
      // Set dynamic bits of the fake block.
      $bid++;
      $block->bid    = $bid;
      $block->delta  = 'delta-' . $bid;
      $block->region = $region;
      // Show the list of links in the footer regions, otherwise show lorem ipsum.
      if (strpos($region, 'footer_') === 0) {
        $content = $list . $link;
      }
      else {
        $content = $paragraph . $link;
      }
      // Load the region.
      $variables['page'][$region] = array(
        'bartik_sample_block' => array(
          '#markup'         => $content,
          '#block'          => $block,
          '#weight'         => 0,
          '#theme_wrappers' => array('block'),
        ),
      );
    }
  }
}
