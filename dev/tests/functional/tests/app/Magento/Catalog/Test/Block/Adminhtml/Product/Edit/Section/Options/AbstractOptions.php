<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Catalog\Test\Block\Adminhtml\Product\Edit\Section\Options;

use Magento\Mtf\Client\Element\SimpleElement;
use Magento\Ui\Test\Block\Adminhtml\Section;

/**
 * Parent class for all forms of product options.
 */
abstract class AbstractOptions extends Section
{
    /**
     * Fills in the form of an array of input data
     *
     * @param array $fields
     * @param SimpleElement $element
     * @return $this
     */
    public function fillOptions(array $fields, SimpleElement $element = null)
    {
        if (isset($fields['action_type'])) {
            unset($fields['action_type']);
        }

        $element = $element === null ? $this->_rootElement : $element;
        $mapping = $this->dataMapping($fields);
        $this->_fill($mapping, $element);

        return $this;
    }

    /**
     * Getting options data form on the product form
     *
     * @param array $fields
     * @param SimpleElement $element
     * @return $this
     */
    public function getDataOptions(array $fields = null, SimpleElement $element = null)
    {
        $element = $element === null ? $this->_rootElement : $element;
        $mapping = $this->dataMapping($fields);

        return $this->_getData($mapping, $element);
    }
}
