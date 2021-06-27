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
    public $cardinalPoint;
    public $surface;

    private function __construct(Position $position, CardinalPoint $cardinalPoint, Surface $surface)
    {
        $this->ensurePositionIsInSurface($position, $surface);

        $this->position = $position;
        $this->surface = $surface;
        $this->cardinalPoint = $cardinalPoint;
    }

    public static function create(int $positionX,int $positionY, string $pointString, int $surfaceX = null, int $surfaceY = null)
    {
        $position = new Position($positionX, $positionY);

        $cardinalPoint = CardinalPoint::getCardinalPointByInitialLetter($pointString);

        $surface = new Surface($surfaceX, $surfaceY);

        return new self($position, $cardinalPoint, $surface);
    }

    private function ensurePositionIsInSurface(Position $position, Surface $surface): void
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
            $this->surface->ensurePositionIsValid($newPosition);

            $this->setPosition($newPosition);
        }
    }

    private function setPosition(Position $position)
    {
        $this->ensurePositionIsInSurface($position, $this->surface);

        $this->position = $position;
    }
}
