<?php

declare(strict_types=1);

namespace Paysera\Includes\Entity;

defined('ABSPATH') or exit;

class PayseraPaymentPluginSettings
{
    /**
     * @var ?int
     */
    public $projectId;

    /**
     * @var ?string
     */
    public $projectPassword;

    /**
     * @var ?bool
     */
    public $testModeEnabled;

    /**
     * @var ?string
     */
    public $title;

    /**
     * @var ?string
     */
    public $description;

    /**
     * @var ?bool
     */
    public $listOfPaymentsEnabled;

    /**
     * @var array
     */
    public $specificCountries;

    /**
     * @var ?bool
     */
    public $gridViewEnabled;

    /**
     * @var ?bool
     */
    public $buyerConsentEnabled;

    /**
     * @var ?string
     */
    public $newOrderStatus;

    /**
     * @var ?string
     */
    public $paidOrderStatus;

    /**
     * @var ?string
     */
    public $pendingCheckoutStatus;

    /**
     * @var ?bool
     */
    public $ownershipCodeEnabled;

    /**
     * @var ?string
     */
    public $ownershipCode;

    /**
     * @var ?bool
     */
    public $qualitySignEnabled;

    public function __construct()
    {
        $this->projectId = null;
        $this->projectPassword = null;
        $this->testModeEnabled = null;
        $this->title = null;
        $this->description = null;
        $this->listOfPaymentsEnabled = null;
        $this->specificCountries = [];
        $this->gridViewEnabled = null;
        $this->buyerConsentEnabled = null;
        $this->newOrderStatus = null;
        $this->paidOrderStatus = null;
        $this->pendingCheckoutStatus = null;
        $this->ownershipCodeEnabled = null;
        $this->ownershipCode = null;
        $this->qualitySignEnabled = null;
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function isListOfPaymentsEnabled(): ?bool
    {
        return $this->listOfPaymentsEnabled;
    }

    public function setListOfPaymentsEnabled(?bool $listOfPaymentsEnabled): self
    {
        $this->listOfPaymentsEnabled = $listOfPaymentsEnabled;

        return $this;
    }

    public function getSpecificCountries(): array
    {
        return $this->specificCountries;
    }

    public function setSpecificCountries(array $specificCountries): self
    {
        $this->specificCountries = $specificCountries;

        return $this;
    }

    public function isGridViewEnabled(): ?bool
    {
        return $this->gridViewEnabled;
    }

    public function setGridViewEnabled(?bool $gridViewEnabled): self
    {
        $this->gridViewEnabled = $gridViewEnabled;

        return $this;
    }

    public function isBuyerConsentEnabled(): ?bool
    {
        return $this->buyerConsentEnabled;
    }

    public function setBuyerConsentEnabled(?bool $buyerConsentEnabled): self
    {
        $this->buyerConsentEnabled = $buyerConsentEnabled;

        return $this;
    }

    public function getNewOrderStatus(): ?string
    {
        return $this->newOrderStatus;
    }

    public function setNewOrderStatus(?string $newOrderStatus): self
    {
        $this->newOrderStatus = $newOrderStatus;

        return $this;
    }

    public function getPaidOrderStatus(): ?string
    {
        return $this->paidOrderStatus;
    }

    public function setPaidOrderStatus(?string $paidOrderStatus): self
    {
        $this->paidOrderStatus = $paidOrderStatus;

        return $this;
    }

    public function getPendingCheckoutStatus(): ?string
    {
        return $this->pendingCheckoutStatus;
    }

    public function setPendingCheckoutStatus(?string $pendingCheckoutStatus): self
    {
        $this->pendingCheckoutStatus = $pendingCheckoutStatus;

        return $this;
    }

    public function isOwnershipCodeEnabled(): ?bool
    {
        return $this->ownershipCodeEnabled;
    }

    public function setOwnershipCodeEnabled(?bool $ownershipCodeEnabled): self
    {
        $this->ownershipCodeEnabled = $ownershipCodeEnabled;

        return $this;
    }

    public function getOwnershipCode(): ?string
    {
        return $this->ownershipCode;
    }

    public function setOwnershipCode(?string $ownershipCode): self
    {
        $this->ownershipCode = $ownershipCode;

        return $this;
    }

    public function isQualitySignEnabled(): ?bool
    {
        return $this->qualitySignEnabled;
    }

    public function setQualitySignEnabled(?bool $qualitySignEnabled): self
    {
        $this->qualitySignEnabled = $qualitySignEnabled;

        return $this;
    }
}
