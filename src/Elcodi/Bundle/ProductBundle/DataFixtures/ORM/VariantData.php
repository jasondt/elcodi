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

namespace Elcodi\Bundle\ProductBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Elcodi\Bundle\CoreBundle\DataFixtures\ORM\Abstracts\AbstractFixture;
use Elcodi\Component\Attribute\Entity\Interfaces\ValueInterface;
use Elcodi\Component\Currency\Entity\Interfaces\CurrencyInterface;
use Elcodi\Component\Currency\Entity\Money;
use Elcodi\Component\Product\Entity\Interfaces\ProductInterface;
use Elcodi\Component\Product\Factory\VariantFactory;

class VariantData extends AbstractFixture implements DependentFixtureInterface
{
    /**
     * Loads sample fixtures for product Variant entities
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /**
         * @var ProductInterface  $productWithVariants
         * @var CurrencyInterface $currency
         * @var VariantFactory    $variantFactory
         */
        $currency = $this->getReference('currency-dollar');
        $productWithVariants = $this->getReference('product-with-variants');
        $variantFactory = $this->getFactory('product_variant');
        $variantObjectManager = $this->getObjectManager('product_variant');

        /**
         * @var $optionWhite ValueInterface
         * @var $optionRed   ValueInterface
         * @var $optionSmall ValueInterface
         * @var $optionLarge ValueInterface
         */
        $optionWhite = $this->getReference('value-color-white');
        $optionRed = $this->getReference('value-color-red');
        $optionSmall = $this->getReference('value-size-small');
        $optionLarge = $this->getReference('value-size-large');

        /**
         * Variant White-Small
         */
        $variantWhiteSmall = $variantFactory
            ->create()
            ->setSku('variant-white-small-sku')
            ->setStock(100)
            ->setProduct($productWithVariants)
            ->addOption($optionWhite)
            ->addOption($optionSmall)
            ->setPrice(Money::create(1500, $currency))
            ->setHeight(13)
            ->setWidth(12)
            ->setDepth(19)
            ->setWeight(125)
            ->setEnabled(true);

        $productWithVariants->setPrincipalVariant($variantWhiteSmall);

        $variantObjectManager->persist($variantWhiteSmall);
        $this->addReference('variant-white-small', $productWithVariants);

        /**
         * Variant White-Large
         */
        $variantWhiteLarge = $variantFactory
            ->create()
            ->setSku('variant-white-large-sku')
            ->setStock(100)
            ->setProduct($productWithVariants)
            ->addOption($optionWhite)
            ->addOption($optionLarge)
            ->setPrice(Money::create(1800, $currency))
            ->setHeight(12)
            ->setWidth(11)
            ->setDepth(45)
            ->setWeight(155)
            ->setEnabled(true);

        $variantObjectManager->persist($variantWhiteLarge);
        $this->addReference('variant-white-large', $productWithVariants);

        /**
         * Variant Red-Small
         */
        $variantRedSmall = $variantFactory
            ->create()
            ->setSku('variant-red-small-sku')
            ->setStock(100)
            ->setProduct($productWithVariants)
            ->addOption($optionRed)
            ->addOption($optionSmall)
            ->setPrice(Money::create(1500, $currency))
            ->setHeight(19)
            ->setWidth(9)
            ->setDepth(33)
            ->setWeight(1000)
            ->setEnabled(true);

        $variantObjectManager->persist($variantRedSmall);
        $this->addReference('variant-red-small', $productWithVariants);

        /**
         * Variant Red-Large
         */
        $variantRedLarge = $variantFactory
            ->create()
            ->setSku('variant-red-large-sku')
            ->setStock(100)
            ->setProduct($productWithVariants)
            ->addOption($optionRed)
            ->addOption($optionLarge)
            ->setPrice(Money::create(1800, $currency))
            ->setHeight(50)
            ->setWidth(30)
            ->setDepth(18)
            ->setWeight(70)
            ->setEnabled(true);

        $variantObjectManager->persist($variantRedLarge);
        $this->addReference('variant-red-large', $productWithVariants);

        $variantObjectManager->flush([
            $variantWhiteSmall,
            $variantWhiteLarge,
            $variantRedSmall,
            $variantRedLarge,
        ]);
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'Elcodi\Bundle\AttributeBundle\DataFixtures\ORM\AttributeData',
            'Elcodi\Bundle\CurrencyBundle\DataFixtures\ORM\CurrencyData',
            'Elcodi\Bundle\ProductBundle\DataFixtures\ORM\ProductData',
        ];
    }
}
