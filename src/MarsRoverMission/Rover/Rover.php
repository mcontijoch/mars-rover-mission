<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\Rover;

use MContijoch\MarsRoverMission\Command\CommandCollection;
use MContijoch\MarsRoverMission\CardinalPoint\CardinalPoint;
use MContijoch\MarsRoverMission\Position\Position;
use MContijoch\MarsRoverMission\Surface\Surface;

final class Rover
{
    public $position;
    public $surface;
    public $cardinalPoint;

    public function __construct(Position $position, Surface $surface, CardinalPoint $cardinalPoint)
    {
        $this->ensurePositionIsInSurface($position, $surface);

        $this->position = $position;
        $this->surface = $surface;
        $this->cardinalPoint = $cardinalPoint;
    }

    public function ensurePositionIsInSurface(Position $position, Surface $surface): void
    {
        $positionXIsInSurfaceX = $position->getX() <= $surface->getX();
        $positionYIsInSurfaceY = $position->getY() <= $surface->getY();

        if (!$positionXIsInSurfaceX) {
            throw new \InvalidArgumentException(sprintf('The position X value "%s" is invalid.', $position->getX()));
        }

        if (!$positionYIsInSurfaceY) {
            throw new \InvalidArgumentException(sprintf('The position Y value "%s" is invalid.', $position->getX()));
        }
    }

    public function move(string $commands): void
    {
        $commandCollection = new CommandCollection($commands);

        foreach ($commandCollection->commands as $command) {
            $newPosition = $command->move($this->position, $this->cardinalPoint);

            // Check if surface has an obstacle

            $this->setPosition($newPosition);
        }
    }

    public function setPosition(Position $position)
    {
        $this->position = $position;
    }
}
