<?php

require 'vendor/autoload.php';

# Set the environment variable LAUNCHDARKLY_SERVER_KEY to your LaunchDarkly SDK key before running
$sdkKey = getenv("LAUNCHDARKLY_SERVER_KEY") ?? "";

# Set the environment variable LAUNCHDARKLY_FLAG_KEY to the feature flag key you want to evaluate
$featureFlagKey = getenv("LAUNCHDARKLY_FLAG_KEY") ?? "";

if (!$sdkKey) {
  echo "*** Please set the environment variable LAUNCHDARKLY_SERVER_KEY to your LaunchDarkly SDK key first\n\n";
  exit(1);
} else if (!$featureFlagKey) {
  echo "*** Please set the environment variable LAUNCHDARKLY_FLAG_KEY to a boolean flag first\n\n";
  exit(1);
}

$client = new LaunchDarkly\LDClient($sdkKey);

# Set up the evaluation context. This context should appear on your LaunchDarkly
# contexts dashboard soon after you run the demo.
$context = LaunchDarkly\LDContext::builder("example-user-key")
  ->name("Sandy")
  ->build();

$flagValue = $client->variation($featureFlagKey, $context, false);
$flagValueStr = $flagValue ? 'true' : 'false';

echo "*** Feature flag '{$featureFlagKey}' is {$flagValueStr} for this context\n\n";
