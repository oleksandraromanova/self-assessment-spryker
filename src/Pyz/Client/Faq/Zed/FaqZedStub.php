<?php

namespace Pyz\Client\Faq\Zed;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class FaqZedStub implements FaqZedStubInterface
{
    /**
     * @var \Spryker\Client\ZedRequest\ZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param \Spryker\Client\ZedRequest\ZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function getFaqs(FaqTransfer $faqTransfer): FaqTransfer
    {
        /** @var \Generated\Shared\Transfer\FaqTransfer $faqTransfer */
        $faqTransfer = $this->zedRequestClient->call('/faq/gateway/reverse-string', $faqTransfer);

        return $faqTransfer;
    }
}
