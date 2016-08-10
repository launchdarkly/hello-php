<?php
require 'vendor/autoload.php';
date_default_timezone_set('UTC');

// TODO : Enter your LaunchDarkly SDK key here
$client = new LaunchDarkly\LDClient("YOUR_SDK_KEY");

$builder = (new LaunchDarkly\LDUserBuilder("bob@example.com"))
  ->firstName("Bob")
  ->lastName("Loblaw")
  ->custom(["groups" => "beta_testers"]);

$user = $builder->build();

// TODO : Enter the key for your feature flag here
if ($client->variation("YOUR_FEATURE_FLAG_KEY", $user, false)) {
  // application code to show the feature
  echo "Showing your feature to " . $user->getKey() . "\n";
} else {
  // the code to run if the feature is off
  echo "Not showing your feature to " . $user->getKey() . "\n";
}
?>
