Feature: login
  This test checks if the login is working.

##TODO
  Scenario: Login with a user
    Given I am on "/"
    When I press "Sign In"
    Then I should see "Login om verder te gaan"
    When I fill in "_email" with "test@student.thomasmore.be"
    When I fill in "_password" with "test"
    Then I should see "Log out"