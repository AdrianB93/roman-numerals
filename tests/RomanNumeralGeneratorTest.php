<?php

namespace Larowlan\RomanNumerals\Tests;

use Larowlan\RomanNumerals\RomanNumeralGenerator;

/**
 * Defines a class for testing roman numeral generation.
 *
 * @group Unit
 */
class RomanNumeralGeneratorTest extends \PHPUnit_Framework_TestCase {

  /**
   * Generator under test.
   *
   * @var \Larowlan\RomanNumerals\RomanNumeralGenerator
   */
  protected $generator;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->generator = new RomanNumeralGenerator();
  }

  /**
   * Tests default roman numeral generation.
   * Default is expected to be uppercase.
   *
   * @dataProvider providerTestGeneration
   */
  public function testDefaultGeneration($number, $expected) {
    $this->assertEquals(
      $uppercase = strtoupper($expected),
      $this->generator->generate($number)
    );
  }

  /**
   * Test roman numeral generation in lowercase.
   *
   * @dataProvider providerTestGeneration
   */
  public function testLowercaseGeneration($number, $expected) {
    $this->assertEquals(
      $lowercase = strtolower($expected),
      $this->generator->generate($number, $in_lowercase = true)
    );
  }

  /**
   * Test roman numeral generation in uppercase.
   *
   * @dataProvider providerTestGeneration
   */
  public function testUppercaseGeneration($number, $expected) {
    $this->assertEquals(
      $uppercase = strtoupper($expected),
      $this->generator->generate($number, $in_lowercase = false)
    );
  }

  /**
   * Data provider for testGeneration().
   *
   * @return array
   *   Test cases.
   */
  public function providerTestGeneration() {
    return [
      1 => [1, "I"],
      2 => [2, "II"],
      3 => [3, "III"],
      4 => [4, "IV"],
      5 => [5, "V"],
      6 => [6, "VI"],
      9 => [9, "IX"],
      27 => [27, "XXVII"],
      48 => [48, "XLVIII"],
      59 => [59, "LIX"],
      93 => [93, "XCIII"],
      141 => [141, "CXLI"],
      163 => [163, "CLXIII"],
      402 => [402, "CDII"],
      575 => [575, "DLXXV"],
      911 => [911, "CMXI"],
      1024 => [1024, "MXXIV"],
      3000 => [3000, "MMM"],
    ];
  }
}
