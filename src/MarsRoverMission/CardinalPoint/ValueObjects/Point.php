<?php

declare(strict_types=1);

namespace MContijoch\MarsRoverMission\CardinalPoint\ValueObjects;

final class Point
{
    const NORTH = 'N';
    const EAST = 'E';
    const SOUTH = 'S';
    const WEST = 'W';

    const DIRECTIONS = [
        self::NORTH, self::EAST, self::SOUTH, self::WEST
    ];

    public $value;

    public function __construct(string $value)
    {
        $this->ensureCardinalDirectionIsValid($value);

        $this->value = $value;
    }

    public function ensureCardinalDirectionIsValid(string $value): void
    {
        $isValid = in_array($value, self::DIRECTIONS);

        if (!$isValid) {
            throw new \InvalidArgumentException(sprintf('The value "%s" is invalid.', $value));
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
