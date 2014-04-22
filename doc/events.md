# Events

Moxy implements a very simple, but robust, event system. At it's core is \Moxy\Event, a low level library which allows you to bind callables to a named event, which can then be triggered.

It also provides an observer class pattern (\Moxy\Patterns\Observer) which allows direct binding to objects.

The Moxy framework emits several events by default during execution, which can be hooked into either by using the \Moxy\Moxy application object (which inherits the observer pattern) or using the low level library. 

## Low Level Event Library

## High Level Observer Pattern

## Moxy Framework Events

Moxy emits the following events during execution

- **moxy.init**
- **moxy.prerouter**
- **moxy.final**