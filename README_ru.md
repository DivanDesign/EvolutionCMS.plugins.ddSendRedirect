# (MODX)EvolutionCMS.plugins.ddSendRedirect

Переадресовывает с заданных несуществующих URL на заданные URL.
Может перенаправлять на любую существующую страницу сайта или вообще любой внешний URL.

Для удобства каждый URL может быть задан в любом из следующих форматов:
1. Полный: `https://example.com/some/page`.
2. Без протокола: `example.com/some/page`, `//example.com/some/page`.
3. Без домена: `some/page`, `/some/page`.
4. Просто ID существующего документа на сайте: `12` (только для URL назначения).


## Использует

* PHP >= 5.6
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.libraries.ddTools](https://code.divandesign.ru/modx/ddtools) >= 0.55


## Установка


Элементы → Плагины: Создайте новый плагин со следующими параметрами

1. Название плагина: `ddSendRedirect`.
2. Описание: `<b>1.0</b> Переадресовывает с заданных несуществующих URL на заданные URL.`.
3. Категория: `Core`.
4. Анализировать DocBlock: `no`.
5. Код плагина (php): Вставьте содержимое файла `ddSendRedirect_plugin.php` из архива.
6. Свойства: Вставьте содержимое файла `ddSendRedirect_configuration.json` из архива.
7. Системные события:
	1. `OnPageNotFound`.


## Использование


### 1. Создать TV и документ с правилами переадресаций

Правила переадресаций будут храниться в значении TV определённого документа. Плагин получит правила от туда.

1. Создайте TV:
	* Имя параметра: `settings_redirectionRules` (you can specify another name, this is an example).
	* Тип ввода: `Textarea`.
2. Назначьте TV на нужный шаблон.
3. Создайте документ с таким шаблоном. Пусть ID документа будет `42`.


### 2. Настроить (MODX)EvolutionCMS.plugins.ddSendRedirect

На странице плагина во вкладке конфигурации заполните и сохраните следующие данные:
1. Document ID containing redirection rules (документ, содержащий правила переадресаций): `42`.
2. TV name containing redirection rules (имя TV, содержащей правила переадресаций): `settings_redirectionRules`.


### 3. Настроить (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields (опционально)

Вы можете использовать этот интерфейс для большего удобства.

```php
mm_ddMultipleFields([
	'fields' => 'settings_redirectionRules',
	'columns' => [
		[
			'title' => 'URL откуда *',
			'type' => 'textarea',
			'width' => 250
		],
		[
			'title' => 'URL куда *',
			'type' => 'textarea',
			'width' => 250
		]
	]
]);
```

Если вы не хотите использовать mm_ddMultipleFields, вы можете просто вписать JSON вручную в следующем формате:

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


## Описание параметров

* `$docId`
	* Описание: ID документа, содержащего правила переадресаций.
	* Допустимые значения: `integer`
	* **Обязателен**
	
* `$tvName`
	* Описание: Имя TV, содержащей правила переадресаций в JSON (см. Использование выше).
	* Допустимые значения: `string`
	* **Обязателен**


## Ссылки

* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-plugins-ddsendredirect)
* [GitHub](https://github.com/DivanDesign/EvolutionCMS.plugins.ddSendRedirect)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />