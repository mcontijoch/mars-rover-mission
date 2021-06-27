<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\CardinalPoint;

use MContijoch\MarsRoverMission\CardinalPoint\ValueObjects\Point;
use MContijoch\MarsRoverMission\Position\Position;

class South extends CardinalPoint
{
    public function __construct()
    {
        $this->cardinalPoint = Point::SOUTH;
    }

    public function moveForward(Position $position): Position
    {
        $newPosition = $this->createNewPosition($position);

        $newPosition->decreaseX();

        return $newPosition;
    }

    public function moveRight(Position $position): Position
    {
        $newPosition = $this->createNewPosition($position);

        $newPosition->decreaseY();

        return $newPosition;
    }

    public function moveLeft(Position $position): Position
    {
        $newPosition = $this->createNewPosition($position);

        $newPosition->increaseY();

        return $newPosition;
    }
}
