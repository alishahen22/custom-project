<?php

use Carbon\Carbon;
use App\Mail\WeHelp;
// use Stevebauman\Location\Facades\Location;
use App\Mail\BondMail;
use Twilio\Rest\Client;
use App\Servicies\Notify;
use App\Jobs\SendMultiMail;
use App\Mail\ResetPassword;
use App\Jobs\SendEmailGifts;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Mail\SendMailMarkting;
use App\Jobs\sendMailSubscribe;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ForgetPassword;
use AmrShawky\LaravelCurrency\Facade\Currency;

/*curr
|--------------------------------------------------------------------------
| Detect Active Routes Function
|--------------------------------------------------------------------------
|
| Compare given routes with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/

function isActiveRoute($route, $output = "active")
{
    if (\Route::currentRouteName() == $route) return $output;
}

function areActiveRoutes(array $routes, $output = "active show-sub")
{

    foreach ($routes as $route) {
        if (\Route::currentRouteName() == $route) return $output;
    }
}

function areActiveMainRoutes(array $routes, $output = "active")
{

    foreach ($routes as $route) {
        if (\Route::currentRouteName() == $route) return $output;
    }
}

function getSetting($key, $lang = null)
{
    $generalSettings = app(GeneralSettings::class);

    if ($lang == null) {
        $property = $key;
    } else {
        $property = $key . '_' . $lang;
    }

    return $generalSettings->$property ?? null;
}

function transWord($word, $locale = null)
{

    if (!$locale) {
        $locale = app()->getLocale();
    }

    $translationsFile = 'translations.json';

    // Check if the translations file exists, and create it if not
    if (!file_exists($translationsFile)) {
        file_put_contents($translationsFile, json_encode([], JSON_PRETTY_PRINT));
    }

    // Load existing translations from the JSON file
    $translations = json_decode(file_get_contents($translationsFile), true);

    // Check if the translation already exists for the given word and locale
    if (isset($translations[$locale][$word])) {
        $translatedWord = $translations[$locale][$word];
    } else {
        // If not found, translate the word
        $translateClient = new \Stichoza\GoogleTranslate\GoogleTranslate();
        $translatedWord = $translateClient->setSource(null)->setTarget($locale)->translate($word);

        // Save the translated word to the JSON file
        $translations[$locale][$word] = $translatedWord;
        file_put_contents($translationsFile, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    return $translatedWord;
}

function getCount(string $model)
{
    $modelClass = "App\Models\\" . ucfirst($model);

    $count = 0;

    if (class_exists($modelClass)) {
        $instance = new $modelClass;
        $count = $instance->count();
    }

    return $count;
}
// send code to mail
function sendMail($email, $code,$name)
{

    $data = [
        'code'  => $code,
        'name'  => $name
    ];

    Mail::to($email)->send(new ResetPassword($data));

    return true;
} // end of send code
