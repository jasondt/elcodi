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

namespace Elcodi\Component\Media\Entity\Interfaces;

/**
 * Class PrincipalImageInterface
 */
interface PrincipalImageInterface
{
    /**
     * Set the principalImage
     *
     * @param ImageInterface $principalImage Principal image
     *
     * @return $this Self object
     */
    public function setPrincipalImage(ImageInterface $principalImage = null);

    /**
     * Get the principalImage
     *
     * @return ImageInterface Principal image
     */
    public function getPrincipalImage();
}
