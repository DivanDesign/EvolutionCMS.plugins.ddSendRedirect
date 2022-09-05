# (MODX)EvolutionCMS.plugins.ddSendRedirect

Redirects from required non-existent URLs to required target URLs.
You can redirect to any existing site page or to any external URL at all.

Each URL can be specified in one of the following format:
1. Full: `https://example.com/some/page`.
2. Without protocol: `example.com/some/page`, `//example.com/some/page`.
3. Without domain: `some/page`, `/some/page`.
4. Just an ID of the existing document: `12` (only for target URLs).


## Requires

* PHP >= 5.6
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.libraries.ddTools](https://code.divandesign.biz/modx/ddtools) >= 0.55


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