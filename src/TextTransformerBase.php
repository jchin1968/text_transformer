<?php

namespace Drupal\text_transformer;

/**
 * Base class for creating text transformer plugins.
 */
abstract class TextTransformerBase implements TextTransformerInterface {

  /**
   * Get name of text transformer plugin.
   */
  public function getName() {
    return $this->pluginDefinition['name'];
  }

}
