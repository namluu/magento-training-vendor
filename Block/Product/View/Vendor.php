<?php
namespace Training\Vendor\Block\Product\View;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Helper\Data;
use Magento\Catalog\Model\Product;
use Training\Vendor\Model\ResourceModel\Vendor\CollectionFactory;

class Vendor extends Template
{
    public function __construct(
        private Data $catalogHelper,
        private CollectionFactory $collectionFactory,
        Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getCollection()
    {
        return $this->collectionFactory->create()->setProductFilter($this->getProduct());
    }

    public function getProduct(): ?Product
    {
        return $this->catalogHelper->getProduct();
    }
}
