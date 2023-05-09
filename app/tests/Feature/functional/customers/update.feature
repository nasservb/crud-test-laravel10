# features/functional/welcome.feature
Feature: create customer
    As a customer
    I need to be correctly create customer in dashboard
    Scenario: successfull update customer
        Given I am logged in
        And I visit "127.0.0.1/home"
        And I click on first "[edit]" button id 
        And I fill in the following:
        | editval[first_name] | nasser              |
        | editval[last_name]  | niazy |
        | editval[email] | nasservb@gmail.com      |
        | editval[phone_number]  | +989189151266             |
        | editval[bank_account_number]  | 98863665685852255             |
        | editval[date_of_birth]  | 1999-12-12             |
        When I click on "save" button
        Then I should see "The record is updated successfully"
    
    Scenario: create customer error for validation
        Given I am logged in
        And I visit "127.0.0.1/home"
        And I click on first "[edit]" button id 
        And I fill in the following:
        | editval[first_name] | nasser              |
        | editval[last_name]  | niazy |
        | editval[email] | nasservb@.com      |
        | editval[phone_number]  | +989189151266             |
        | editval[bank_account_number]  | 98863665685852255             |
        | editval[date_of_birth]  | 1999-12-12             |
        When I click on "save" button
        Then I should see "The record is not updated"
