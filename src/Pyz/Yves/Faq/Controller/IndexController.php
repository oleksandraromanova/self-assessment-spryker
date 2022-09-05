<?php

namespace Pyz\Yves\Faq\Controller;

use Pyz\Zed\Faq\Business\FaqBusinessFactory;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Generated\Shared\Transfer\FaqTransfer;

/**
 * @method \Pyz\Client\Faq\FaqClientInterface getClient()
 * @method \Pyz\Zed\Faq\Business\FaqBusinessFactory getFactory()
 */
class IndexController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Spryker\Yves\Kernel\View\View
     */
    public function indexAction(Request $request)
    {
        $faqTransfer = new FaqTransfer();
        $faqTransfer = $this->getClient()->reverseString($faqTransfer);
        var_dump($faqTransfer);

        $datas = ['datas' => $faqTransfer];

        //        $data = ['idFaq' => $faqTransfer['idFaq'],
//            'name' => $faqTransfer['name'],
//            'answer' => $faqTransfer['answer']
//        ];

        return $this->view(
            $datas,
            [],
            '@Faq/views/index/index.twig'
        );
    }
}
