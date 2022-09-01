<?php
namespace Pyz\Zed\FaqForm\Business;

use Generated\Shared\Transfer\FaqFormTransfer;

interface FaqFormFacadeInterface
{
    /**
     * Specification:
     * - Adds an answer field.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FaqFormTransfer $faqFormTransfer
     *
     * @return \Generated\Shared\Transfer\FaqFormTransfer
     */
    public function addAnswerField(FaqFormTransfer $faqFormTransfer): FaqFormTransfer;
}
