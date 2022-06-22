<?php

namespace Drupal\stchk34;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Stchk34entity entity.
 *
 * @see \Drupal\stchk34\Entity\stchk34Entity.
 */
class stchk34EntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\stchk34\Entity\stchk34EntityInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished stchk34entity entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published stchk34entity entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit stchk34entity entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete stchk34entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add stchk34entity entities');
  }


}
