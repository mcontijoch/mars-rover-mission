<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\Position;

use MContijoch\MarsRoverMission\CardinalPoint\CardinalPoint;
use MContijoch\MarsRoverMission\Command\Command;

final class Position
{
    public $x;
    public $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setX(int $value): void
    {
        $this->x = $value;
    }

    public function setY(int $value): void
    {
        $this->y = $value;
    }

    public function move(Command $command, CardinalPoint $cardinalPoint)
    {
        return $command->move($this, $cardinalPoint);
    }

    public function increaseX()
    {
        $this->setX($this->x + 1);
    }

    public function decreaseX()
    {
        $this->setX($this->x - 1);
    }

    public function increaseY()
    {
        $this->setY($this->y + 1);
    }

    public function decreaseY()
    {
        $this->setY($this->y - 1);
    }

    public function moveForward(CardinalPoint $cardinalPoint): Position
    {
        return $cardinalPoint->moveForward($this->position);
    }

    public function moveRight(CardinalPoint $cardinalPoint): Position
    {
        return $cardinalPoint->moveRight($this->position);
    }

    public function moveLeft(CardinalPoint $cardinalPoint): Position
    {
        return $cardinalPoint->moveLeft($this->position);
    }
}
