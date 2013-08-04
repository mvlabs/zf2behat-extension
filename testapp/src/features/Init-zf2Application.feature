
Feature: Retrieve Zend\Mvc\Application
  In order to have access to all Zend Components
  As an extension tester
  I needo be capable retrieve ServiceManager

  Scenario: Retrieve ServiceManager by Interface 
    Given Zend\Mvc\Application is initialized
    When  method getServiceManager is invoked
    Then I should have a ServiceManager instance

  Scenario: Retrieve ServiceManager by Trait
    Given a Zf2Dictionary trait
    When I call getServiceManager method
    Then It should be an "example.service"
    And It should be an instance of ExampleService
    
  
   