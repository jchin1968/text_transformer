<?php

namespace Drupal\text_transformer\Plugin\TextTransformer;

use Drupal\text_transformer\TextTransformerBase;

/**
 * Transform text to upper case.
 *
 * @TextTransformer(
 *   id = "upper",
 *   name = @Translation("Upper"),
 *   description = @Translation("Transform to Upper Case"),
 * )
 */
class Upper extends TextTransformerBase {

  /**
   * Transform text to upper case.
   *
   * @param string $text
   *   Text to be transformed.
   */
  public function transform($text) {
    return strtoupper($text);
  }

}
