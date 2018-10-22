<?php

namespace Drupal\Tests\text_transformer\Unit\Plugin\TextTransformer;

use Drupal\text_transformer\Plugin\TextTransformer\PigLatin;
use Drupal\Tests\UnitTestCase;

/**
 * Tests the Pig Latin text transformer plugin.
 *
 * @package Drupal\Tests\text_transformer\Unit\Plugin\TextTransformer
 */
class PigLatinTest extends UnitTestCase {

  protected $textTransformer;

  /**
   * Create $textTransformer object for each test.
   */
  public function setUp() {
    $this->textTransformer = new PigLatin();
  }

  /**
   * Unset $textTransformer object after each test.
   */
  public function tearDown() {
    unset($this->textTransformer);
  }

  /**
   * Test pig latin text transformer.
   *
   * @dataProvider sentenceProvider
   * @covers Drupal\text_transformer\Plugin\TextTransformer\PigLatin::transform
   */
  public function testPigLatinTransformer(string $text, string $expected) {
    $actual = $this->textTransformer->transform($text);
    $this->assertEquals($expected, $actual);
  }

  /**
   * Provide an array of data containing a sentence and the expected Pig Latin
   * translation.
   *
   * @return array
   */
  public function sentenceProvider() {
    return [
      'sentence_1'   => ['Drupal Rock', 'rupalDay ockRay'],
      'sentence_2'   => ['Testing is good', 'estingTay siay oodgay'],
      'sentence_3'   => ['Welcome to the meetup', 'elcomeWay otay hetay eetupmay'],
    ];
  }
}

