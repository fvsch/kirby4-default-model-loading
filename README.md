# Kirby 4rc1 issue with using the DefaultPage model class

## Context

Kirby CMS 4 introduces a new optional `DefaultPage` page model class in `site/models/default.php`:

https://getkirby.com/releases/4.0/default-page-model

This model is used when a page type doesn't have a matching model, e.g. a page of type `article` without a matching `ArticlePage` class in `site/models/article.php`.

An issue arises when one wants to create a specific page model that _extends_ the `DefaultPage` model:

```php
<?php // site/models/product.php

class ProductPage extends DefaultPage {
	// …
}
```

In that case, chances are Kirby will not have included `site/models/default.php`, and PHP encounter a fatal error:

> Uncaught Error: Class "DefaultPage" not found in site/models/aaa.php:3

## Steps to reproduce

1. Download this repository
2. Install dependencies with composer: `composer install`
3. Run the PHP dev server with `composer run dev` (uses port `8000`, you can change it in `composer.json`)
4. Open the resulting site (`http://localhost:8000` by default) and visit the three test pages.

By default, everything should work, because there is a custom class autoloader registered in `public/index.php`:

```php
spl_autoload_register(static function ($class) {
	// …
}
```

Comment out or remove this function call and try again to reload the home page or any other test page, and you should see the `Class "DefaultPage" not found` error.
