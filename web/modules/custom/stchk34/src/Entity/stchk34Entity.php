<?php

namespace Drupal\stchk34\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Stchk34entity entity.
 *
 * @ingroup stchk34
 *
 * @ContentEntityType(
 *   id = "stchk34_entity",
 *   label = @Translation("Stchk34entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\stchk34\stchk34EntityListBuilder",
 *     "views_data" = "Drupal\stchk34\Entity\stchk34EntityViewsData",
 *     "translation" = "Drupal\stchk34\stchk34EntityTranslationHandler",
 *
 *     "form" = {
 *       "default" = "Drupal\stchk34\Form\stchk34EntityForm",
 *       "add" = "Drupal\stchk34\Form\stchk34EntityForm",
 *       "edit" = "Drupal\stchk34\Form\stchk34EntityForm",
 *       "delete" = "Drupal\stchk34\Form\stchk34EntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\stchk34\stchk34EntityHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\stchk34\stchk34EntityAccessControlHandler",
 *   },
 *   base_table = "stchk34_entity",
 *   data_table = "stchk34_entity_field_data",
 *   translatable = TRUE,
 *   admin_permission = "administer stchk34entity entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "uid" = "user_id",
 *     "langcode" = "langcode",
 *   },
 *   links = {
 *    "page" = "/stchk34/guestbook",
 *     "canonical" = "/admin/structure/stchk34_entity/{stchk34_entity}",
 *     "add-form" = "/admin/structure/stchk34_entity/add",
 *     "edit-form" = "/admin/structure/stchk34_entity/{stchk34_entity}/edit",
 *     "delete-form" = "/admin/structure/stchk34_entity/{stchk34_entity}/delete",
 *     "collection" = "/admin/structure/stchk34_entity",
 *   },
 *   field_ui_base_route = "stchk34_entity.settings"
 * )
 */
class stchk34Entity extends ContentEntityBase {

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type): array {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the review'))
      ->setReadOnly(TRUE);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the review'))
      ->setReadOnly(TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('Username'))
      ->setDefaultValue(NULL)
      ->setRequired(TRUE)
      ->setSetting('max_length', 100)
      ->setPropertyConstraints('value', [
        'Length' => [
          'min' => 2,
          'max' => 100,
          'minMessage' => 'Your name is less than 2 symbols',
          'maxMessage' => 'Your name is longer than 100 symbols',
        ],
      ])
      ->setDisplayOptions('form', [
        'type' => 'string',
        'settings' => [
          'placeholder' => 'Enter your name',
        ],
      ])
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['email'] = BaseFieldDefinition::create('email')
      ->setLabel(t('Email'))
      ->setDescription(t('User email'))
      ->setDefaultValue(NULL)
      ->setRequired(TRUE)
      ->setSetting('max_length', 60)
      ->setPropertyConstraints('value', [
        'Regex' => [
          'pattern' => '/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/',
          'message' => t('Please, enter a valid email'),
        ],
      ])
      ->setDisplayOptions('form', [
        'type' => 'email',
      ])
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'email',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['phone'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Phone Number'))
      ->setDescription(t('User phone number'))
      ->setDefaultValue(NULL)
      ->setRequired(TRUE)
      ->setSetting('max_length', 15)
      ->setPropertyConstraints('value', [
        'Regex' => [
          'pattern' => '/(\+?( |-|\.)?\d{1,2}( |-|\.)?)?(\(?\d{3}\)?|\d{3})( |-|\.)?(\d{3}( |-|\.)?\d{4})/',
          'message' => 'Please, enter a valid phone number',
        ],
      ])
      ->setDisplayOptions('form', [
        'type' => 'string',
      ])
      ->setDisplayOptions('view', [
        'type' => 'string',
        'label' => 'hidden',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['message'] = BaseFieldDefinition::create('string_long')
      ->setLabel(t('Message'))
      ->setDescription(t('User message'))
      ->setDefaultValue(NULL)
      ->setRequired(TRUE)
      ->setSetting('max_length', 1000)
      ->setPropertyConstraints('value', [
        'Length' => [
          'max' => 1000,
          'maxMessage' => 'Your message is longer than 1000 characters long',
        ],
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_long',
      ])
      ->setDisplayOptions('view', [
        'type' => 'text_default',
        'label' => 'hidden',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['avatar'] = BaseFieldDefinition::create('image')
      ->setLabel(t('Avatar'))
      ->setDescription(t('User avatar'))
      ->setDefaultValue(NULL)
      ->setSettings([
        'file_extension' => 'png jpg jpeg',
        'file_location' => 'images/avatars/',
        'max_filesize' => 2097152,
        'alt_field' => FALSE,
      ])
      ->setDisplayOptions('form', [
        'type' => 'image',
      ])
      ->setDisplayOptions('view', [
        'type' => 'image',
        'label' => 'hidden',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['image'] = BaseFieldDefinition::create('image')
      ->setLabel(t('Image'))
      ->setDescription(t('Review image'))
      ->setDefaultValue(NULL)
      ->setSettings([
        'file_extension' => 'png jpg jpeg',
        'file_location' => 'images/review_images',
        'max_filesize' => 5242880,
        'alt_field' => FALSE,
      ])
      ->setDisplayOptions('form', [
        'type' => 'image',
      ])
      ->setDisplayOptions('view', [
        'type' => 'image',
        'label' => 'hidden',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['date'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Date'))
      ->setDescription(t('Date when the revue was created'))
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'datetime_custom',
        'settings' => [
          'data_format' => 'm-d-Y H:i:s',
        ],
      ])
      ->setDisplayConfigurable('view', TRUE);


    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'))
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
      ])
      ->setDisplayConfigurable('view', FALSE);

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));


    return $fields;
  }

}
