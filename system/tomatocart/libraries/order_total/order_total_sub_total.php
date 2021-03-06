<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * TomatoCart Open Source Shopping Cart Solution
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License v3 (2007)
 * as published by the Free Software Foundation.
 *
 * @package		TomatoCart
 * @author		TomatoCart Dev Team
 * @copyright	Copyright (c) 2009 - 2012, TomatoCart. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl.html
 * @link		http://tomatocart.com
 * @since		Version 2.0
 * @filesource
 */

// ------------------------------------------------------------------------

require_once 'order_total_module.php';

/**
 * Free Shipping -- Shipping Module Class
 *
 * @package		TomatoCart
 * @subpackage	tomatocart
 * @category	template-module-controller
 * @author		TomatoCart Dev Team
 * @link		http://tomatocart.com/wiki/
 */
class TOC_Order_Total_sub_total extends TOC_Order_Total_Module 
{
    /**
     * order total module code
     *
     * @access protected
     * @var string
     */
    var $code = 'sub_total';
        
    /**
     * Template Module Params
     *
     * @access private
     * @var array
     */
    var $params = array(
        array('name' => 'MODULE_ORDER_TOTAL_SUBTOTAL_STATUS',
                        'title' => 'Display Sub-Total', 
                        'type' => 'combobox',
                        'mode' => 'local',
                        'value' => 'true',
                        'description' => 'Do you want to display the order sub-total cost?',
                        'values' => array(
                            array('id' => 'true', 'text' => 'True'),
                            array('id' => 'false', 'text' => 'False'))),
        array('name' => 'MODULE_ORDER_TOTAL_SUBTOTAL_SORT_ORDER',
                        'title' => 'Sort Order', 
                        'type' => 'numberfield',
                        'value' => '10',
                        'description' => 'Sort order of display.'));

    /**
     * Constructor
     *
     * @access public
     * @return void
     */
    function __construct() 
    {
        parent::__construct();

        $this->title = lang('order_total_subtotal_title');
        $this->description = lang('order_total_subtotal_description');
        $this->status = (isset($this->config['MODULE_ORDER_TOTAL_SUBTOTAL_STATUS']) && ($this->config['MODULE_ORDER_TOTAL_SUBTOTAL_STATUS'] == 'true') ? TRUE : FALSE);
        $this->sort_order = (isset($this->config['MODULE_ORDER_TOTAL_SUBTOTAL_SORT_ORDER']) ? $this->config['MODULE_ORDER_TOTAL_SUBTOTAL_SORT_ORDER'] : NULL);
    }

    /**
     * Process the total
     * 
     * @access public
     * @return array
     */
    function process() 
    {
        $this->output = array();
        
        $this->output[] = array('title' => $this->title . ':',
                                'text' => $this->ci->currencies->format($this->ci->shopping_cart->get_sub_total()),
                                'value' => $this->ci->shopping_cart->get_sub_total());
    }
}

/* End of file order_total_sub_total.php */
/* Location: ./system/tomatocart/libraries/order_total/order_total_sub_total.php */