<?php
/*
 * This file is part of ThraceMediaBundle
 *
 * (c) Nikolay Georgiev <symfonist@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Thrace\MediaBundle\Model;

/**
 * Interface that implements multi image
 *
 * @author Nikolay Georgiev <symfonist@gmail.com>
 * @since 1.0
 */
interface MultiImageInterface extends ImageInterface
{
    /**
     * Sets image position
     *
     * @param integer $position
     */
    public function setPosition($position);

    /**
     * Returns position of the image
     *
     * @return integer
     */
    public function getPosition();

}