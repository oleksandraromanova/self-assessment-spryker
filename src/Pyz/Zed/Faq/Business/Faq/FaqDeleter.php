<?php

namespace Pyz\Zed\Faq\Business\Faq;

use Generated\Shared\Transfer\FaqTransfer;
use Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface;

class FaqDeleter implements FaqDeleterInterface
{
    /** @var \Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface */
    private FaqEntityManagerInterface $faqEntityManager;

    /**
     * @param \Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface $faqEntityManager
     */
    public function __construct(FaqEntityManagerInterface $faqEntityManager)
    {
        $this->faqEntityManager = $faqEntityManager;
    }

    /**
     * @pararm \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function delete(?FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->faqEntityManager->deleteFaq($faqTransfer);
    }
}
