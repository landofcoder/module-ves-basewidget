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
namespace Ves\BaseWidget\Model\Source;

class AltImageColumn implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var \Magento\Cms\Model\Block
     */
	protected  $_groupModel;

    /**
     * @param \Magento\Cms\Model\Block $blockModel
     */
    public function __construct(
    	\Magento\Cms\Model\Block $blockModel
    ) {
    	$this->_groupModel = $blockModel;
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $blocks = [];
        $blocks[] = [
        'value' => 'label',
        'label' => 'Label'];
        $blocks[] = [
        'value' => 'position',
        'label' => 'Sort Order'];
        return $blocks;
    }
}
