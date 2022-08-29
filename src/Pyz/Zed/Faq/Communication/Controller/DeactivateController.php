<?php

namespace Pyz\Zed\Faq\Communication\Controller;


use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Faq\Communication\FaqCommunicationFactory getFactory()
 * @method \Pyz\Zed\Faq\Business\FaqFacade getFacade()
 */
class DeactivateController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $idFaq = $this->castId($request->query->get('id-faq'));

        $faq = $this->getFacade()
            ->findFaqById($idFaq);

        $faqTransfer = (new FaqTransfer())
            ->setIdFaq($idFaq)
            ->setName($faq->getName())
            ->setAnswer($faq->getAnswer())
            ->setActive('0');

        $faqForm = $this->getFactory()
            ->createFaqForm($faqTransfer)
            ->handleRequest($request);

        if ($faqForm->isSubmitted() && $faqForm->isValid()) {
            $this->getFacade()
                ->saveFaq($faqTransfer);
            $this->addSuccessMessage('Faq was deactivated.');
            return $this->redirectResponse('/faq/list');
        }

        return $this->viewResponse([
            'faqForm' => $faqForm->createView()
        ]);
    }
}
