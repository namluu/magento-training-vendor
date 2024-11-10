<?php
namespace Training\VendorList\Controller\Vendor;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Training\Vendor\Model\VendorFactory;
use Magento\Framework\Controller\Result\ForwardFactory;

class View extends \Magento\Framework\App\Action\Action
{
    public function __construct
    (
        Context $context,
        private PageFactory $pageFactory,
        private VendorFactory $vendorFactory,
        private ForwardFactory $forwardFactory
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        $vendorId = $this->getRequest()->getParam('vendor_id');
        $vendor = $this->vendorFactory->create()->load($vendorId);
        if (!$vendor->getId()) {
            return $this->forwardFactory->create()->forward('noroute');
        }

        $resultPage = $this->pageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__($vendor->getName()));
        $block = $resultPage->getLayout()->getBlock('vendor.view');
        $block->setData('vendor', $vendor);

        return $resultPage;
    }
}
