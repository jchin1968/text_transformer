<?php

namespace Drupal\text_transformer\Plugin\TextTransformer;

use Drupal\text_transformer\TextTransformerBase;

/**
 * Randomize the order of the words.
 *
 * @TextTransformer(
 *   id = "random",
 *   name = @Translation("Random"),
 *   description = @Translation("Randomize the order of the text"),
 * )
 */
class Random extends TextTransformerBase {

  /**
   * Randomize order of words.
   *
   * @param string $text
   *   Text to be randomized.
   */
  public function transform($text) {
    $text_array = explode(' ', $text);
    shuffle($text_array);
    $random = implode(' ', $text_array);

    return $random;
  }

}
