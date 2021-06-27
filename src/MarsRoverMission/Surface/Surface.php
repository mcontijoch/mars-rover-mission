<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\Surface;

use MContijoch\MarsRoverMission\Position\Position;
use MContijoch\MarsRoverMission\Surface\Exceptions\InvalidMovementException;

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
        $this->obstacles = $obstacles === null ? [] : $this->convertObstacles($obstacles);
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function ensureNextPositionIsValid(Position $position): void
    {
        foreach ($this->obstacles as $obstacle) {
            $isSameXPosition = $position->getX() === $obstacle->getX();
            $isSameYPosition = $position->getY() === $obstacle->getY();

            if ($isSameXPosition && $isSameYPosition) {
                throw new InvalidMovementException(sprintf('There is an obstacle in the road.'));
            }
        }
    }

    private function convertObstacles(array $obstaclesArray): array
    {
        $obstacles = [];

        foreach ($obstaclesArray as $obstacle) {
            $x = $obstacle[0];
            $y = $obstacle[1];

            $obstacles[] = new SurfaceObstacle($x, $y, $this);
        }

        return $obstacles;
    }
}
