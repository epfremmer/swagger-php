# Swagger PHP

Library for parsing swagger documentation into PHP entities for use in testing and code generation 

## Installation
    
* Require package `composer require epfremme/swagger-php`
* Install packages `composer install`

## Basic Usage

Instantiate the swagger factory and pass it a valid swagger documentation file to parse:

    use Epfremme\Swagger\Factory\SwaggerFactory;
    
    $factory = new SwaggerFactory();
    $swagger = $factory->build('/path/to/swagger/file.json');
    
    // do stuff with your Swagger entity
    
## Swagger Definitions

Visit the swagger specification for more information on creating valid swagger json/yaml documentation

[swagger.io](http://swagger.io/specification)

## Support

Currently only swagger version 2.0 is supported in both JSON and YAML format
