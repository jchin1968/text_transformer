<?php

namespace Drupal\text_transformer\Plugin\TextTransformer;

use Drupal\text_transformer\TextTransformerBase;

/**
 * Transform text to lower case.
 *
 * @TextTransformer(
 *   id = "lower",
 *   name = @Translation("Lower"),
 *   description = @Translation("Transform to Lower Case"),
 * )
 */
class Lower extends TextTransformerBase {

  /**
   * Transform text to lower case.
   *
   * @param string $text
   *   Text to be transformed.
   */
  public function transform($text) {
    return strtolower($text);
  }

}
