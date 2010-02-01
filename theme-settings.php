<?php
// $Id$

/**
* Implementation of THEMEHOOK_settings() function.
*
* @param $saved_settings
*   An array of saved settings for this theme.
* @return
*   A form array.
*/
function bartik_form_system_theme_settings_alter(&$form) {
  // Get the node types.
  $node_types = node_type_get_names();

  $form['authoring_information'] = array(
    '#type' => 'fieldset',
    '#title' => t('Authoring information'),
  );

  foreach ($node_types as $type => $name) {
    $form['authoring_information']['authoring_' . $type] = array(
      '#type' => 'textfield',
      '#title' => t('Authoring information for @type', array('@type' => $name)),
      '#default_value' => theme_get_setting('authoring_' . $type) ? theme_get_setting('authoring_' . $type) : t('Published by [node:author] on [node:created]'),
    );
  }
}
