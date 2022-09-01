<?php

namespace Pyz\Zed\Faq\Business;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;

interface FaqFacadeInterface
{
    /**
     * Specification:
     * - stores Faq to the database based on input transfer
     * - returns enhanced `FaqTransfer` with ID
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function saveFaq(FaqTransfer $faqTransfer): FaqTransfer;

    /**
     * Specification:
     * - removes Faq from the database based on input transfer
     * - returns redirect response
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function deleteFaq(FaqTransfer $faqTransfer): FaqTransfer;

    /**
     * Specification:
     * - returns Faq if exists based on its ID
     * - returns null if no such record is found
     *
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
