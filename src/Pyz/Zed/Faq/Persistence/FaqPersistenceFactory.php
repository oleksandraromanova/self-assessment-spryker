<?php

namespace Pyz\Zed\Faq\Persistence;

use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

class FaqPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\Faq\Persistence\PyzFaqQuery
     */
    public function createFaqQuery(): PyzFaqQuery
    {
        return PyzFaqQuery::create();
    }
}
