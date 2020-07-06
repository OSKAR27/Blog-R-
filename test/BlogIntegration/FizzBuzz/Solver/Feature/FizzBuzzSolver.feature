Feature: I can detect fizz, buzz, fizzbuzz and generic numbers
  As a sane person
  I want to make sure that the fizzbuzz service works
  So that the tests pass

  Scenario Outline: FizzBuzz service
    Given a <number>
    And a fizzbuzz service with fizz, buzz and generic solvers
    When executing the fizzbuzz service
    Then the result should be a <string>
    Examples:
  | number | string   |
  | 2      | 2        |
  | 3      | fizz     |
  | 6      | fizz     |
  | 5      | buzz     |
  | 15     | fizzbuzz |
  | 63     | fizz     |