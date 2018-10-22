<?php

namespace Drupal\Tests\text_transformer\Unit\Plugin\TextTransformer;

use Drupal\text_transformer\Plugin\TextTransformer\Random;
use Drupal\Tests\UnitTestCase;

/**
 * Tests the Random text transformer plugin.
 *
 * @package Drupal\Tests\text_transformer\Unit\Plugin\TextTransformer
 */
class RandomTest extends UnitTestCase {

  protected $textTransformer;

  /**
   * Create $textTransformer object for each test.
   */
  public function setUp() {
    $this->textTransformer = new Random();
  }

  /**
   * Unset $textTransformer object after each test.
   */
  public function tearDown() {
    unset($this->textTransformer);
  }

  /**
   * @covers Drupal\text_transformer\Plugin\TextTransformer\Random::transform
   */
  public function testRandomTransformer() {
    $text = [];

    // Original text.
    $text[0] = 'The quick brown fox jumped over the lazy dogs';

    // Call random transformation twice.
    $text[1] = $this->textTransformer->transform($text[0]);
    $text[2] = $this->textTransformer->transform($text[0]);

    // Remove duplicate array values.  If random transformer is
    // working correctly, no text array values should be removed.
    $unique = array_unique($text);

    // Check the expected number of array elements is the same.
    $expected = count($text);
    $this->assertCount($expected, $unique);
  }

}
