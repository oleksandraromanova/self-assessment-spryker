<?php

namespace Pyz\Glue\FaqsRestApi\Processor\Mapper;

use Generated\Shared\Transfer\RestFaqsResponseAttributesTransfer;

interface FaqsResourceMapperInterface
{
    public function mapFaqDataToFaqRestAttributes(array $faqData): RestFaqsResponseAttributesTransfer;
}
