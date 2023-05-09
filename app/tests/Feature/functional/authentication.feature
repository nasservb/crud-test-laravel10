# features/functional/welcome.feature
Feature: Welcoming developer
    As a Laravel developer
    In order to proberly begin a new project
    I need to be greeted upon arrival
    Scenario: Greeting developer on homepage
        Given I am logged in
        When I visit "/"
        Then I should see "You have arrived."
