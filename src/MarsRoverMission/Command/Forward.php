<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\Command;

use MContijoch\MarsRoverMission\Command\ValueObjects\CommandString;
use MContijoch\MarsRoverMission\CardinalPoint\CardinalPoint;
use MContijoch\MarsRoverMission\Position\Position;

class Forward extends Command
{
    public function __construct()
    {
        $this->command = CommandString::FORWARD;
    }

    public function move(Position $position, CardinalPoint $cardinalPoint): Position
    {
        return $cardinalPoint->moveForward($position);
    }
}
