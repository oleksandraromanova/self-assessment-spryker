<?php

namespace Pyz\Client\Faq;

use Generated\Shared\Transfer\FaqTransfer;

interface FaqClientInterface
{
    /**
     * Specification:
     * - Does Zed call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function reverseString(FaqTransfer $faqTransfer): FaqTransfer;
}

