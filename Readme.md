# Technical essay about property change with confirmation

## Motivation

Test job.

## The task

There is user perferences system. The user wants to change one that require to confirm with sms/email/telegram.

How it should be implemented on top level of code (without integrations to services)?

## The solution

In according to three-tier application concept, and to the clean model idea of Robert Martin, and to idea of the hexagonal architecture,
this application separated to some big parts:
- Domain (entities, commands, interfaces to other layers)
- EntryPoints (here is only http, but it can be queue consumers, cli handlers, cronjob handlers, system timer handlers)
- External services (persistence, adapters to messengers, adapters to queues etc...)

The code has be designed from Entities to External services. It also good to be explored from EntryPoints/Http through the Commands to the ExternalServices.

This code did not run, it is just a concept of application design.
