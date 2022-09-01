<?php

namespace Pyz\Glue\FaqsRestApi\Processor\Faqs;


use Generated\Shared\Transfer\FaqCollectionTransfer;
use Pyz\Glue\FaqsRestApi\FaqsRestApiConfig;
use Pyz\Glue\FaqsRestApi\Processor\Mapper\FaqsResourceMapperInterface;
use Pyz\Glue\FaqsRestApi\Processor\Mapper\FaqsResourceMapper;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Pyz\Client\FaqsRestApi\FaqsRestApiClientInterface;

class FaqsReader implements FaqsReaderInterface
{
    /** @var \Pyz\Client\FaqsRestApi\FaqsRestApiClientInterface */
    private FaqsRestApiClientInterface $faqsRestApiClient;

    /** @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface */
    private RestResourceBuilderInterface $restResourceBuilder;

    /** @var \Pyz\Glue\FaqsRestApi\Processor\Mapper\FaqsResourceMapper */
    private FaqsResourceMapper $faqMapper;

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     * @param \Pyz\Glue\FaqsRestApi\Processor\Mapper\FaqsResourceMapperInterface $faqMapper
     */
    public function __construct(
        FaqsRestApiClientInterface   $faqsRestApiClient,
        RestResourceBuilderInterface $restResourceBuilder,
        FaqsResourceMapperInterface  $faqMapper
    )
    {
        $this->faqsRestApiClient = $faqsRestApiClient;
        $this->restResourceBuilder = $restResourceBuilder;
        $this->faqMapper = $faqMapper;
    }

    /**
     * @pararm \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function getFaqs(RestRequestInterface $restRequest): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();
        $idFaq = $restRequest->getResource()->getId();
        $faqCollectionTransfer = $this->faqsRestApiClient->getFaqCollection(new FaqCollectionTransfer());

        if($idFaq){
            $idArray = [];
            foreach ($faqCollectionTransfer->getFaqs()
                     as $faqTransfer) {
                $idFaqTransfer = $faqTransfer->getIdFaq();
                $idArray[] = $idFaqTransfer;
                if($idFaq == $idFaqTransfer){
                    $restResource = $this->restResourceBuilder->createRestResource(
                        FaqsRestApiConfig::RESOURCE_FAQS,
                        $faqTransfer->getIdFaq(),
                        $this->faqMapper->mapFaqDataToFaqRestAttributes($faqTransfer->toArray()
                        )
                    );
                    $restResponse->addResource($restResource);
                }

            }
            $isInArray = in_array($idFaq, $idArray);
            if($isInArray != 1){
                $restResource = $this->restResourceBuilder->createRestResource(
                    FaqsRestApiConfig::ERROR_NO_ID
                );
                $restResponse->addResource($restResource);
            }
        }else{
            foreach ($faqCollectionTransfer->getFaqs()
                     as $faqTransfer) {
                $restResource = $this->restResourceBuilder->createRestResource(
                    FaqsRestApiConfig::RESOURCE_FAQS,
                    $faqTransfer->getIdFaq(),
                    $this->faqMapper->mapFaqDataToFaqRestAttributes($faqTransfer->toArray()
                    )
                );
                $restResponse->addResource($restResource);
            }
        }

        return $restResponse;
    }

}
