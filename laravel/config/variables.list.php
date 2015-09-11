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
    'value' => 'KRAM.XYZ',
    'translation_key' => 'variables.site_name',
  ),
  'items_per_page' => array(
    'value' => 25,
    'translation_key' => 'variables.items_per_page',
  ),
  'rollbar_debug' => array(
    'value' => 'no',
    'translation_key' => 'variables.rollbar_debug',
  ),
  'email_color_background' => array(
    'value' => '#0091ce',
    'translation_key' => 'variables.email_color_background',
  ),
  'email_color_link' => array(
    'value' => '#0091ce',
    'translation_key' => 'variables.email_color_link',
  ),
  'email_logo_path' => array(
    'value' => 'http://support.devfactory.ch/assets/custom/img/logo-rouages-new-28x28.jpg',
    'translation_key' => 'variables.email_logo_path',
  ),
  'email_logo_url' => array(
    'value' => 'http://www.devfactory.ch',
    'translation_key' => 'variables.email_logo_url',
  ),
  'email_footer' => array(
    'value' => 'DevFactory Sarl, Av. Louis Ruchonnet 2, CH-1003 Lausanne',
    'translation_key' => 'variables.email_footer',
  ),
);