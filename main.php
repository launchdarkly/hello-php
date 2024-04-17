<?php

require 'vendor/autoload.php';

function showEvaluationResult(string $key, bool $value) {
    echo PHP_EOL;
    echo sprintf("*** %s: The %s feature flag evaluates to %s", date("h:i:s"), $key, $value ? 'true' : 'false');
    echo PHP_EOL;
}

function showBanner() {
    echo PHP_EOL;
    echo "        ██       " . PHP_EOL;
    echo "          ██     " . PHP_EOL;
    echo "      ████████   " . PHP_EOL;
    echo "         ███████ " . PHP_EOL;
    echo "██ LAUNCHDARKLY █" . PHP_EOL;
    echo "         ███████ " . PHP_EOL;
    echo "      ████████   " . PHP_EOL;
    echo "          ██     " . PHP_EOL;
    echo "        ██       " . PHP_EOL;
    echo PHP_EOL;
}

// Set $sdkKey to your LaunchDarkly SDK key.
$sdkKey = getenv("LAUNCHDARKLY_SERVER_KEY") ?? "";

// Set $featureFlagKey to the feature flag key you want to evaluate.
$featureFlagKey = getenv("LAUNCHDARKLY_FLAG_KEY");
if (!$featureFlagKey) {
    $featureFlagKey = 'sample-feature';
}

$ci = getenv("CI") ?? false;

if (!$sdkKey) {
  echo "*** Please set the environment variable LAUNCHDARKLY_SERVER_KEY to your LaunchDarkly SDK key first\n\n";
  exit(1);
} else if (!$featureFlagKey) {
  echo "*** Please set the environment variable LAUNCHDARKLY_FLAG_KEY to a boolean flag first\n\n";
  exit(1);
}

$client = new LaunchDarkly\LDClient($sdkKey);

// Set up the evaluation context. This context should appear on your LaunchDarkly contexts dashboard soon after you run the demo.
$context = LaunchDarkly\LDContext::builder("example-user-key")
  ->kind("user")
  ->name("Sandy")
  ->build();


$showBanner = true;
$lastValue = null;
do {
    $flagValue = $client->variation($featureFlagKey, $context, false);

    if ($flagValue !== $lastValue) {
        showEvaluationResult($featureFlagKey, $flagValue);
    }

    if ($showBanner && $flagValue) {
        showBanner();
        $showBanner = false;
    }

    $lastValue = $flagValue;
    sleep(1);
} while(!$ci);
