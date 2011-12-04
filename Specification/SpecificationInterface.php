<?php

interface SpecificationInterface
{
    public function isSatisfiedBy(NetworkProvider $provider);
}


