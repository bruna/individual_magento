<?php

namespace BrunaVasconcelos\MyModule\Model;

use BrunaVasconcelos\MyModule\Api\Data\FeiranteSearchResultsInterfaceFactory;
use BrunaVasconcelos\MyModule\Model\ResourceModel\Feirante\CollectionFactory;
use BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface;
use BrunaVasconcelos\MyModule\Api\FeiranteRepositoryInterface;
use BrunaVasconcelos\MyModule\Api\Data\FeiranteInterfaceFactory;
use BrunaVasconcelos\MyModule\Model\ResourceModel\Feirante as ResourceModel;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use Magento\Framework\Exception\AbstractAggregateException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\EntityManager\HydratorInterface;


class FeiranteRepository implements FeiranteRepositoryInterface
{
    /**
     * @var FeiranteInterfaceFactory
     */
    private $feiranteFactory;

    /**
     * @var ResourceModel
     */
    private $resource;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var CollectionProcessor
     */
    private $collectionProcessor;

    /**
     * @var FeiranteSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * FeiranteRepository constructor.
     * @param CollectionFactory $collectionFactory
     * @param FeiranteInterfaceFactory $feiranteFactory
     * @param ResourceModel $resource
     * @param CollectionProcessor $collectionProcessor
     * @param HydratorInterface $hydrator
     * @param FeiranteSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        FeiranteInterfaceFactory $feiranteFactory,
        ResourceModel $resource,
        CollectionProcessor $collectionProcessor,
        HydratorInterface $hydrator,
        FeiranteSearchResultsInterfaceFactory  $searchResultsFactory
    ) {
        $this->feiranteFactory = $feiranteFactory;
        $this->resource = $resource;
        $this->collectionFactory = $collectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->hydrator = $hydrator;
    }

    /**
     * Retrieve feirante.
     *
     * @param string $idFeirante
     * @return \BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($idFeirante)
    {
        $feirante = $this->feiranteFactory->create();
        $this->resource->load($feirante, $idFeirante);
        if (!$feirante->getId()) {
            throw new NoSuchEntityException(__('O feirante com o ID "%1" nao existe.', $feirante));
        }
        return $feirante;
    }

    /**
     * Retrieve feirante matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \BrunaVasconcelos\MyModule\Api\Data\FeiranteSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /** @var \BrunaVasconcelos\MyModule\Model\ResourceModel\Feirante\Collection $collection */
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var \BrunaVasconcelos\MyModule\Api\Data\FeiranteSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * Save feirante.
     *
     * @param \BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface $feirante
     * @return \BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(FeiranteInterface $feirante)
    {
        if ($feirante->getId() && $feirante instanceof Feirante && !$feirante->getOrigData()) {
            $feirante = $this->hydrator->hydrate($this->getById($feirante->getId()), $this->hydrator->extract($feirante));
        }

        try {
            $this->resource->save($feirante);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $feirante;
    }

    /**
     * Delete block.
     *
     * @param \BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface $feirante
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(FeiranteInterface $feirante)
    {
        try {
            $this->resource->delete($feirante);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * Delete feirante by ID.
     *
     * @param string $idFeirante
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($idFeirante)
    {
        return $this->delete($this->getById($idFeirante));
    }
}
