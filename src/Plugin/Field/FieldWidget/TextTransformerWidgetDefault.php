<?php

namespace Drupal\text_transformer\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Field\WidgetInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Define default field widget for'Text Transformer' field.
 *
 * @FieldWidget(
 *   id = "text_transformer_widget_default",
 *   label = @Translation("Text Transformer Widget Default"),
 *   field_types = {
 *     "text_transformer"
 *   }
 * )
 */
class TextTransformerWidgetDefault extends WidgetBase implements WidgetInterface {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {

    $element += [
      '#type' => 'fieldset',
      '#title' => t('Text Transformer'),
    ];

    $element['value'] = [
      '#type' => 'textarea',
      '#title' => t('Text to be transformed'),
      '#default_value' => isset($items[$delta]->value) ? $items[$delta]->value : NULL,
      '#rows' => 4,
      '#group' => 'text_transformer',
    ];

    $text_transformer = \Drupal::service('plugin.manager.text_transformer');
    $element['type'] = [
      '#type' => 'select',
      '#title' => t('Transformer type'),
      '#options' => $text_transformer->getTextTransformers(),
      '#default_value' => isset($items[$delta]->type) ? $items[$delta]->type : NULL,
      '#group' => 'text_transformer',
    ];

    return $element;
  }

}
