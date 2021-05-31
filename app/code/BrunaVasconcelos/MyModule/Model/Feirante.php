<?php

namespace BrunaVasconcelos\MyModule\Model;

use BrunaVasconcelos\MyModule\Api\Data\FeiranteInterface;
use Magento\Framework\Model\AbstractModel;

class Feirante extends AbstractModel implements FeiranteInterface
{
    protected $_eventPrefix = 'feirantes_acn';

    /**
     * Construct.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\BrunaVasconcelos\MyModule\Model\ResourceModel\Feirante::class);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->getData(self::ID);
    }

    /**
     * @return string
     */
    public function getNome(): ?string
    {
        return $this->getData(self::NOME);
    }

    /**
     * @return string
     */
    public function getSobrenome(): ?string
    {
        return $this->getData(self::SOBRENOME);
    }

    /**
     * @return string
     */
    public function getNomeLoja(): ?string
    {
        return $this->getData(self::NOME_LOJA);
    }

    /**
     * @return string
     */
    public function getPais(): ?string
    {
        return $this->getData(self::PAIS);
    }

    /**
     * @param int $id
     * @return FeiranteInterface
     */
    public function setId($id): FeiranteInterface
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @param string $nome
     * @return FeiranteInterface
     */
    public function setNome($nome): FeiranteInterface
    {
        return $this->setData(self::NOME, $nome);
    }

    /**
     * @param string $sobrenome
     * @return FeiranteInterface
     */
    public function setSobrenome($sobrenome): FeiranteInterface
    {
        return $this->setData(self::SOBRENOME, $sobrenome);
    }

    /**
     * @param string $nome_loja
     * @return FeiranteInterface
     */
    public function setNomeLoja($nome_loja): FeiranteInterface
    {
        return $this->setData(self::NOME_LOJA, $nome_loja);
    }


    /**
     * @param string $pais
     * @return FeiranteInterface
     */
    public function setPais($pais): FeiranteInterface
    {
        return $this->setData(self::PAIS, $pais);
    }
}

