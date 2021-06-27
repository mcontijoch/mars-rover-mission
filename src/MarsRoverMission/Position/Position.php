<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\Position;

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

    public function increaseX(): void
    {
        $this->setX($this->x + 1);
    }

    public function decreaseX(): void
    {
        $this->setX($this->x - 1);
    }

    public function increaseY(): void
    {
        $this->setY($this->y + 1);
    }

    public function decreaseY(): void
    {
        $this->setY($this->y - 1);
    }
}
