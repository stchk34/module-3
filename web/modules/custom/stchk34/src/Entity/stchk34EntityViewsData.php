<?php

namespace Drupal\stchk34\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Stchk34entity entities.
 */
class stchk34EntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
