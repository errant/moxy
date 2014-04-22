# Moxy
*A lightweight MVC-like PHP framework*

Moxy is a semi-opinionated framework written in PHP. It implements a vaguely MVC design pattern, with glue logic contained in Controllers.

## Install

Moxy is available on Packagist (errant/moxy) and can be installed via Composer.

    php composer.phar require errant/moxy 'dev-master'

Alternatively, you can clone the repository, and use any PSR-0 or PSR-4 autoloader.

## Ethos

Moxy is intended to bring together all of the best "bits" of various PHP frameworks. The design goals are:

- Lightweight; only the core tools needed to build an application, additional functionality split to modules
- Fast; add minimal overhead to code (e.g. lazy instantation of services)
- Developer Friendly; robust development tools, clear differentiation between production/development modes
- Simplicity; easy API, simple concepts

### Why MVC?

MVC offers a simple seperation of UI and Data/Business Logic (glued together with controllers) without being too prescriptive. Moxy is 'MVC-like' which means it could be used without one or more aspects of the Model-View-Controller paradigm. 

### Why?

There are many, many PHP micro-frameworks. And plenty of full-blown MVC frameworks. They all suffer from problems which can limit the productivity of developers. Moxy is designed to be simple to use and understand. It is built to be good at a reasonably small sub-set of common well-defined tasks that developers shouldn't need to replicate.

## Current Stuff

See /doc for more details.

- Dependency Injection Container
- Router (wraps Klien.php)
- Middleware
- Event Library & Observer pattern
- Controller-based dispatcher
- Template/Theme
- Configuration loader
- Database service
- Error controller

## Todo

- Documentation
- Logging
- Models
- More services
- Optional middleware
- Development tools