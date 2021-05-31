<?php

namespace BrunaVasconcelos\MyModule\Api;

use BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface FeiranteRepositoryInterface
{
    /**
     * Retrieve feirante.
     *
     * @param string $idFeirante
     * @return \BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($idFeirante);

    /**
     * Retrieve blocks matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \BrunaVasconcelos\MyModule\Api\Data\FeiranteSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Save feirante.
     *
     * @param \BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface $feirante
     * @return \BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(FeiranteInterface $feirante);

    /**
     * Delete block.
     *
     * @param \BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface $feirante
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(FeiranteInterface $feirante);

    /**
     * Delete feirante by ID.
     *
     * @param string $idFeirante
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($idFeirante);
}
