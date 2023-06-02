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

* you can set up a complete local development workspace by downloading this codebase and running `./scripts/deploy.sh`. To test with Drupal 9, use `./scripts/deploy.sh 9`. You do not need a separate Drupal instance. `./scripts/uli.sh` will provide you with a login link to your environment.
* you can destroy your local environment by running `./scripts/destroy.sh`.
* you can run all tests by running `./scripts/ci.sh`; please make sure all tests before submitting a patch.

Similar modules
-----

* [System Status](https://www.drupal.org/project/system_status) works in a similar way, but it is designed to work with cloud service, and it seems to expose, for a given environment, all version data for core and contrib, whereas Expose status report exports issues needing attention.

Automated testing
-----

This module's main page is on [Drupal.org](http://drupal.org/project/uli_custom_workflow); a mirror is kept on [GitHub](http://github.com/dcycle/uli_custom_workflow).

Unit tests are performed on Drupal.org's infrastructure and in GitHub using CircleCI. Linting is performed on GitHub using CircleCI and Drupal.org. For details please see  [Start unit testing your Drupal and other PHP code today, October 16, 2019, Dcycle Blog](https://blog.dcycle.com/blog/2019-10-16/unit-testing/).

* [Test results on Drupal.org's testing infrastructure](https://www.drupal.org/node/3098822/qa)
* [Test results on CircleCI](https://circleci.com/gh/dcycle/uli_custom_workflow)

To run automated tests locally, install Docker and type:

    ./scripts/ci.sh
