Feature: handle ServiceManager
  In order to use framework functionality
  As a tester
  I need to be able to call Zend\Mvc\Application

  Scenario: Get Zend\Mvc\Application and call ServiceManager
    Given I have a Zend\MVC\Application instance
    When I get the ServiceManager from it
    Then it could be possible call a service using  "moduledemo.service" as param
    And use it to retrieve an "Hello world" message

    