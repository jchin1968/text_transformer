<?php

namespace Drupal\Tests\text_transformer\Unit\Plugin\TextTransformer;

use Drupal\text_transformer\Plugin\TextTransformer\Upper;
use Drupal\Tests\UnitTestCase;

/**
 * Tests the Upper text transformer plugin.
 *
 * @package Drupal\Tests\text_transformer\Unit\Plugin\TextTransformer
 */
class UpperTest extends UnitTestCase {

  protected $textTransformer;

  /**
   * Create $textTransformer object for each test.
   */
  public function setUp() {
    $this->textTransformer = new Upper();
  }

  /**
   * Unset $textTransformer object after each test.
   */
  public function tearDown() {
    unset($this->textTransformer);
  }

  /**
   * @covers Drupal\text_transformer\Plugin\TextTransformer\Upper::transform
   */
  public function testUpperTransformer() {
    $text = 'The quick brown fox';
    $expected = 'THE QUICK BROWN FOX';
    $actual = $this->textTransformer->transform($text);
    $this->assertEquals($expected, $actual);
  }

}
