<?php 

require("OpenWeatherMap/vendor/autoload.php");

use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;
use Http\Factory\Guzzle\RequestFactory;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;


// If you installed the recommended PSR-17/18 implementations, here's how to create the
// necessary `$httpClient` and `$httpRequestFactory`:
$httpRequestFactory = new RequestFactory();
$httpClient = GuzzleAdapter::createWithConfig(['verify' => false ]);

$owm = new OpenWeatherMap('cf37dff364ea7c63c20d6e3a35c92e0b', $httpClient, $httpRequestFactory);

$cli = false;
$lf = '<br>';
if (php_sapi_name() === 'cli') {
    $lf = "\n";
    $cli = true;
}
// Language of data (try your own language here!):
$lang = $_SESSION["lang"];

// Units (can be 'metric' or 'imperial' [default]):
$units = 'metric';


$weather = $owm->getWeather('Toulouse', $units, $lang);


echo '<img src="'.$weather->weather->getIconUrl().'">';
echo $lf;

echo '<b>'.$weather->temperature.'</b>';
echo $lf;

// Returns the minimum temperature:
echo '(<FONT color="blue">'.$weather->temperature->min.'</FONT>';
echo ' / <FONT color="red">'.$weather->temperature->max.'</FONT>)';
echo $lf.'<hr>';

echo '<b><u>';
if ($_SESSION["lang"] == "fr"){
          echo "Pression";
         } else if ($_SESSION["lang"] == "en"){
          echo "Pressure";
         } else if ($_SESSION["lang"] == "es"){
          echo "Presiona";
         }
echo' :</b></u> '; echo $weather->pressure;
echo $lf;
echo '<b><u>';
if ($_SESSION["lang"] == "fr"){
          echo "Humidité";
         } else if ($_SESSION["lang"] == "en"){
          echo "Humidity";
         } else if ($_SESSION["lang"] == "es"){
          echo "Humedad";
         }
echo' :</b></u> '; echo $weather->humidity;
echo $lf;
echo '<b><u>';
if ($_SESSION["lang"] == "fr"){
          echo "Vent";
         } else if ($_SESSION["lang"] == "en"){
          echo "Wind";
         } else if ($_SESSION["lang"] == "es"){
          echo "Viento";
         }
echo ' :</b></u> '; echo $weather->wind->speed;

?>