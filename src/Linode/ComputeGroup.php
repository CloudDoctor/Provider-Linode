<?php

namespace CloudDoctor\Linode;

use CloudDoctor\Interfaces\ComputeGroupInterface;

class ComputeGroup extends \CloudDoctor\Common\ComputeGroup implements ComputeGroupInterface
{
    /**
     * Return the number of running, active instances on the upstream provider.
     * @return int
     */
    public function countComputes() : int
    {
        $count = 0;
        $instancesList = $this->getRequest()->getJson("/linode/instances");
        foreach($instancesList->data as $potentialInstance){
            if(in_array($this->getComputeGroupTag(), $potentialInstance->tags)){
                $count++;
            }
        }
        return $count;
    }
}