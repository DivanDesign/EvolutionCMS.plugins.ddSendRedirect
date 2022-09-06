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
6. Properties: Insert content of the `ddSendRedirect_configuration.json` file from the archive.
7. System events:
	1. `OnPageNotFound`.


## Usage


### 1. Create TV and document with redirection rules

Redirection rules will be stored in TV value of specified document. The plugin gets the rules from the TV.

1. Create the TV:
	* Name: `settings_redirectionRules` (you can specify another name, this is an example).
	* Input Type: `Textarea`.
2. Assign the TV to a required template.
3. Create a document with specified template. Let the document ID be `42`.


### 2. Configure (MODX)EvolutionCMS.plugins.ddSendRedirect

Go to the plugin configuration tab and save the data:
1. Document ID containing redirection rules: `42`.
2. TV name containing redirection rules: `settings_redirectionRules`.


### 3. Set up (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields (optional)

You can use this interface for more convenience.

```php
mm_ddMultipleFields([
	'fields' => 'settings_redirectionRules',
	'columns' => [
		[
			'title' => 'Source URL *',
			'type' => 'textarea',
			'width' => 250
		],
		[
			'title' => 'Target URL *',
			'type' => 'textarea',
			'width' => 250
		]
	]
]);
```

If you don't want to use mm_ddMultipleFields, you can just fill JSON manually in the following format:

```json
[
	[
		"https://example.com/some/source/url",
		"https://example.com/some/target/url"
	],
	[
		"another/source/url",
		"another/target/url"
	]
]
```


## Parameters description

* `$docId`
	* Desctription: Document ID containing redirection rules.
	* Valid values: `integer`
	* **Required**
	
* `$tvName`
	* Desctription: TV name containing redirection rules in JSON (see Usage above).
	* Valid values: `string`
	* **Required**


## Links

* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-plugins-ddsendredirect)
* [GitHub](https://github.com/DivanDesign/EvolutionCMS.plugins.ddSendRedirect)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />