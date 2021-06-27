<?php

declare(strict_types=1);

namespace MContijoch\Test;

use MContijoch\MarsRoverMission\Command\Command;
use MContijoch\MarsRoverMission\Command\CommandCollection;
use MContijoch\MarsRoverMission\Command\ValueObjects\CommandString;
use MContijoch\MarsRoverMission\CardinalPoint\CardinalPoint;
use MContijoch\MarsRoverMission\CardinalPoint\East;
use MContijoch\MarsRoverMission\CardinalPoint\North;
use MContijoch\MarsRoverMission\CardinalPoint\South;
use MContijoch\MarsRoverMission\CardinalPoint\ValueObjects\Point;
use MContijoch\MarsRoverMission\CardinalPoint\West;
use MContijoch\MarsRoverMission\Command\Forward;
use MContijoch\MarsRoverMission\Position\Position;
use MContijoch\MarsRoverMission\Position\ValueObjects\PositionX;
use MContijoch\MarsRoverMission\Position\ValueObjects\PositionY;
use MContijoch\MarsRoverMission\Rover\Rover;
use MContijoch\MarsRoverMission\Surface\Surface;
use PHPUnit\Framework\TestCase;

final class RoverTest extends TestCase
{
    /** @test */
    public function test(): void
    {
        self::assertEquals(1, 1);
    }

    /** @test */
    public function itShouldThrowInvalidArgumentExceptionIfPositionIsInvalid(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Rover(
            new Position(400, 400),
            new Surface(),
            new North(),
        );
    }

    // NORTH

    /** @test */
    public function itShouldMoveForwardOnNorth(): void
    {
        $rover = new Rover(
            new Position(100, 100),
            new Surface(),
            new North(),
        );

        $rover->move('F');

        self::assertEquals(
            $rover->position,
            new Position(101, 100)
        );
    }

    /** @test */
    public function itShouldMoveLeftOnNorth(): void
    {
        $rover = new Rover(
            new Position(100, 100),
            new Surface(),
            new North(),
        );

        $rover->move('L');

        self::assertEquals(
            $rover->position,
            new Position(100, 99)
        );
    }

    /** @test */
    public function itShouldMoveRightOnNorth(): void
    {
        $rover = new Rover(
            new Position(100, 100),
            new Surface(),
            new North(),
        );

        $rover->move('R');

        self::assertEquals(
            $rover->position,
            new Position(100, 101)
        );
    }

    // SOUTH

    /** @test */
    public function itShouldMoveForwardOnSouth(): void
    {
        $rover = new Rover(
            new Position(100, 100),
            new Surface(),
            new South(),
        );

        $rover->move('F');

        self::assertEquals(
            $rover->position,
            new Position(99, 100)
        );
    }

    /** @test */
    public function itShouldMoveLeftOnSouth(): void
    {
        $rover = new Rover(
            new Position(100, 100),
            new Surface(),
            new South(),
        );

        $rover->move('L');

        self::assertEquals(
            $rover->position,
            new Position(100, 101)
        );
    }

    /** @test */
    public function itShouldMoveRightOnSouth(): void
    {
        $rover = new Rover(
            new Position(100, 100),
            new Surface(),
            new South(),
        );

        $rover->move('R');

        self::assertEquals(
            $rover->position,
            new Position(100, 99)
        );
    }


    // EAST

    /** @test */
    public function itShouldMoveForwardOnEast(): void
    {
        $rover = new Rover(
            new Position(100, 100),
            new Surface(),
            new East(),
        );

        $rover->move('F');

        self::assertEquals(
            $rover->position,
            new Position(100, 101)
        );
    }

    /** @test */
    public function itShouldMoveLeftOnEast(): void
    {
        $rover = new Rover(
            new Position(100, 100),
            new Surface(),
            new East(),
        );

        $rover->move('L');

        self::assertEquals(
            $rover->position,
            new Position(101, 100)
        );
    }

    /** @test */
    public function itShouldMoveRightOnEast(): void
    {
        $rover = new Rover(
            new Position(100, 100),
            new Surface(),
            new East(),
        );

        $rover->move('R');

        self::assertEquals(
            $rover->position,
            new Position(99, 100)
        );
    }

    // WEST

    /** @test */
    public function itShouldMoveForwardOnWest(): void
    {
        $rover = new Rover(
            new Position(100, 100),
            new Surface(),
            new West(),
        );

        $rover->move('F');

        self::assertEquals(
            $rover->position,
            new Position(100, 99)
        );
    }

    /** @test */
    public function itShouldMoveLeftOnWest(): void
    {
        $rover = new Rover(
            new Position(100, 100),
            new Surface(),
            new West(),
        );

        $rover->move('L');

        self::assertEquals(
            $rover->position,
            new Position(99, 100)
        );
    }

    /** @test */
    public function itShouldMoveRightOnWest(): void
    {
        $rover = new Rover(
            new Position(100, 100),
            new Surface(),
            new West(),
        );

        $rover->move('R');

        self::assertEquals(
            $rover->position,
            new Position(101, 100)
        );
    }

    /** @test */
    public function itShouldMoveCorrectlyOnAConcretCommand(): void
    {
        $rover = new Rover(
            new Position(100, 100),
            new Surface(),
            new North(),
        );

        $rover->move('FFRRFFFRL');

        self::assertEquals(
            $rover->position,
            new Position(105, 102)
        );
    }
}
