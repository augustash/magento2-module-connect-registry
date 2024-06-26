<?php

/**
 * Connect Integration Suite - Registry
 *
 * A replacement for deprecated core registry functionality for category, customer, product, sales objects.
 *
 * @author Peter McWilliams <pmcwilliams@augustash.com>
 * @license MIT
 */

declare(strict_types=1);

namespace Augustash\ConnectRegistry\Registry;

use Augustash\ConnectRegistry\Api\CategoryRegistryInterface;
use Magento\Catalog\Api\Data\CategoryInterface;

class CurrentCategory implements CategoryRegistryInterface
{
    /**
     * Current category object.
     */
    private ?CategoryInterface $currentCategory = null;

    /**
     * Get the current category object.
     *
     * @return \Magento\Catalog\Api\Data\CategoryInterface|null
     */
    public function getCurrentCategory(): ?CategoryInterface
    {
        return $this->currentCategory;
    }

    /**
     * Set the current category object.
     *
     * @param \Magento\Catalog\Api\Data\CategoryInterface $currentCategory
     * @return self
     */
    public function setCurrentCategory(CategoryInterface $currentCategory): self
    {
        $this->currentCategory = $currentCategory;
        return $this;
    }
}
