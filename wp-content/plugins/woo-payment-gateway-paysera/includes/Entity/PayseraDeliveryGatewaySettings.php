<?php

declare(strict_types=1);

namespace Paysera\Includes\Entity;

defined('ABSPATH') or exit;

class PayseraDeliveryGatewaySettings
{
    /**
     * @var float
     */
    public $minimumWeight;

    /**
     * @var float
     */
    public $maximumWeight;

    /**
     * @var string
     */
    public $senderType;

    /**
     * @var string
     */
    public $receiverType;

    public function getMinimumWeight(): float
    {
        return $this->minimumWeight;
    }

    public function setMinimumWeight(float $minimumWeight): self
    {
        $this->minimumWeight = $minimumWeight;

        return $this;
    }

    public function getMaximumWeight(): float
    {
        return $this->maximumWeight;
    }

    public function setMaximumWeight(float $maximumWeight): self
    {
        $this->maximumWeight = $maximumWeight;

        return $this;
    }

    public function getSenderType(): ?string
    {
        return $this->senderType;
    }

    public function setSenderType(string $senderType): self
    {
        $this->senderType = $senderType;

        return $this;
    }

    public function getReceiverType(): ?string
    {
        return $this->receiverType;
    }

    public function setReceiverType(string $receiverType): self
    {
        $this->receiverType = $receiverType;

        return $this;
    }
}
