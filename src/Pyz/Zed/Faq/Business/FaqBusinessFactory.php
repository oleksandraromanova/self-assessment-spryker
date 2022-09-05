<?php

namespace Pyz\Zed\Faq\Business;

use Pyz\Zed\Faq\Business\Faq\FaqDeleter;
use Pyz\Zed\Faq\Business\Faq\FaqDeleterInterface;
use Pyz\Zed\Faq\Business\Faq\FaqSaver;
use Pyz\Zed\Faq\Business\Faq\FaqSaverInterface;
use Pyz\Zed\Faq\FaqDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Pyz\Zed\Faq\Business\Faq\FaqReaderInterface;
use Pyz\Zed\Faq\Business\Faq\FaqReader;
use Pyz\Zed\Faq\Business\Faq\FaqWriterInterface;
use Pyz\Zed\Faq\Business\Faq\FaqWriter;

/**
 * @method \Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\Faq\Persistence\FaqRepositoryInterface getRepository()
 */
class FaqBusinessFactory extends AbstractBusinessFactory
{

    /**
     * @return \Pyz\Zed\Faq\Business\FaqFacade
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    protected function getFaqFacade(): FaqFacadeInterface
    {
        return $this->getProvidedDependency(FaqDependencyProvider::FACADE_FAQS);
    }

    /**
     * @return \Pyz\Zed\Faq\Business\Faq\FaqSaverInterface
     */
    public function createFaqSaver(): FaqSaverInterface
    {
        return new FaqSaver(
            $this->getEntityManager()
        );
    }

    /**
     * @return \Pyz\Zed\Faq\Business\Faq\FaqReaderInterface
     */
    public function createFaqReader(): FaqReaderInterface
    {
        return new FaqReader(
            $this->getRepository()
        );
    }

    /**
    * @return \Pyz\Zed\Faq\Business\Faq\FaqWriterInterface
    */
    public function createFaqWriter(): FaqWriterInterface
    {
        return new FaqWriter($this->getEntityManager());
    }

    /**
     * @return \Pyz\Zed\Faq\Business\Faq\FaqDeleterInterface
     */
    public function createFaqDeleter(): FaqDeleterInterface
    {
        return new FaqDeleter(
            $this->getEntityManager()
        );
    }


}
