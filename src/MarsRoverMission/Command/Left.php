<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\Command;

use MContijoch\MarsRoverMission\Command\ValueObjects\CommandString;
use MContijoch\MarsRoverMission\CardinalPoint\CardinalPoint;
use MContijoch\MarsRoverMission\Position\Position;

class Left extends Command
{
    public function __construct()
    {
        $this->command = CommandString::LEFT;
    }

    public function move(Position $position, CardinalPoint $cardinalPoint): Position
    {
        $newPositon = $cardinalPoint->moveLeft($position);
        return $newPositon;
    }
}
