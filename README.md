# ThreeOhOne
A simple Laravel package to deal with handling 301 redirects.


#### Installation
	- Add to `"ssx/threeohone": "0.0.1",` to composer.json
	- Add Service Provider `SSX\ThreeOhOne\Providers\ThreeOhOneServiceProvider::class` to config/app.php
	- Add Global Middleware `\SSX\ThreeOhOne\Middleware\CheckForRedirect::class` to Http/Kernel.php
	- Run vendor:publish
	- php artisan migrate
	- Add records to redirect table


#### Usage
Two types of redirect, 'domain' and 'path'. A domain redirect will redirect:

    www.site.com/path/to/file.html to http://test.com

A path redirect will ignore the domain only use the requested path, ie:

    /path/to/file.html to http://example.com

Which is useful on sites that have subdomains.


#### Todo
 - Add caching
 - Add tests