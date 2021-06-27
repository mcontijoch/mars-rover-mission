<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\CardinalPoint;

use MContijoch\MarsRoverMission\Position\Position;

abstract class CardinalPoint
{
    protected $cardinalPoint;

    public function value(): string
    {
        return $this->cardinalPoint;
    }

    abstract public function moveForward(Position $position): Position;

    abstract public function moveRight(Position $position): Position;

    abstract public function moveLeft(Position $position): Position;
}
