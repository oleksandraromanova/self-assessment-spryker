<?php

namespace Pyz\Client\Faq;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\Faq\FaqFactory getFactory()
 */
class FaqClient extends AbstractClient implements FaqClientInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function reverseString(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->getFaqs($faqTransfer);
    }
}
