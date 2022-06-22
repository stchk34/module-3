<?php

namespace Drupal\stchk34;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Stchk34entity entities.
 *
 * @ingroup stchk34
 */
class stchk34EntityListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Stchk34entity ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var \Drupal\stchk34\Entity\stchk34Entity $entity */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.stchk34_entity.edit_form',
      ['stchk34_entity' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
