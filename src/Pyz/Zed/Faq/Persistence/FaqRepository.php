<?php

namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Orm\Zed\Faq\Persistence\PyzFaq;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

class FaqRepository extends AbstractRepository implements FaqRepositoryInterface
{
    /**
     * @param int $idFaq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function findFaqById(int $idFaq): ?FaqTransfer
    {
        $faqEntity = $this->createPyzFaqQuery()
            ->findOneByIdFaq($idFaq);
        if (!$faqEntity) {
            return null;
        }
        return $this->mapEntityToTransfer($faqEntity);
    }

    /**
     * @param int $idFaq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function findPyzFaqById(int $idFaq): ?FaqTransfer
    {
        $faqEntity = $this->getFactory()
            ->createFaqQuery()
            ->filterByIdFaq($idFaq)
            ->findOne();

        if (!$faqEntity) {
            return null;
        }

        return (new FaqTransfer())
            ->fromArray($faqEntity->toArray(), true);
    }

    /**
     * @return \Orm\Zed\Faq\Persistence\PyzFaqQuery
     */
    private function createPyzFaqQuery(): PyzFaqQuery
    {
        return PyzFaqQuery::create();
    }

    /**
     * @param \Orm\Zed\Faq\Persistence\PyzFaq $faqEntity
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function mapEntityToTransfer(PyzFaq $faqEntity): FaqTransfer
    {
        return (new FaqTransfer())->fromArray($faqEntity->toArray());
    }

    /**
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $faqsRestApiTransfer
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer $faqsRestApiTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqsRestApiTransfer): FaqCollectionTransfer
    {
        $faqCollection = $this->createPyzFaqQuery()
            ->find();

        foreach ($faqCollection as $faqEntity) {
            $faqTransfer = (new FaqTransfer())->fromArray($faqEntity->toArray());
            $faqsRestApiTransfer->addFaq($faqTransfer);
        }

        return $faqsRestApiTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     * @return \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     * //* @return array
     */
    public function getFaqs(FaqTransfer $faqTransfer): FaqTransfer
    {
        $faqs = $this->createPyzFaqQuery()
            ->find();

        foreach ($faqs as $faqEntity) {
            $faqTransfer = (new FaqTransfer())->fromArray($faqEntity->toArray());
            //$faqTransfer->toArray();

        }

        return $faqTransfer;
    }

}
