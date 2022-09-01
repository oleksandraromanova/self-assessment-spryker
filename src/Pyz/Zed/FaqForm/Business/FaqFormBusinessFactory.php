<?php

namespace Pyz\Zed\FaqForm\Business;

use Pyz\Zed\FaqForm\Business\Form\FaqForm;
use Pyz\Zed\FaqForm\Business\Form\FaqFormInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\FaqForm\FaqFormConfig getConfig()
 */
class FaqFormBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\FaqForm\Business\Form\FaqFormInterface
     */
    public function createFaqForm(): FaqFormInterface
    {
        return new FaqForm();
    }
}
