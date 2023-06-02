[![CircleCI](https://circleci.com/gh/dcycle/uli_custom_workflow.svg?style=svg)](https://circleci.com/gh/dcycle/uli_custom_workflow)

ULI Custom Workflow
=====

A ULI is a unique login-link, it looks like /user/reset/1/123/ABC/login and it is generated when you forget your password or using `drush uli`.

This module allows you to use a ULI if you are already logged in; as well as customize the message which is displayed when you follow the ULI link.

Drupal assumes that:

* ULIs will not be used if you are already logged in, which is why [you will see an acces denied message if you try that](https://www.drupal.org/project/drupal/issues/3316655);
* ULIs will not be used if you just want to log in your site if you're a normal user, which is why [the message after using the link asks you to reset your password](https://www.drupal.org/project/drupal/issues/2969406).

In certain cases, for example if you are using the [Multiaccess](https://www.drupal.org/project/multiaccess) module, or if you simply request a ULI using the "forgot password" link, without ever having the intention of setting or remembering your password, Drupal's assumptions may not fit your workflow.

Local development
-----

If you install Docker on your computer:

* you can set up a complete local development workspace by downloading this codebase and running `./scripts/deploy.sh 9` or `./scripts/deploy.sh 10`. You do not need a separate Drupal instance. `./scripts/uli.sh` will provide you with a login link to your environment.
* you can destroy your local environment by running `./scripts/destroy.sh`.
* you can run all tests by running `./scripts/ci.sh`; please make sure all tests before submitting a patch.

Automated testing
-----

This module's main page is on [Drupal.org](http://drupal.org/project/uli_custom_workflow); a mirror is kept on [GitHub](http://github.com/dcycle/uli_custom_workflow).

Tests are performed on the GitHub code using CircleCI.

* [Test results on CircleCI](https://circleci.com/gh/dcycle/uli_custom_workflow)

To run automated tests locally, install Docker and type:

    ./scripts/ci.sh
