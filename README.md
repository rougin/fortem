# Fortem

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]][link-license]
[![Build Status][ico-build]][link-build]
[![Coverage Status][ico-coverage]][link-coverage]
[![Total Downloads][ico-downloads]][link-downloads]

A collection of form templates for PHP with full support for [alpinejs](https://alpinejs.dev/) properties.

``` php
<div>
  <?= $form->label('Name')->asRequired() ?>
  <?= $form->input('name')->asModel() ?>
</div>
<div>
  <?= $form->label('Description')->asRequired() ?>
  <?= $form->input('detail')->asModel() ?>
</div>
<div>
  <?= $form->button('Update')->onClick('update(id)') ?>
</div>
```

## Installation

Install the package using [Composer](https://getcomposer.org/):

``` bash
$ composer require rougin/fortem
```

## Basic usage

The `FormHelper` class provides an interface for creating labels, inputs, buttons, select dropdowns, and error messages:

``` php
// index.php

use Rougin\Fortem\Helpers\FormHelper;

$form = new FormHelper;

echo $form->label('Name');
```

``` html
<label>Name</label>
```

> [!NOTE]
> See the next sections for the documentation of the abovementioned elements.

The `LinkHelper` class helps in generating and checking URLs to the template:

``` php
use Rougin\Fortem\Helpers\LinkHelper;

$server = array();
$server['HTTP_HOST'] = 'localhost';
$server['REQUEST_URI'] = '/';

$link = new LinkHelper($server);

echo $link; // http://localhost/
```

Use the `isActive` method to check if a given link is the current URL:

``` php
$current = $link->isActive('/'); // true
```

If `HTTP_HOST` is not available, the `setBase` method can be used:

``` php
use Rougin\Fortem\Helpers\LinkHelper;

$data = /** instaceof $_SERVER */;

$link = new LinkHelper($data);

$link->setBase('roug.in')

echo $link; // http://roug.in/
```

## Labels

To create a `<label>` element, the `label` method is used:

``` php
echo $form->label('Name');
```

``` html
<label>Name</label>
```

The `class` attribute can be specified using `withClass`:

``` php
echo $form->label('Name')->withClass('form-label');
```

``` html
<label class="form-label">Name</label>
```

A label can also be marked as required, which adds a red asterisk:

``` php
echo $form->label('Name')->asRequired();
```

``` html
<label>Name <span class="text-danger">*</span></label>
```

## Inputs

To create an `<input>` element, the `input` method is used. By default, it creates a `text` input:

``` php
echo $form->input('name');
```

``` html
<input type="text" name="name">
```

Same from `label`, use `withClass` for the `class` attribute:

``` php
echo $form->input('name')->withClass('form-control');
```

``` html
<input type="text" name="name" class="form-control">
```

The input type can be changed using the `withType` method or the convenient `asEmail` and `asNumber` methods:

``` php
echo $form->input('email')->asEmail();
```

``` html
<input type="email" name="email">
```

``` php
echo $form->input('age')->asNumber();
```

``` html
<input type="number" name="age">
```

## Buttons

To create a `<button>` element, the `button` method is used:

``` php
echo $form->button('Submit');
```

``` html
<button type="button">Submit</button>
```

Use `withClass` method for specifying its `class` attribute:

``` php
echo $form->button('Submit')->withClass('btn btn-primary');
```

``` html
<button type="button" class="btn btn-primary">Submit</button>
```

The button type can be changed using the `withType` method:

``` php
echo $form->button('Submit')->withType('submit');
```

``` html
<button type="submit">Submit</button>
```

## Select dropdowns

To create a `<select>` element, the `select` method is used. An array of items can be passed to populate the options:

``` php
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

## Error messages

The `error` method is used to create a placeholder for validation error messages:

``` php
echo $form->error('error.name');
```

``` html
<template x-if="error.name">
  <p class="text-danger small mb-0" x-text="error.name[0]"></p>
</template>
```

> [!NOTE]
> This is only works when integrated in `alpinejs`.

## Using `alpinejs`

`Fortem` provides methods for seamless integration with [alpinejs](https://alpinejs.dev/).

For `Input` and `Select` classes, the `asModel` method adds an `x-model` attribute to the element, binding its value to its variable:

``` php
echo $form->input('name')->asModel();
```

``` html
<input type="text" name="name" x-model="name">
```

``` php
echo $form->select('gender', $items)->asModel();
```

``` html
<select name="gender" x-model="gender">...</select>
```

In all elements, the `disablesOn` method adds the `:disabled` attribute, allowing an element to be disabled based on its condition:

``` php
echo $form->input('name')->disablesOn('loading');
```

``` html
<input type="text" name="name" :disabled="loading">
```

For the `Button` class, the `onClick` method adds the `@click` attribute to a button, executing its function on click:

``` php
echo $form->button('Submit')->onClick('submitForm');
```

``` html
<button type="button" @click="submitForm">Submit</button>
```

## Scripts

The `script` method helps create a JavaScript object from PHP which is useful for initializing data for `alpinejs`:

``` php
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

## Changelog

Please see [CHANGELOG][link-changelog] for more recent changes.

## Contributing

See [CONTRIBUTING][link-contributing] on how to contribute to the project.

## License

The MIT License (MIT). Please see [LICENSE][link-license] for more information.

[ico-build]: https://img.shields.io/github/actions/workflow/status/rougin/fortem/build.yml?style=flat-square
[ico-coverage]: https://img.shields.io/codecov/c/github/rougin/fortem?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/rougin/fortem.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-version]: https://img.shields.io/packagist/v/rougin/fortem.svg?style=flat-square

[link-build]: https://github.com/rougin/fortem/actions
[link-changelog]: https://github.com/rougin/fortem/blob/master/CHANGELOG.md
[link-contributing]: https://github.com/rougin/fortem/blob/master/CONTRIBUTING.md
[link-coverage]: https://app.codecov.io/gh/rougin/fortem
[link-downloads]: https://packagist.org/packages/rougin/fortem
[link-license]: https://github.com/rougin/fortem/blob/master/LICENSE.md
[link-packagist]: https://packagist.org/packages/rougin/fortem
