<?php

/**
 * Items added to the array should look like this:
 *
 *   'key' => array(
 *     'value' => '',
 *     'translation_key' => 'variables.key', // Create in your language files
 *   ),
 *
 * Which might give something like:
 *
 *   'service_api_key' => array(
 *     'value' => 'da46f8af58aec448c784dd421660f7635d404feb',
 *     'translation_key' => 'variables.service_api_key',
 *   ),
 *
 * @return
 */

return array(
  'site_name' => array(
    'value' => 'Stark',
    'translation_key' => 'variables.site_name',
  ),
  'items_per_page' => array(
    'value' => 25,
    'translation_key' => 'variables.items_per_page',
  ),
);