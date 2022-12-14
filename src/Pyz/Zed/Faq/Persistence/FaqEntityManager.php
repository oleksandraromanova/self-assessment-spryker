<?php

namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Orm\Zed\Faq\Persistence\PyzFaq;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;
class FaqEntityManager extends AbstractEntityManager implements FaqEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function saveFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        $faqEntity = $this->createPyzFaqQuery()
            ->filterByIdFaq($faqTransfer->getIdFaq())
            ->findOneOrCreate();
// fill up entity
        $faqEntity->fromArray($faqTransfer->toArray());
        $faqEntity->save();
// update transfer based on entity (like id_faq field)
        $faqTransfer->fromArray($faqEntity->toArray());

        return $faqTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function saveFaqEntity(FaqTransfer $faqTransfer): FaqTransfer
    {
        $faqEntity = new PyzFaq();
        $faqEntity->fromArray($faqTransfer->modifiedToArray());
        $faqEntity->save();

        $faqTransfer->fromArray($faqEntity->toArray(), true);

        return $faqTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $faqsRestApiTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function saveRestApiFaq(FaqCollectionTransfer $faqsRestApiTransfer): FaqCollectionTransfer
    {
        $faqEntity = $this->createPyzFaqQuery()
            ->filterByIdFaq('23')
            ->findOneOrCreate();
// fill up entity
        $faqEntity->fromArray($faqsRestApiTransfer->toArray());
        $faqEntity->save();
// update transfer based on entity (like id_faq field)
        $faqsRestApiTransfer->fromArray($faqEntity->toArray());
        return $faqsRestApiTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function deleteFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        $faqEntity = $this->createPyzFaqQuery()
            ->filterByIdFaq($faqTransfer->getIdFaq())
            ->findOneOrCreate();
// delete entity
        $faqEntity->delete();
// update transfer based on entity (like id_faq field)
        $faqTransfer->fromArray($faqEntity->toArray());
        return $faqTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function deactivateFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        $faqEntity = $this->createPyzFaqQuery()
            ->filterByIdFaq($faqTransfer->getIdFaq())
            ->findOneOrCreate();
// deactivate entity
        $faqEntity->setActive(0);
// update transfer based on entity (like id_faq field)
        $faqTransfer->fromArray($faqEntity->toArray());
        return $faqTransfer;
    }

    /**
     * @return \Orm\Zed\Faq\Persistence\PyzFaqQuery
     */
    private function createPyzFaqQuery(): PyzFaqQuery
    {
        return PyzFaqQuery::create();
    }
}
