<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\Command;

use MContijoch\MarsRoverMission\Command\ValueObjects\CommandString;

final class CommandCollection
{
    public $commands;

    public function __construct(string $commands)
    {
        $this->commands = $this->convertToCommands($commands);
    }

    public function convertToCommands($commands)
    {
        $commandsArray = [];

        $commandStringCollection = str_split($commands);

        foreach ($commandStringCollection as $commandString) {
            if ($commandString === CommandString::FORWARD) {
                $commandsArray[] = new Forward();
            } elseif ($commandString === CommandString::RIGHT) {
                $commandsArray[] = new Right();
            } elseif ($commandString === CommandString::LEFT) {
                $commandsArray[] = new Left();
            } else {
                throw new \InvalidArgumentException(sprintf('Command "%s" is invalid.', $commandString));
            }
        }

        if (empty($commandsArray)) {
            throw new \Exception('Command is empty');
        }

        return (array) $commandsArray;
    }
}
