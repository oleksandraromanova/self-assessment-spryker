<?php

namespace Pyz\Zed\Faq\Business\Faq;

use Generated\Shared\Transfer\FaqTransfer;
use Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface;

class FaqWriter implements FaqWriterInterface
{
    /**
     * @var \Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface
     */
    protected $faqEntityManager;

    /**
     * @param \Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface $faqEntityManager
     */
    public function __construct(FaqEntityManagerInterface $faqEntityManager)
    {
        $this->faqEntityManager = $faqEntityManager;
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function createFaqEntity(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->faqEntityManager->saveFaqEntity($faqTransfer);
    }
}

