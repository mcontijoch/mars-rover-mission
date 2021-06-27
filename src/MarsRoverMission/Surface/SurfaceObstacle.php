<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\Surface;

final class SurfaceObstacle
{
    private $x;
    private $y;

    public function __construct(int $x, int $y, Surface $surface)
    {
        $this->ensureObstacleIsValid($x, $y, $surface);

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

    public function ensureObstacleIsValid(int $x, int $y, Surface $surface): void
    {
        $positionXIsInSurfaceX = $x <= $surface->getX();
        $positionYIsInSurfaceY = $y <= $surface->getY();

        if (!$positionXIsInSurfaceX) {
            throw new \InvalidArgumentException(sprintf('The obstacle\'s position X value "%s" is invalid.', $x));
        }

        if (!$positionYIsInSurfaceY) {
            throw new \InvalidArgumentException(sprintf('The obstacle\'s position Y value "%s" is invalid.', $y));
        }
    }
}
