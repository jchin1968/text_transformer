<?php

namespace Drupal\text_transformer\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Text Transformer annotation object.
 *
 * Plugin Namespace: Plugin\text_transformer\TextTransformer.
 *
 * @Annotation
 */
class TextTransformer extends Plugin {
  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The name of the text transformer.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $name;

  /**
   * A description for the text transformer.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $description;

}
