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
 * @copyright  Copyright (c) 2015 Venustheme (http://www.venustheme.com/)
 * @license    http://www.venustheme.com/LICENSE-1.0.html
 */
namespace Ves\BaseWidget\Model\Source;

class ListSize implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
      return array(
                  array('value' => "", 'label'=>__('Default')),
                  array('value' => "verysmall", 'label'=>__('Very Small')),
                  array('value' => "small", 'label'=>__('Small')),
                  array('value' => "medium", 'label'=>__('Medium')),
                  array('value' => "big", 'label'=>__('Big')),
                  array('value' => "extramedium", 'label'=>__('Extra Medium')),
                  array('value' => "extrabig", 'label'=>__('Extra Big'))
            );
    }
}
