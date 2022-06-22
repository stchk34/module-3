<?php

namespace Drupal\stchk34\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\stchk34\Entity\stchk34Entity;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Displaying entity form.
 */
class stchk34Controller extends ControllerBase {
  /**
   * Return page.
   *
   * @return array
   *   Return randerable array
   */
  public function content() {
    $entity = stchk34Entity::create();

    // Get feedback add form.
    $form = \Drupal::service('entity.form_builder')->getForm($entity, 'default');

    // Get feedbacks views.
    $view = views_embed_view('guestbook');

    return [
      '#theme' => 'stchk34',
      '#form' => $form,
      '#view' => $view,
    ];
  }
}
