# features/functional/welcome.feature
Feature: create customer
    As a customer
    I need to be correctly create customer in dashboard
    Scenario: successfull update customer
        Given I am logged in
        And I visit "127.0.0.1/home"
        And I click on first "[delete]" button id 
        When I click on "OK" alert 
        Then I should see "The record is deleted"
    