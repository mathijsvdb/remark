Feature: Updating account
  Testing account update

##TODO
  Scenario: voeg ene project toe
    Given I am on "/"
    And I fill in "email" with "testpersonemail@student.thomasmore.be"
    And I fill in "password" with "testperson password"
    And I press "submit"
    Then I should see "start"
    When I am on "/update"
    When I fill in "firstname" with "testperson firstname"
    When I fill in "lastname" with "testperson lastname"
    When I press "Submit!"
    Then I should see "testperson firstname"