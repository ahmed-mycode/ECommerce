**Useful packages for multi vendor , tenancy eCommerce:-**
-------------------------------------------------------
* mcamara/laravel-localization - The package offers the following:
    https://github.com/mcamara/laravel-localization
    -Detect language from browser
    -Smart redirects (Save locale in session/cookie)
    -Smart routing (Define your routes only once, no matter how many languages you use)
    -Translatable Routes
    -Supports caching & testing
    -Option to hide default locale in url
    -Many snippets and helpers (like language selector)

    Installation:
        composer require mcamara/laravel-localization

    Config Files:
        php artisan vendor:publish --provider="Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider"

    Register Middleware:
        app/Http/Kernel.php file:
        /**** OTHER MIDDLEWARE ****/
        'localize'                => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
        'localizationRedirect'    => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
        'localeSessionRedirect'   => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
        'localeCookieRedirect'    => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
        'localeViewPath'          => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class,

########################################################################################################################

* Astrotomic/laravel-translatable - This is a Laravel package for translatable models.
    https://github.com/Astrotomic/laravel-translatable

    Installation:
        composer require astrotomic/laravel-translatable

########################################################################################################################

* yajra/laravel-datatables
    https://github.com/yajra/laravel-datatables

    Installation:
        composer require yajra/laravel-datatables-oracle:"~9.0"

    Configuration (Optional):
        php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider"
