<?php

/*
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 * @author Elcodi Team <tech@elcodi.com>
 */

namespace Elcodi\Component\Cart\Entity\Interfaces;

use Elcodi\Component\Currency\Entity\Interfaces\MoneyInterface;

/**
 * Class PriceInterface
 */
interface PriceInterface
{
    /**
     * Gets the product or products amount with tax
     *
     * @return \Elcodi\Component\Currency\Entity\Interfaces\MoneyInterface Product amount with tax
     */
    public function getProductAmount();

    /**
     * Sets the product or products amount with tax
     *
     * @param \Elcodi\Component\Currency\Entity\Interfaces\MoneyInterface $productAmount product amount with tax
     *
     * @return $this Self object
     */
    public function setProductAmount(MoneyInterface $productAmount);

    /**
     * Gets the total amount with tax
     *
     * @return \Elcodi\Component\Currency\Entity\Interfaces\MoneyInterface price with tax
     */
    public function getAmount();

    /**
     * Sets the total amount with tax
     *
     * @param \Elcodi\Component\Currency\Entity\Interfaces\MoneyInterface $amount amount without tax
     *
     * @return $this Self object
     */
    public function setAmount(MoneyInterface $amount);
}
