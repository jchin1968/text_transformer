<?php

namespace Drupal\text_transformer\Plugin\TextTransformer;

use Drupal\text_transformer\TextTransformerBase;

/**
 * Transform text to pig latin.
 *
 * @TextTransformer(
 *   id = "pig_latin",
 *   name = @Translation("Pig Latin"),
 *   description = @Translation("Transform to Pig Latin"),
 * )
 */
class PigLatin extends TextTransformerBase {

  /**
   * Transform text to pig latin.
   *
   * @param string $text
   *   Text to be transformed.
   */
  public function transform($text) {
    $text_array = explode(' ', $text);

    $transformed = [];
    foreach ($text_array as $word) {
      $word_array = str_split($word);
      $first_char = array_shift($word_array);
      $word_array[] = $first_char;
      $word_array[] = 'a';
      $word_array[] = 'y';
      $transformed_text[] = implode($word_array);
    }
    return implode(' ', $transformed_text);
  }

}
