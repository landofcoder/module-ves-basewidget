<?php
/**
 * Venustheme
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Venustheme.com license that is
 * available through the world-wide-web at this URL:
 * http://www.venustheme.com/license-agreement.html
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category   Venustheme
 * @package    Ves_BaseWidget
 * @copyright  Copyright (c) 2014 Venustheme (http://www.venustheme.com/)
 * @license    http://www.venustheme.com/LICENSE-1.0.html
 */
namespace Ves\BaseWidget\Block\Widget;
use Ves\BaseWidget\Block\AbstractWidget;

class Googleplus extends AbstractWidget{

	protected $_blockModel;
	protected $_dataFilterHelper;
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Magento\Cms\Model\Block $blockModel,
		\Ves\BaseWidget\Helper\Data $dataHelper,
		array $data = []
	) {
		parent::__construct($context, $blockModel, $dataHelper, $data);
		$this->_blockModel = $blockModel;
		$this->_dataFilterHelper = $dataHelper;
		$this->setTemplate("widget/google-plus.phtml");
	}

    /**
     * @inheritdoc
     */
	public function _toHtml()
    {
		if(!$this->getDataFilterHelper()->getConfig('general/show')) return;

		$url = $this->getConfig('google_url');
		$url = @str_replace(" ","+", $url);
		$this->assign('url', $url);
		$this->assign('title',$this->getConfig('title'));
		$this->assign('layout',$this->getConfig('layout'));
		$this->assign('theme',$this->getConfig('theme'));
		$this->assign('width',$this->getConfig('width'));
		$this->assign('tagline',$this->getConfig('enable_tagline'));
		$this->assign('coverphoto',$this->getConfig('enable_coverphoto'));
		$this->assign('badge',$this->getConfig('badge_types'));
		return parent::_toHtml();
	}

}
