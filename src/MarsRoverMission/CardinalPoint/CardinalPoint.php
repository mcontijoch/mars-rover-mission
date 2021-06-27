<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\CardinalPoint;

use MContijoch\MarsRoverMission\CardinalPoint\ValueObjects\Point;
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


    public static function getCardinalPointByInitialLetter(string $pointString)
    {
        switch ($pointString) {
            case Point::NORTH:
                return new North();
                break;
            case Point::SOUTH:
                return new South();
                break;
            case Point::EAST:
                return new East();
                break;
            case Point::WEST:
                return new West();
                break;
        }
    }
}
