# (MODX)EvolutionCMS.plugins.ddSendRedirect

Redirects from required non-existent URLs to required target URLs.
Each target URL can be set as:
1. URL string or just ID of any existing site page.
2. Any external URL at all.


## Requires

* PHP >= 5.6
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1


## Installation


Elements → Plugins: Create a new plugin with the following data

1. Plugin name: `ddSendRedirect`.
2. Description: `<b>1.0</b> Redirects from required non-existent URLs to required target URLs.`.
3. Category: `Core`.
4. Parse DocBlock: `no`.
5. Plugin code (php): Insert content of the `ddSendRedirect_plugin.php` file from the archive.
6. System events:
	1. `OnPageNotFound`.


## Links

* [Telegram chat](https://t.me/dd_code)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />