<?php

namespace Drupal\Tests\text_transformer\Unit\Plugin\TextTransformer;

use Drupal\text_transformer\Plugin\TextTransformer\Lower;
use Drupal\Tests\UnitTestCase;

/**
 * Tests the Lower text transformer plugin.
 *
 * @package Drupal\Tests\text_transformer\Unit\Plugin\TextTransformer
 */
class LowerTest extends UnitTestCase {

  protected $textTransformer;

  /**
   * Create $textTransformer object for each test.
   */
  public function setUp() {
    $this->textTransformer = new Lower();
  }

  /**
   * Unset $textTransformer object after each test.
   */
  public function tearDown() {
    unset($this->textTransformer);
  }

  /**
   * @covers Drupal\text_transformer\Plugin\TextTransformer\Lower::transform
   */
  public function testLowerTransformer() {
    $text = 'The QUICK Brown Fox';
    $expected = 'the quick brown fox';
    $actual = $this->textTransformer->transform($text);
    $this->assertEquals($expected, $actual);
  }

}
