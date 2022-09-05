<?php

namespace Pyz\Zed\Faq\Business\Faq;

use Generated\Shared\Transfer\FaqTransfer;

interface FaqWriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function createFaqEntity(FaqTransfer $faqTransfer): FaqTransfer;
}
