<?php

namespace Pyz\Zed\Faq;

use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class FaqDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_FAQS = 'FACADE_FAQS';

    public const QUERY_FAQ = 'QUERY_FAQ';
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     * @throws \Spryker\Service\Container\Exception\ContainerException
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = $this->addPyzFaqPropelQuery($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = $this->addFaqsFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addFaqsFacade(Container $container): Container
    {
        $container->set(static::FACADE_FAQS, function (Container $container) {
            return $container->getLocator();
            // return $container->getLocator()->stringReverser()->facade();
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     * @throws \Spryker\Service\Container\Exception\ContainerException
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    private function addPyzFaqPropelQuery(Container $container):
    Container
    {
        $container->set(
            static::QUERY_FAQ,
            $container->factory(
                fn() => PyzFaqQuery::create()
            )
        );
        return $container;
    }
}
