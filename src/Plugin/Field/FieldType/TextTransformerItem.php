<?php

namespace Drupal\text_transformer\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Define text transformer field type.
 *
 * @FieldType(
 *   id = "text_transformer",
 *   label = @Translation("Text Transformer"),
 *   default_widget = "text_transformer_widget_default",
 *   default_formatter = "text_transformer_formatter_default"
 * )
 */
class TextTransformerItem extends FieldItemBase implements FieldItemInterface {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'text',
          'size' => 'normal',
          'not null' => FALSE,
          'description' => t('Text to be transformed'),
        ],
        'type' => [
          'type' => 'text',
          'size' => 'normal',
          'not null' => FALSE,
          'description' => t('Type of transformer'),
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Text to be transformed'))
      ->setRequired(FALSE);

    $properties['type'] = DataDefinition::create('string')
      ->setLabel(t('Type of transformer'))
      ->setRequired(FALSE);

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $text = $this->get('value')->getValue();
    return $text === NULL || $text === '';
  }

}
