# LaunchDarkly Sample PHP Application 

 Below, you'll find the basic build procedure, but for more comprehensive instructions, you can visit your [Quickstart page](https://app.launchdarkly.com/quickstart#/) or the [PHP SDK reference guide](https://docs.launchdarkly.com/sdk/server-side/php).

This demo requires PHP version 8.0 or higher.

## Build instructions 

1. Install the LaunchDarkly PHP SDK by running `composer update`

2. Edit `index.php` and set the value of `$sdk_key` to your LaunchDarkly SDK key. If there is an existing boolean feature flag in your LaunchDarkly project that you want to evaluate, set `$feature_flag_key` to the flag key.

```php
$sdk_key = "1234567890abcdef";

$feature_flag_key = "my-flag";
```

3. Run `php index.php`.

You should see the message `"Feature flag '<flag key>' is <true/false> for this context"`.
