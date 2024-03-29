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

class Progressbar extends AbstractWidget{

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
		$this->setTemplate("widget/progress_bar.phtml");
	}

    /**
     * @inheritdoc
     */
	public function _toHtml()
    {
		if(!$this->getDataFilterHelper()->getConfig('general/show')) return;

        $this->assign('widget_heading', $this->getConfig('title'));
		$this->assign('stylecls', $this->getConfig('stylecls'));
		$this->assign('addition_cls', $this->getConfig('addition_cls'));
		$this->assign('prog_type', $this->getConfig('prog_type'));
		$this->assign('success', $this->getConfig('success'));
		$this->assign('info', $this->getConfig('info'));
		$this->assign('warning', $this->getConfig('warning'));
		$this->assign('danger', $this->getConfig('danger'));
		$this->assign('prog_label', $this->getConfig('prog_label'));

		return parent::_toHtml();
	}

}
