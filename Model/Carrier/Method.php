<?php
/**
 * MageVision Free Shipping Admin Extension
 *
 * @category     MageVision
 * @package      MageVision_FreeShippingAdmin
 * @author       MageVision Team
 * @copyright    Copyright (c) 2016 MageVision (http://www.magevision.com)
 * @license      http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace MageVision\FreeShippingAdmin\Model\Carrier;

use Magento\Quote\Model\Quote\Address\RateRequest;

class Method extends \Magento\Shipping\Model\Carrier\AbstractCarrier implements
    \Magento\Shipping\Model\Carrier\CarrierInterface
{
    /**
     * @var string
     */
    protected $_code = 'freeshippingadmin';

    /**
     * @var bool
     */
    protected $_isFixed = true;

    /**
     * @var \Magento\Shipping\Model\Rate\ResultFactory
     */
    protected $rateResultFactory;

    /**
     * @var \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory
     */
    protected $rateMethodFactory;

    /**
     * @var \Magento\Framework\App\State
     */
    protected $appState;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory
     * @param \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory,
        \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory,
        \Magento\Framework\App\State $appState,
        array $data = []
    ) {
        $this->rateResultFactory = $rateResultFactory;
        $this->rateMethodFactory = $rateMethodFactory;
        $this->appState = $appState;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }

    /**
     * Checks if user is logged in as admin
     *
     * @return bool
     */
    protected function isAdmin()
    {
        if ($this->appState->getAreaCode() === \Magento\Backend\App\Area\FrontNameResolver::AREA_CODE) {
            return true;
        }
        return false;
    }

    /**
     * FreeShipping Rates Collector
     *
     * @param RateRequest $request
     * @return \Magento\Shipping\Model\Rate\Result|bool
     */
    public function collectRates(RateRequest $request)
    {
        if (!$this->getConfigFlag('active') || !$this->isAdmin()) {
            return false;
        }

        /** @var \Magento\Shipping\Model\Rate\Result $result */
        $result = $this->rateResultFactory->create();

        /** @var \Magento\Quote\Model\Quote\Address\RateResult\Method $method */
        $method = $this->rateMethodFactory->create();

        $method->setCarrier('freeshippingadmin');
        $method->setCarrierTitle($this->getConfigData('title'));

        $method->setMethod('freeshippingadmin');
        $method->setMethodTitle($this->getConfigData('name'));

        $method->setPrice('0.00');
        $method->setCost('0.00');

        $result->append($method);

        return $result;
    }

    /**
     * @return array
     */
    public function getAllowedMethods()
    {
        return ['freeshippingadmin' => $this->getConfigData('name')];
    }
}
