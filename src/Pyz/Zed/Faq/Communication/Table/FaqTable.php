<?php

namespace Pyz\Zed\Faq\Communication\Table;

use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Orm\Zed\Faq\Persistence\Map\PyzFaqTableMap;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;


class FaqTable extends AbstractTable
{
    /** @var \Orm\Zed\Faq\Persistence\PyzFaqQuery */
    private PyzFaqQuery $faqQuery;

    /**
     * @param \Orm\Zed\Faq\Persistence\PyzFaqQuery $faqQuery
     */
    public function __construct(PyzFaqQuery $faqQuery)
    {
        $this->faqQuery = $faqQuery;
    }

    /**
     * @param TableConfiguration $config
     *
     * @return TableConfiguration
     */
    protected function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            PyzFaqTableMap::COL_NAME => 'FAQ',
            PyzFaqTableMap::COL_ANSWER => 'Answer',
            PyzFaqTableMap::COL_EDIT => 'Edit',
            PyzFaqTableMap::COL_DELETE => 'Delete',
            PyzFaqTableMap::COL_DEACTIVATE => 'Deactivate'
        ]);

        $config->setSortable([
            PyzFaqTableMap::COL_NAME,
            PyzFaqTableMap::COL_ANSWER
        ]);

        $config->setSearchable([
            PyzFaqTableMap::COL_NAME
        ]);

        $config->setRawColumns([
            PyzFaqTableMap::COL_EDIT,
            PyzFaqTableMap::COL_DELETE,
            PyzFaqTableMap::COL_DEACTIVATE
        ]);

        return $config;
    }

    /**
     * @param TableConfiguration
     * $config
     *
     * @return array
     */
    protected function prepareData(TableConfiguration $config): array
    {
        $faqDataItems = $this->runQuery($this->faqQuery,
            $config);
        $faqTableRows = [];
        foreach ($faqDataItems as $faqDataItem) {
            $idFaq = $faqDataItem[PyzFaqTableMap::COL_ID_FAQ];
            if ($faqDataItem[PyzFaqTableMap::COL_ACTIVE] == 1){
                $faqTableRows[] = [
                    PyzFaqTableMap::COL_NAME =>
                        $faqDataItem[PyzFaqTableMap::COL_NAME],
                    PyzFaqTableMap::COL_ANSWER =>
                        $faqDataItem[PyzFaqTableMap:: COL_ANSWER],
                    PyzFaqTableMap::COL_EDIT =>
                        $this->generateEditButton('/faq/edit?id-faq=' . $idFaq, 'Edit'),
                    PyzFaqTableMap::COL_DELETE =>
                        $this->generateRemoveButton('/faq/delete?id-faq=' . $idFaq, 'Delete', [
                            'id-faq' => $idFaq,
                            'class' => 'remove-item',
                        ]),
                    PyzFaqTableMap::COL_DEACTIVATE =>
                        $this->generateViewButton('/faq/deactivate?id-faq=' . $idFaq, 'Deactivate')
                ];
            }


            }

        return $faqTableRows;
    }

}
