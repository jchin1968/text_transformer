<?php

namespace Drupal\Tests\text_transformer\Unit\Plugin\TextTransformer;

use Drupal\text_transformer\Plugin\TextTransformer\Reverse;
use Drupal\Tests\UnitTestCase;

/**
 * Tests the Reverse text transformer plugin.
 *
 * @package Drupal\Tests\text_transformer\Unit\Plugin\TextTransformer
 */
class ReverseTest extends UnitTestCase {

  protected $textTransformer;

  /**
   * Create $textTransformer object for each test.
   */
  public function setUp() {
    $this->textTransformer = new Reverse();
  }

  /**
   * Unset $textTransformer object after each test.
   */
  public function tearDown() {
    unset($this->textTransformer);
  }

  /**
   * @covers Drupal\text_transformer\Plugin\TextTransformer\Reverse::transform
   */
  public function testReverseTransformer() {
    $text = 'The quick brown fox';
    $expected = 'fox brown quick The';
    $actual = $this->textTransformer->transform($text);
    $this->assertEquals($expected, $actual);
  }

}
