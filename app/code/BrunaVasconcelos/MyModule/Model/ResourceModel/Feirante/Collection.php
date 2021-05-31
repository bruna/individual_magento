<?php

namespace BrunaVasconcelos\MyModule\Model\ResourceModel\Feirante;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \BrunaVasconcelos\MyModule\Model\Feirante::class,
            \BrunaVasconcelos\MyModule\Model\ResourceModel\Feirante::class
        );
    }
}
