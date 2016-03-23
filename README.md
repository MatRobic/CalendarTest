Calendar class which implements the CalendarInterface and pass all the unit tests.

I'm certainly wrong but with these two tests:

['2015-12-01', 1, 2, 2, 31, 30, [
    49 => [30 => false, 1  => false, 2  => false, 3  => false, 4  => false, 5  => false, 6  => false, ],
    50 => [7  => false, 8  => false, 9  => false, 10 => false, 11 => false, 12 => false, 13 => false, ],
    51 => [14 => false, 15 => false, 16 => false, 17 => false, 18 => false, 19 => false, 20 => false, ],
    52 => [21 => false, 22 => false, 23 => false, 24 => false, 25 => false, 26 => false, 27 => false, ],
    53 => [28 => false, 29 => false, 30 => false, 31 => false, 1  => false, 2  => false, 3  => false, ],
]],

['2015-12-31', 31, 4, 2, 31, 30, [
    49 => [30 => false, 1  => false, 2  => false, 3  => false, 4  => false, 5  => false, 6  => false, ],
    50 => [7  => false, 8  => false, 9  => false, 10 => false, 11 => false, 12 => false, 13 => false, ],
    51 => [14 => false, 15 => false, 16 => false, 17 => false, 18 => false, 19 => false, 20 => false, ],
    52 => [21 =>  true, 22 =>  true, 23 =>  true, 24 =>  true, 25 =>  true, 26 =>  true, 27 =>  true, ],
    53 => [28 => false, 29 => false, 30 => false, 31 => false, 1  => false, 2  => false, 3  => false, ],
]],

It should this because 2015 is not bisextile year, no ? : 

['2015-12-01', 1, 2, 2, 31, 30, [
    48 => [30 => false, 1  => false, 2  => false, 3  => false, 4  => false, 5  => false, 6  => false, ],
    49 => [7  => false, 8  => false, 9  => false, 10 => false, 11 => false, 12 => false, 13 => false, ],
    50 => [14 => false, 15 => false, 16 => false, 17 => false, 18 => false, 19 => false, 20 => false, ],
    51 => [21 => false, 22 => false, 23 => false, 24 => false, 25 => false, 26 => false, 27 => false, ],
    52 => [28 => false, 29 => false, 30 => false, 31 => false, 1  => false, 2  => false, 3  => false, ],
]],

['2015-12-31', 31, 4, 2, 31, 30, [
    48 => [30 => false, 1  => false, 2  => false, 3  => false, 4  => false, 5  => false, 6  => false, ],
    49 => [7  => false, 8  => false, 9  => false, 10 => false, 11 => false, 12 => false, 13 => false, ],
    50 => [14 => false, 15 => false, 16 => false, 17 => false, 18 => false, 19 => false, 20 => false, ],
    51 => [21 =>  true, 22 =>  true, 23 =>  true, 24 =>  true, 25 =>  true, 26 =>  true, 27 =>  true, ],
    52 => [28 => false, 29 => false, 30 => false, 31 => false, 1  => false, 2  => false, 3  => false, ],
]],