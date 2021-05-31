<?php

namespace BrunaVasconcelos\MyModule\Controller\Teste;

use BrunaVasconcelos\MyModule\Api\MyModuleRepositoryInterface;
use BrunaVasconcelos\MyModule\Api\Data\MyModuleInterfaceFactory;
use BrunaVasconcelos\MyModule\Model\ResourceModel\MyModule\CollectionFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Api\SearchCriteriaBuilderFactory;

class Create implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    private $pageFactory;
    /**
     * @var FeiranteInterfaceFactory
     */
    private $feiranteFactory;
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;
    /**
     * @var FeiranteRepositoryInterface
     */
    private $FeiranteRepository;

    /**
     * @var SearchCriteriaBuilderFactory
     */
    private $searchCriteriaBuilderFactory;

    /**
     * Create constructor.
     * @param FeiranteRepositoryInterface $feiranteRepository
     * @param FeiranteInterfaceFactory $feiranteFactory
     * @param CollectionFactory $collectionFactory
     * @param SearchCriteriaBuilderFactory $searchCriteriaBuilderFactory
     * @param PageFactory $pageFactory
     */
    public function __construct(
        FeiranteRepositoryInterface $feiranteRepository,
        FeiranteInterfaceFactory $feiranteFactory,
        CollectionFactory $collectionFactory,
        SearchCriteriaBuilderFactory $searchCriteriaBuilderFactory,
        PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
        $this->feiranteFactory = $feiranteFactory;
        $this->collectionFactory = $collectionFactory;
        $this->feiranteRepository = $feiranteRepository;
        $this->searchCriteriaBuilderFactory = $searchCriteriaBuilderFactory;
    }

    /**
     * Execute action based on request and return result
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        try {

            /** @var \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder */
            $searchCriteriaBuilder = $this->searchCriteriaBuilderFactory->create();

            /**
             * adicionando filtros (WHERE, AND)
             */
            $searchCriteriaBuilder->addFilter(
                \BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface::PAIS,
                'Brasil'
            );

            /**
             * adicionando paginação (LIMIT n OFFSET n)
             */
            $searchCriteriaBuilder->setPageSize(2);
            $searchCriteriaBuilder->setCurrentPage(2);

            /** @var \BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface $item */
            foreach ($lista->getItems() as $item) {
                $nomeMyModule = $item->getNome();
                $paisMyModule = $item->getPais();
            }

        } catch (\Exception $e) {
            $a = 1;
        }

        return $this->pageFactory->create();
    }

    private function testRepository1()
    {
        /**
         * carregando
         */
        $feirante = $this->feiranteRepository->getById(13);


        /**
         * apagando
         */
        $this->feiranteRepository->delete($feirante);
        $this->feiranteRepository->deleteById(13);

        /**
         * Feirante
         */
        $feirante = $this->feiranteFactory->create();
        $feirante->setNome('Nome 10');
        $feirante->setSobrenome('Sob 10');
        $feirante->setNomeLoja('NomeLoja 10');
        $feirante->setPais('Brasil');

        $this->feiranteRepository->save($feirante);
    }

    private function testModel()
    {
        $feirante1 = $this->feiranteFactory->create();
        $feirante1 = $feirante1->load(5);

        return;

        /**
         * Feirante 1
         */
        $feirante = $this->feiranteFactory->create();
        $feirante->setNome('Maria');
        $feirante->setSobrenome('José');
        $feirante->setNomeLoja('Frutas e frutos');
        $feirante->setPais('Brasil');
        $feirante->save();

        /**
         * Feirante 2
         */
        $feirante = $this->feiranteFactory->create();
        $feirante->setNome('Joao');
        $feirante->setFabricante('da Silva');
        $feirante->setNomeLoja('VerdFrut');
        $feirante->setPais('Brasil');
        $feirante->save();
    }


    private function testCollection()
    {
        /** @var \BrunaVasconcelos\MyModule\Model\ResourceModel\Feirante\Collection $collection */
        $collection = $this->collectionFactory->create();

        $collection->addFieldToSelect(['nome', 'sobrenome', 'nome_loja']);

        /** @var \BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface $item */
        foreach ($collection->getItems() as $item) {
            $name = $item->getNome();
            $a = 1;
        }


        $collection->addFieldToFilter('pais', 'Brasil');
        foreach ($collection->getItems() as $item) {
            $name = $item->getNome();
            $a = 1;
        }
    }
}



