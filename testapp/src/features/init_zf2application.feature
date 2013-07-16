
Feature: Retrieve Zend\Mvc\Application
  In order to have access to all Zend Components
  As an extensio tester
  I needo be capable to instiantiate the Zend\Mvc\Application

  Scenario: Retrieving ServiceManager
    Given Zend\Mvc\Application is initialized
    When  method getServiceManager is invoked
    Then I have an instance of ServiceManager

   