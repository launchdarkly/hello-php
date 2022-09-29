<?php
require 'vendor/autoload.php';

# Set $sdkKey to your LaunchDarkly SDK key before running
$sdkKey = "";

# Set $featureFlagFey to the feature flag key you want to evaluate
$featureFlagKey = "my-boolean-flag";

if (!$sdkKey) {
  echo "*** Please edit index.php to set $sdkKey to your LaunchDarkly SDK key first\n\n";
  exit(1);
}

$client = new LaunchDarkly\LDClient($sdkKey);

# Set up the user properties. This user should appear on your LaunchDarkly users dashboard
# soon after you run the demo.
$user = (new LaunchDarkly\LDUserBuilder("example-user-key"))
  ->name("Sandy")
  ->build();

$flagValue = $client->variation($featureFlagKey, $user, false);
$flagValueStr = $flagValue ? 'true' : 'false';

echo "*** Feature flag '{$featureFlagKey}' is {$flagValueStr} for this user\n\n";
