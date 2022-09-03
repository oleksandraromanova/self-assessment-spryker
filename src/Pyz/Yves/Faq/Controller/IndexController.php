<?php

namespace Pyz\Yves\Faq\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Generated\Shared\Transfer\FaqTransfer;

/**
 * @method \Pyz\Client\Faq\FaqClientInterface getClient()
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

//        foreach ($faqTransfer as $faq) {
//
//            var_dump($faq);
//        }

//        $data = ['idFaq' => 'id_faq',
//            'name' => 'name',
//            'answer' => 'answer'
//        ];

        $data = ['idFaq' => $faqTransfer['idFaq'],
            'name' => $faqTransfer['name'],
            'answer' => $faqTransfer['answer']
        ];

        return $this->view(
            $data,
            [],
            '@Faq/views/index/index.twig'
        );
    }
}
