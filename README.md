# Mars Rover Mission Technical Test

## The Task

You’re part of the team that explores Mars by sending remotely controlled vehicles to the surface
of the planet. Develop a software that translates the commands sent from earth to instructions
that are understood by the rover

## Requirements

You are given the initial starting point (x,y) of a rover and the direction (N,S,E,W)
it is facing.
1. The rover receives a collection of commands. (E.g.) FFRRFFFRL
2. The rover can move forward (f).
3. The rover can move left/right (l,r).
4. Suppose we are on a really weird planet that is square. 200x200 for example :)
5. Implement obstacle detection before each move to a new square. If a given sequence of commands encounters an obstacle, the rover moves up to the last possible point, aborts the sequence and reports the obstacle.


## How To Test

1. `composer install`
2. `composer test`

## Author
Marc Contijoch Sànchez
