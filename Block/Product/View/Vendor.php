<?php
namespace Training\Vendor\Block\Product\View;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Helper\Data;
use Magento\Catalog\Model\Product;

class Vendor extends Template
{
    public function __construct(
        private Data $catalogHelper,
        Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getProduct(): ?Product
    {
        return $this->catalogHelper->getProduct();
    }
}
