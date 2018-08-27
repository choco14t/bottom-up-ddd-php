<?php

namespace BottomUpDDD\Domain;

interface EquatableInterface
{
    public function equals(EquatableInterface $obj): bool;
}
