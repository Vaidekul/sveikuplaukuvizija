<?php

declare(strict_types=1);

namespace Paysera\Includes\Entity;

defined('ABSPATH') or exit;

class PayseraDeliveryPluginSettings
{
    /**
     * @var ?int
     */
    public $projectId;

    /**
     * @var ?string
     */
    public $resolvedProjectId;

    /**
     * @var ?string
     */
    public $projectPassword;

    /**
     * @var ?bool
     */
    public $testModeEnabled;

    /**
     * @var ?bool
     */
    public $houseNumberFieldEnabled;

    /**
     * @var array
     */
    public $deliveryGateways;

    /**
     * @var array
     */
    public $deliveryGatewayTitles;

    /**
     * @var array
     */
    public $shipmentMethods;

    public function __construct()
    {
        $this->projectId = null;
        $this->resolvedProjectId = null;
        $this->projectPassword = null;
        $this->testModeEnabled = null;
        $this->houseNumberFieldEnabled = null;
        $this->deliveryGateways = [];
        $this->deliveryGatewayTitles = [];
        $this->shipmentMethods = [];
    }

    public function getProjectId(): ?int
    {
        return $this->projectId;
    }

    public function setProjectId(int $projectId): self
    {
        $this->projectId = $projectId;

        return $this;
    }

    public function getResolvedProjectId(): ?string
    {
        return $this->resolvedProjectId;
    }

    public function setResolvedProjectId(string $resolvedProjectId): self
    {
        $this->resolvedProjectId = $resolvedProjectId;

        return $this;
    }

    public function getProjectPassword(): ?string
    {
        return $this->projectPassword;
    }

    public function setProjectPassword(string $projectPassword): self
    {
        $this->projectPassword = $projectPassword;

        return $this;
    }

    public function isTestModeEnabled(): ?bool
    {
        return $this->testModeEnabled;
    }

    public function setTestModeEnabled(bool $testModeEnabled): self
    {
        $this->testModeEnabled = $testModeEnabled;

        return $this;
    }

    public function isHouseNumberFieldEnabled(): ?bool
    {
        return $this->houseNumberFieldEnabled;
    }

    public function setHouseNumberFieldEnabled(bool $houseNumberFieldEnabled): self
    {
        $this->houseNumberFieldEnabled = $houseNumberFieldEnabled;

        return $this;
    }

    public function getDeliveryGateways(): array
    {
        return $this->deliveryGateways;
    }

    public function setDeliveryGateways(array $deliveryGateways): self
    {
        $this->deliveryGateways = $deliveryGateways;

        return $this;
    }

    public function getDeliveryGatewayTitles(): array
    {
        return $this->deliveryGatewayTitles;
    }

    public function setDeliveryGatewayTitles(array $deliveryGatewayTitles): self
    {
        $this->deliveryGatewayTitles = $deliveryGatewayTitles;

        return $this;
    }

    public function getShipmentMethods(): array
    {
        return $this->shipmentMethods;
    }

    public function setShipmentMethods(array $shipmentMethods): self
    {
        $this->shipmentMethods = $shipmentMethods;

        return $this;
    }
}
