<?php

namespace BrunaVasconcelos\MyModule\Api\Data;

interface FeiranteInterface
{
    const ID                = 'id';
    const NOME              = 'nome';
    const SOBRENOME         = 'sobrenome';
    const NOME_LOJA         = 'nome_loja';
    const PAIS              = 'pais';

    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return string|null
     */
    public function getNome(): ?string;

    /**
     * @return string|null
     */
    public function getSobrenome(): ?string;

    /**
     * @return string|null
     */
    public function getNomeLoja(): ?string;

    /**
     * @return string|null
     */
    public function getPais(): ?string;

    /**
     * @param int $id
     * @return FeiranteInterface
     */
    public function setId($id): FeiranteInterface;

    /**
     * @param string $nome
     * @return FeiranteInterface
     */
    public function setNome($nome): FeiranteInterface;

    /**
     * @param string $sobrenome
     * @return FeiranteInterface
     */
    public function setSobrenome($sobrenome): FeiranteInterface;

    /**
     * @param string $nome_loja
     * @return FeiranteInterface
     */
    public function setNomeLoja($nome_loja): FeiranteInterface;

    /**
     * @param string $pais
     * @return FeiranteInterface
     */
    public function setPais($pais): FeiranteInterface;
}