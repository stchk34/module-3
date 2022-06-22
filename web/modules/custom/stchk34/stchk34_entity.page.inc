<?php

/**
 * @file
 * Contains stchk34_entity.page.inc.
 *
 * Page callback for Stchk34entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Stchk34entity templates.
 *
 * Default template: stchk34_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_stchk34_entity(array &$variables) {
  // Fetch stchk34Entity Entity Object.
  $stchk34_entity = $variables['elements']['#stchk34_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
