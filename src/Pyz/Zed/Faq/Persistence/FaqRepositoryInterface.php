<?php

namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;

interface FaqRepositoryInterface
{
    /**
     * @param int $idFaq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function findFaqById(int $idFaq): ?FaqTransfer;

    /**
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $faqsRestApiTransfer
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer $faqsRestApiTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqsRestApiTransfer): FaqCollectionTransfer;

}

