# LaunchDarkly Sample PHP Application

[![Build and run](https://github.com/launchdarkly/hello-php/actions/workflows/ci.yml/badge.svg)](https://github.com/launchdarkly/hello-php/actions/workflows/ci.yml)

Below, you'll find the basic build procedure, but for more comprehensive instructions, you can visit your [Quickstart page](https://app.launchdarkly.com/quickstart#/) or the [PHP SDK reference guide](https://docs.launchdarkly.com/sdk/server-side/php).

This demo requires PHP version 8.0 or higher.

## Build instructions

1. Install the LaunchDarkly PHP SDK by running `composer update`
1. On the command line, set the value of the environment variable `LAUNCHDARKLY_SERVER_KEY` to your LaunchDarkly SDK key.
    ```bash
    export LAUNCHDARKLY_SERVER_KEY="1234567890abcdef"
    ```
1. On the command line, set the value of the environment variable `LAUNCHDARKLY_FLAG_KEY` to an existing boolean feature flag in your LaunchDarkly project that you want to evaluate.

    ```bash
    export LAUNCHDARKLY_FLAG_KEY="my-boolean-flag"
    ```
1. Run `php index.php`.

You should see the message `"Feature flag '<flag key>' is <true/false> for this context"`.
