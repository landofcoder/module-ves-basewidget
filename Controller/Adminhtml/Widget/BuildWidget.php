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
namespace Ves\BaseWidget\Controller\Adminhtml\Widget;

class BuildWidget extends \Magento\Widget\Controller\Adminhtml\Widget\BuildWidget
{
	/**
     * Format widget pseudo-code for inserting into wysiwyg editor
     *
     * @return void
     */
	public function execute()
	{
		$type = $this->getRequest()->getPost('widget_type');
		$params = $this->getRequest()->getPost('parameters', []);

		$field_pattern = ["pretext","pretext_html","shortcode","html","box_text","raw_html","content","tabs","latestmod_desc","custom_css","block_params","link","href","url"];
		$widget_types = ["Ves\BaseWidget\Block\Widget\Accordionbg"];

		foreach ($params as $k => $v) {
			if(0 < strpos($k, 'class') || 0 < strpos($k, 'Class') || $k == "contentclass") {
				continue;
			}
			if(is_array($params[$k]) || !$this->isBase64Encoded($params[$k])) {
				if(in_array($k, $field_pattern) || preg_match("/^link(.*)/", $k) || preg_match("/^href(.*)/", $k) || preg_match("/^tabs(.*)/", $k) || preg_match("/^html_(.*)/", $k) ||preg_match("/^content_(.*)/", $k) || (preg_match("/^header_(.*)/", $k) && in_array($type, $widget_types))) {
					if(is_array($params[$k])){
						$params[$k] = base64_encode(serialize($params[$k]));
					}elseif(!$this->isBase64Encoded($params[$k])){
						$params[$k] = base64_encode($params[$k]);
					}
				}
			}

		}
		$asIs = $this->getRequest()->getPost('as_is');
		$html = $this->_widget->getWidgetDeclaration($type, $params, $asIs);
		$this->getResponse()->setBody($html);
	}

    /**
     * is based 64 encoded
     *
     * @param string|array|mixed $data
     * @return bool
     */
	public function isBase64Encoded($data)
    {
        if(base64_encode($data) === $data) return false;
        if(base64_encode(base64_decode($data)) === $data){
            return true;
        }
        if (!preg_match('~[^0-9a-zA-Z+/=]~', $data)) {
            $check = str_split(base64_decode($data));
            $x = 0;
            foreach ($check as $char) if (ord($char) > 126) $x++;
            if (count($check) > 0 && $x/count($check)*100 < 30) return true;
        }
        $decoded = base64_decode($data);
        // Check if there are valid base64 characters
        if (!preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $data)) return false;
        // if string returned contains not printable chars
        if (0 < preg_match('/((?![[:graph:]])(?!\s)(?!\p{L}))./', $decoded, $matched)) return false;
        if (!preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $data)) return false;

        return false;
    }
}
