<?php

namespace Drupal\text_transformer\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Define default field formatter for'Text Transformer' field.
 *
 * @FieldFormatter(
 *   id = "text_transformer_formatter_default",
 *   label = @Translation("Text Transformer"),
 *   field_types = {
 *     "text_transformer"
 *   }
 * )
 */
class TextTransformerFormatterDefault extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $settings = $this->getSettings();

    $summary[] = $this->t('Display Text Transformation');

    if (!empty($settings['display_original_text'])) {
      $summary[] = $this->t('Display original text');
    }

    if (!empty($settings['display_transformer_type'])) {
      $summary[] = $this->t('Display transformer type');
    }

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'display_original_text' => 0,
      'display_transformer_type' => 0,
    ] + parent::defaultSettings();
  }

  /**
   * Define display format settings form.
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $element['display_original_text'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Display original text'),
      '#default_value' => $this->getSetting('display_original_text'),
    ];

    $element['display_transformer_type'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Display transformer type'),
      '#default_value' => $this->getSetting('display_transformer_type'),
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    // Get field formatter settings.
    $setting = $this->getSettings();

    $element = [];
    foreach ($items as $delta => $item) {
      // Render each element as markup.
      $text_transformer = \Drupal::service('plugin.manager.text_transformer');
      $transformer = $text_transformer->createInstance($item->type);

      $original = $setting['display_original_text'] ? $item->value : NULL;
      $type = $setting['display_transformer_type'] ? $item->type : NULL;
      $transformed = $transformer->transform($item->value);

      $element[$delta] = [
        '#theme' => 'text_transformer',
        '#original' => $original,
        '#type' => $type,
        '#transformed' => $transformed,
        '#cache' => [
          'max-age' => 0,
        ],
      ];
    }

    return $element;
  }

}
