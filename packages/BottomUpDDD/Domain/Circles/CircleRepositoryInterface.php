<?php

namespace BottomUpDDD\Domain\Circles;

interface CircleRepositoryInterface
{
    /**
     * @param CircleId $id
     * @return Circle
     */
    public function find(CircleId $id): Circle;

    /**
     * @param Circle $circle
     * @return void
     */
    public function save(Circle $circle): void;
}
