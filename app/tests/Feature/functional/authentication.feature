# features/functional/welcome.feature
Feature: user authentication
    As a user
    I need to be correctly logged in to the project
    Scenario: go on landing page
        Given I am not logged in
        When I visit "127.0.0.1"
        Then I should see "Welcome to my site."

    Scenario: go on dashboard
        Given I am logged in
        When I visit "http://127.0.0.1/home/"
        Then I should see "Customer Dashboard"