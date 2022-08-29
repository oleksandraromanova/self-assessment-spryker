<?php

namespace Pyz\Zed\Faq\Business\Faq;

use Generated\Shared\Transfer\FaqTransfer;

interface FaqDeleterInterface
{
    /**
     * @pararm \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function delete(?FaqTransfer $faqTransfer): FaqTransfer;
}

