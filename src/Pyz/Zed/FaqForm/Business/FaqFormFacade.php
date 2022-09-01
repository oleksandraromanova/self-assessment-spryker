<?php

namespace Pyz\Zed\FaqForm\Business;


use Generated\Shared\Transfer\FaqFormTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\FaqForm\Business\FaqFormBusinessFactory getFactory()
 */
class FaqFormFacade extends AbstractFacade implements FaqFormFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FaqFormTransfer $faqFormTransfer
     *
     * @return \Generated\Shared\Transfer\FaqFormTransfer
     */
    public function addAnswerField(FaqFormTransfer $faqFormTransfer): FaqFormTransfer
    {
        return $this->getFactory()
            ->createFaqForm()
            ->addAnswerField($faqFormTransfer);
    }
}
