[![Build Status](https://travis-ci.org/epfremmer/swagger.svg?branch=master)](https://travis-ci.org/epfremmer/swagger)

# swagger-bundle
Library for parsing swagger documentation into PHP entities for use in testing and code generation 

## Installation

Add vcs repository to composer json:
    
    "repositories": [
        {
            "type": "git",
            "url": "git@github.com:epfremmer/swagger.git"
        }
    ]
    
* Require package `composer require epfremmer/swagger:dev-develop`
* Install packages `composer install`

## Basic Usage

Instantiate the swagger factory and pass it a valid swagger documentation file to parse:

    use ERP\Swagger\Factory\SwaggerFactory;
    
    $factory = new SwaggerFactory();
    $swagger = $factory->build('/path/to/swagger/file.json');
    
    // do stuff with your Swagger entity
    
## Swagger Definitions

Visit the swagger specification for more information on creating valid swagger json/yaml documentation

[swagger.io](http://swagger.io/specification)

## Support

Currently only swagger version 2.0 is supported in both JSON and YAML format