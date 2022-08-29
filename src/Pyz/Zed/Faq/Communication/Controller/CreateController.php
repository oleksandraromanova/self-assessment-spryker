<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Faq\Communication\FaqCommunicationFactory getFactory()
 * @method \Pyz\Zed\Faq\Business\FaqFacadeInterface getFacade()
 */

class CreateController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $faqTransfer = (new FaqTransfer())
            ->setActive(1);

        $faqForm = $this->getFactory()
            ->createFaqForm($faqTransfer)
            ->handleRequest($request);

        if ($faqForm->isSubmitted() && $faqForm->isValid()) {
            $this->getFacade()
                ->saveFaq($faqForm->getData());
            $this->addSuccessMessage('Faq was created.');

            return $this->redirectResponse('/faq/list');
        }

        return $this->viewResponse([
            'faqForm' => $faqForm->createView()
        ]);
    }

}
