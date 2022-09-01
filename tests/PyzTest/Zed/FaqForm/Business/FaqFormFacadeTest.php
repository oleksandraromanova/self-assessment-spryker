<?php

namespace PyzTest\Zed\FaqForm\Business;

use Codeception\Test\Unit;
use Generated\Shared\DataBuilder\FaqFormBuilder;

/**
 * Auto-generated group annotations
 *
 * @group PyzTest
 * @group Zed
 * @group FaqForm
 * @group Business
 * @group Facade
 * @group FaqFormFacadeTest
 * Add your own group annotations below this line
 */
class FaqFormFacadeTest extends Unit
{
    /**
     * @var \PyzTest\Zed\FaqForm\FaqFormBusinessTester
     */
    protected $tester;

    /**
     * @return void
     */
    public function testAddAnswerFieldCorrectly(): void
    {
        // Arrange
        $faqFormTransfer = (new FaqFormBuilder([
            'addAnswerField' => 'This text is longer than 50 symbols and must pass the test'
        ]))->build();

        // Act
        $faqFormResultTransfer = $this->tester->getFacade()->addAnswerField($faqFormTransfer);

        // Assert
        $this->assertSame('This text is longer than 50 symbols and must pass the test', $faqFormResultTransfer->getAnswerField());
    }

}
