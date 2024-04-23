<?php

namespace Assist\Model;

use Assist\Helpers\ResponseHelper;

class ChequeItem
{
    private string $id;
    private string $product;
    private string $name;
    private int $price;
    private int $amount;
    private int $quantity;
    private string $tax;
    private string $eancode;
    private string $uncode;
    private string $gs1code;
    private string $furcode;
    private string $egaiscode;
    private string $hscode;
    private int $subjtype;

    public function __construct(array $data)
    {
        $this->id = $data[ResponseHelper::CHEQUE_ITEM_ID];
        $this->product = $data[ResponseHelper::PRODUCT];
        $this->name = $data[ResponseHelper::NAME];
        $this->price = $data[ResponseHelper::PRICE];
        $this->amount = $data[ResponseHelper::AMOUNT];
        $this->quantity = $data[ResponseHelper::QUANTITY];
        $this->tax = $data[ResponseHelper::TAX];
        $this->eancode = $data[ResponseHelper::EAN_CODE];
        $this->uncode = $data[ResponseHelper::UN_CODE];
        $this->gs1code = $data[ResponseHelper::GS1_CODE];
        $this->furcode = $data[ResponseHelper::FUR_CODE];
        $this->egaiscode = $data[ResponseHelper::EGAIS_CODE];
        $this->hscode = $data[ResponseHelper::HS_CODE];
        $this->subjtype = $data[ResponseHelper::SUBJ_TYPE];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getProduct(): string
    {
        return $this->product;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getTax(): string
    {
        return $this->tax;
    }

    /**
     * @return string
     */
    public function getEancode(): string
    {
        return $this->eancode;
    }

    /**
     * @return string
     */
    public function getUncode(): string
    {
        return $this->uncode;
    }

    /**
     * @return string
     */
    public function getGs1code(): string
    {
        return $this->gs1code;
    }

    /**
     * @return string
     */
    public function getFurcode(): string
    {
        return $this->furcode;
    }

    /**
     * @return string
     */
    public function getEgaiscode(): string
    {
        return $this->egaiscode;
    }

    /**
     * @return string
     */
    public function getHscode(): string
    {
        return $this->hscode;
    }

    /**
     * @return int
     */
    public function getSubjtype(): int
    {
        return $this->subjtype;
    }
}
