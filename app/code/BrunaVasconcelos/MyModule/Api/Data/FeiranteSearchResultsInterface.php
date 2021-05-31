<?php

namespace BrunaVasconcelos\MyModule\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface FeiranteSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get feirante list.
     *
     * @return \BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface[]
     */
    public function getItems();

    /**
     * Set feirante list.
     *
     * @param \BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
