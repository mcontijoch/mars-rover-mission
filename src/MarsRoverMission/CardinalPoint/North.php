<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\CardinalPoint;

use MContijoch\MarsRoverMission\CardinalPoint\ValueObjects\Point;
use MContijoch\MarsRoverMission\Position\Position;

class North extends CardinalPoint
{
    public function __construct()
    {
        $this->cardinalPoint = Point::NORTH;
    }

    public function moveForward(Position $position): Position
    {
        // $position->increaseX();

        // return $position;


        $newPosition = new Position(
            $position->getX(),
            $position->getY(),
        );

        $newPosition->increaseX();

        return $newPosition;
    }

    public function moveRight(Position $position): Position
    {
        $newPosition = new Position(
            $position->getX(),
            $position->getY(),
        );

        $newPosition->increaseY();

        return $newPosition;
    }

    public function moveLeft(Position $position): Position
    {
        $newPosition = new Position(
            $position->getX(),
            $position->getY(),
        );

        $newPosition->decreaseY();

        return $newPosition;
    }
}
