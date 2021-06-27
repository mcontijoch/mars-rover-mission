<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\Command\ValueObjects;

final class CommandString
{
    const FORWARD = 'F';
    const RIGHT = 'R';
    const LEFT = 'L';

    const VALID_COMMANDS = [
        self::FORWARD, self::RIGHT, self::LEFT
    ];

    protected $value;

    public function __construct(string $value)
    {
        $this->ensureCommandCollectionsIsValid($value);
        $this->value = $value;
    }

    public function ensureCommandCollectionsIsValid($collection): void
    {
        if ($collection === "") {
            throw new \InvalidArgumentException(sprintf('The collection "%s" is invalid.', $collection));
        }

        $commands = str_split($collection);

        foreach ($commands as $cardinalPoint) {
            $isValid = in_array($cardinalPoint, self::VALID_COMMANDS);

            if (!$isValid) {
                throw new \InvalidArgumentException(sprintf('The command "%s" is invalid.', $cardinalPoint));
            }
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
