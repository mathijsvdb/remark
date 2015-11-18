Feature: Registration form
  Testing registration form, registering as testperson

##TODO
  Scenario: register as testperson
    Given I am on "/register"
    When I fill in "lastname" with "testperson lastname"
    When I fill in "firstname" with "testperson firstname"
    When I fill in "username" with "testperson username"
    When I fill in "email" with "testpersonemail@student.thomasmore.be"
    When I fill in "password" with "testperson password"
    When I fill in "password_confirmation" with "testperson password"
    When I press "Register"
    Then I should see "DO YOU WANT TO MAKE THE MOST OF YOUR DESIGN?"