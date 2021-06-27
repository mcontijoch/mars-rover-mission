<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\Surface;

use MContijoch\MarsRoverMission\Surface\ValueObjects\SurfaceX;
use MContijoch\MarsRoverMission\Surface\ValueObjects\SurfaceY;

final class Surface
{
    const DEFAULT_X = 200;
    const DEFAULT_Y = 200;

    protected $x;
    protected $y;

    public function __construct(int $x = null, int $y = null)
    {
        $this->x = $x === null ? self::DEFAULT_X : $x;
        $this->y = $y === null ? self::DEFAULT_Y : $y;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }
}
