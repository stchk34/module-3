<?php

namespace Drupal\stchk34\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Stchk34entity entities.
 *
 * @ingroup stchk34
 */
interface stchk34EntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface, EntityOwnerInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Stchk34entity name.
   *
   * @return string
   *   Name of the Stchk34entity.
   */
  public function getName();

  /**
   * Sets the Stchk34entity name.
   *
   * @param string $name
   *   The Stchk34entity name.
   *
   * @return \Drupal\stchk34\Entity\stchk34EntityInterface
   *   The called Stchk34entity entity.
   */
  public function setName($name);

  /**
   * Gets the Stchk34entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Stchk34entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Stchk34entity creation timestamp.
   *
   * @param int $timestamp
   *   The Stchk34entity creation timestamp.
   *
   * @return \Drupal\stchk34\Entity\stchk34EntityInterface
   *   The called Stchk34entity entity.
   */
  public function setCreatedTime($timestamp);

}
