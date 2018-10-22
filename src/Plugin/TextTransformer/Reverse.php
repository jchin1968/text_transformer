<?php

namespace Drupal\text_transformer\Plugin\TextTransformer;

use Drupal\text_transformer\TextTransformerBase;

/**
 * Transform text in reverse.
 *
 * @TextTransformer(
 *   id = "reverse",
 *   name = @Translation("Reverse"),
 *   description = @Translation("Transform to Reverse"),
 * )
 */
class Reverse extends TextTransformerBase {

  /**
   * Reverse the order of the words.
   *
   * @param string $text
   *   Text to be reversed.
   */
  public function transform($text) {
    $text_array = explode(' ', $text);
    $reverse_array = array_reverse($text_array);
    $reverse_text = implode(' ', $reverse_array);
    return $reverse_text;
  }

}
