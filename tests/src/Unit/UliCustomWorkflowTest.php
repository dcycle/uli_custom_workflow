<?php

namespace Drupal\Tests\uli_custom_workflow\Unit;

use Drupal\uli_custom_workflow\UliCustomWorkflow;
use PHPUnit\Framework\TestCase;

/**
 * Test UliCustomWorkflow.
 *
 * @group uli_custom_workflow
 */
class UliCustomWorkflowTest extends TestCase {

  /**
   * Smoke test.
   */
  public function testSmoke() {
    $object = $this->getMockBuilder(UliCustomWorkflow::class)
      // NULL = no methods are mocked; otherwise list the methods here.
      ->setMethods(NULL)
      ->disableOriginalConstructor()
      ->getMock();

    $this->assertTrue(is_object($object));
  }

}
