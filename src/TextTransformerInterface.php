<?php

namespace Drupal\text_transformer;

/**
 * Define an interface for creating text transformer plugins.
 */
interface TextTransformerInterface {

  /**
   * Return plugin name.
   *
   * @return string
   *   Plugin name.
   */
  public function getName();

  /**
   * Return transformed text.
   *
   * @param string $text
   *   Original text to be transformed.
   *
   * @return string
   *   Transformed text.
   */
  public function transform($text);

}
