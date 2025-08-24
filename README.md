# Fortem

A collection of form template helpers for PHP.

## Installation

Install the package using [Composer](https://getcomposer.org/):

``` bash
$ composer require rougin/fortem
```

## Basic usage

`Fortem` provides the following helpers for creating HTML templates:

### Form Helper

The `FormHelper` class is the primary way to generate form-related HTML elements. It provides a fluent interface for creating labels, inputs, buttons, select dropdowns, and error messages:

``` php
use Rougin\Fortem\Helpers\FormHelper;

$form = new FormHelper;

// ...
```

### Labels

To create a `<label>` element, the `label` method is used:

``` php
<?php

// ...

echo $form->label('Name');
```

``` html
<label>Name</label>
```

The `class` attribute can be specified in its second argument:

``` php
<?php

// ...

echo $form->label('Name', 'form-label');
```

``` html
<label class="form-label">Name</label>
```

A label can also be marked as required, which adds a red asterisk:

``` php
<?php

// ...

echo $form->label('Name')->asRequired();
```

``` html
<label>Name <span class="text-danger">*</span></label>
```

### Inputs

To create an `<input>` element, the `input` method is used. By default, it creates a `text` input:

``` php
<?php

// ...

echo $form->input('name');
```

``` html
<input type="text" name="name">
```

Same from `label`, its second argument is for the `class` attribute:

``` php
<?php

// ...

echo $form->input('name', 'form-control');
```

``` html
<input type="text" name="name" class="form-control">
```

The input type can be changed using the `withType` method or the convenient `asEmail` and `asNumber` methods:

``` php
<?php

// ...

echo $form->input('email')->asEmail();
```

``` html
<input type="email" name="email">
```

``` php
<?php

// ...

echo $form->input('age')->asNumber();
```

``` html
<input type="number" name="age">
```

### Buttons

To create a `<button>` element, the `button` method is used:

``` php
<?php

// ...

echo $form->button('Submit');
```

``` html
<button type="button">Submit</button>
```

Use the second argument for specifying its `class` attribute:

``` php
<?php

// ...

echo $form->button('Submit', 'btn btn-primary');
```

``` html
<button type="button" class="btn btn-primary">Submit</button>
```

The button type can be changed using the `withType` method:

``` php
<?php

// ...

echo $form->button('Submit')->withType('submit');
```

``` html
<button type="submit">Submit</button>
```

### Select dropdowns

To create a `<select>` element, the `select` method is used. An array of items can be passed to populate the options:

``` php
<?php

// ...

$items = array('Male', 'Female');

echo $form->select('gender', $items);
```

``` html
<select name="gender">
  <option value="">Please select</option>
  <option value="0">Male</option>
  <option value="1">Female</option>
</select>
```

An associative array with `id` and `name` keys can also be provided:

``` php
$items = [ array('id' => 'm', 'name' => 'Male') ];
$items[] = array('id' => 'f', 'name' => 'Female');

echo $form->select('gender', $items);
```

``` html
<select name="gender">
  <option value="">Please select</option>
  <option value="m">Male</option>
  <option value="f">Female</option>
</select>
```

### Error messages

The `error` method is used to create a placeholder for validation error messages:

``` php
<?php

// ...

echo $form->error('error.name');
```

``` html
<template x-if="error.name">
  <p class="text-danger small mb-0" x-text="error.name[0]"></p>
</template>
```

> [!NOTE]
> This is only works when integrated in `alpinejs`.

### Integration to `alpinejs`

`Fortem` provides several methods for seamless integration with [alpinejs](https://alpinejs.dev/).

The `asModel` method adds the `x-model` attribute to an input or select element, binding its value to its variable:

``` php
<?php

// ...

echo $form->input('name')->asModel();
```

``` html
<input type="text" name="name" x-model="name">
```

``` php
<?php

// ...

echo $form->select('gender', $items)->asModel();
```

``` html
<select name="gender" x-model="gender">...</select>
```

The `disablesOn` method adds the `:disabled` attribute, allowing an element to be disabled based on its variable:

``` php
<?php

// ...

echo $form->input('name')->disablesOn('loading');
```

``` html
<input type="text" name="name" :disabled="loading">
```

The `onClick` method adds the `@click` attribute to a button, executing its function on click:

``` php
<?php

// ...

echo $form->button('Submit')->onClick('submitForm');
```

``` html
<button type="button" @click="submitForm">Submit</button>
```

### Scripts

The `script` method helps create a JavaScript object from PHP. This is useful for initializing data for `alpinejs`:

``` php
<?php

// ...

echo $form->script('data')
    ->with('name', 'John Doe')
    ->with('age', 30)
    ->withLoading()
    ->withError();
```

``` html
<script>
    let data = {"name":"John Doe","age":30,"loading":false,"error":{}};
</script>
```

### Link Helper

The `LinkHelper` class helps in generating and checking URLs:

``` php
use Rougin\Fortem\Helpers\LinkHelper;

$server = array();
$server['HTTP_HOST'] = 'localhost';
$server['REQUEST_URI'] = '/';

$link = 'http://localhost';

$link = new LinkHelper($link, $server);

echo $link->getCurrent();
```

Use the `isCurrent` method to check if a given link is the current URL:

``` php
$current = $link->isCurrent('/');
```

## Change log

See [CHANGELOG](CHANGELOG.md) for more recent changes.

## Development

Includes tools for code quality, coding style, and unit tests.

### Code quality

Analyze code quality using [phpstan](https://phpstan.org/):

``` bash
$ phpstan
```

### Coding style

Enforce coding style using [php-cs-fixer](https://cs.symfony.com/):

``` bash
$ php-cs-fixer fix --config=phpstyle.php
```

### Unit tests

Execute unit tests using [phpunit](https://phpunit.de/index.html):

``` bash
$ composer test
```
