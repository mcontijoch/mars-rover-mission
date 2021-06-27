<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\Command;

use MContijoch\MarsRoverMission\CardinalPoint\CardinalPoint;
use MContijoch\MarsRoverMission\Position\Position;

abstract class Command
{
    protected $command;

    abstract public function move(Position $position, CardinalPoint $cardinalPoint): Position;
}
