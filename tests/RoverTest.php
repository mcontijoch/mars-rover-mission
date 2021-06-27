<?php

declare(strict_types=1);

namespace MContijoch\Test;

use MContijoch\MarsRoverMission\Position\Position;
use MContijoch\MarsRoverMission\Rover\Rover;
use PHPUnit\Framework\TestCase;

final class RoverTest extends TestCase
{
    /** @test */
    public function itShouldThrowInvalidArgumentExceptionIfPositionIsInvalid(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        Rover::create(400, 400, 'N');
    }

    // NORTH

    /** @test */
    public function itShouldMoveForwardOnNorth(): void
    {
        $rover = Rover::create(100, 100, 'N');

        $rover->move('F');

        self::assertEquals(
            $rover->position,
            new Position(101, 100)
        );
    }

    /** @test */
    public function itShouldMoveLeftOnNorth(): void
    {
        $rover = Rover::create(100, 100, 'N');

        $rover->move('L');

        self::assertEquals(
            $rover->position,
            new Position(100, 99)
        );
    }

    /** @test */
    public function itShouldMoveRightOnNorth(): void
    {
        $rover = Rover::create(100, 100, 'N');

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
        $rover = Rover::create(100, 100, 'S');

        $rover->move('F');

        self::assertEquals(
            $rover->position,
            new Position(99, 100)
        );
    }

    /** @test */
    public function itShouldMoveLeftOnSouth(): void
    {
        $rover = Rover::create(100, 100, 'S');

        $rover->move('L');

        self::assertEquals(
            $rover->position,
            new Position(100, 101)
        );
    }

    /** @test */
    public function itShouldMoveRightOnSouth(): void
    {
        $rover = Rover::create(100, 100, 'S');

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
        $rover = Rover::create(100, 100, 'E');

        $rover->move('F');

        self::assertEquals(
            $rover->position,
            new Position(100, 101)
        );
    }

    /** @test */
    public function itShouldMoveLeftOnEast(): void
    {
        $rover = Rover::create(100, 100, 'E');

        $rover->move('L');

        self::assertEquals(
            $rover->position,
            new Position(101, 100)
        );
    }

    /** @test */
    public function itShouldMoveRightOnEast(): void
    {
        $rover = Rover::create(100, 100, 'E');

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
        $rover = Rover::create(100, 100, 'W');

        $rover->move('F');

        self::assertEquals(
            $rover->position,
            new Position(100, 99)
        );
    }

    /** @test */
    public function itShouldMoveLeftOnWest(): void
    {
        $rover = Rover::create(100, 100, 'W');

        $rover->move('L');

        self::assertEquals(
            $rover->position,
            new Position(99, 100)
        );
    }

    /** @test */
    public function itShouldMoveRightOnWest(): void
    {
        $rover = Rover::create(100, 100, 'W');

        $rover->move('R');

        self::assertEquals(
            $rover->position,
            new Position(101, 100)
        );
    }

    /** @test */
    public function itShouldMoveCorrectlyOnAConcretCommand(): void
    {
        $rover = Rover::create(100, 100, 'N');

        $rover->move('FFRRFFFRL');

        self::assertEquals(
            $rover->position,
            new Position(105, 102)
        );
    }

    // SURFACE OBSTACLES

}
