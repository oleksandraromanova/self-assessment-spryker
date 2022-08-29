<?php

namespace Pyz\Zed\Faq\Business;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * @method \Pyz\Zed\Faq\Business\FaqBusinessFactory getFactory()
 */
class FaqFacade extends AbstractFacade implements FaqFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @api
     *
     */
    public function saveFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqSaver()
            ->save($faqTransfer);
    }

    /**
     * {@inheritdoc }
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function deleteFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqDeleter()
            ->delete($faqTransfer);

    }

    /**
     * {@inheritDoc}
     *
     * @param int $idFaq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     * @api
     *
     */
    public function findFaqById(int $idFaq): ?FaqTransfer
    {
        return $this->getFactory()
            ->createFaqReader()
            ->findFaqById($idFaq);
    }

}
