<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\Surface;

use MContijoch\MarsRoverMission\Position\Position;

final class Surface
{
    const DEFAULT_X = 200;
    const DEFAULT_Y = 200;

    private $x;
    private $y;
    private $obstacles;

    public function __construct(int $x = null, int $y = null, array $obstacles = null)
    {
        $this->x = $x === null ? self::DEFAULT_X : $x;
        $this->y = $y === null ? self::DEFAULT_Y : $y;
        $this->obstacles = $obstacles === null ? [] : $obstacles;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function ensurePositionIsValid(Position $position)
    {
    }
}
