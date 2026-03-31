# GS1 AI Laravel Package

This is a Laravel-based package designed to interact with an GS1 Application Identifiers API, providing structured DTOs, collections, and a rule-based engine for working with identifiers, validations, qualifiers, exclusions, and requirements.

---

# Features

* Clean DTO-based architecture
* Laravel-friendly Collection support
* Built-in GS1 API client
* Support for:
  * General identifier metadata
  * Validations
  * Requirements
  * Exclusions
  * Qualifiers
* Logical rule modeling (AND / OR conditions)
* Extensible and testable design
* Ready for caching & advanced parsing

---

# Installation

Install via Composer:

```bash
composer require davidlares/gs1-ai
```

---

# Setup

Run the install command:

```bash
php artisan gs1-ai:install
```

This will publish the configuration file:

```bash
config/gs1.php
```

---

## Configuration

Add your API URL in `.env`:

```env
GS1_AI_API_URL=https://ai.concilier.app/api
```

---

# Basic Usage

```php
use Davidlares\GS1\DTO\Identifier;

$identifier = Identifier::find('01');
```

---

## Accessing General Information

```php
$identifier->ai();
$identifier->description();
$identifier->title();
$identifier->regex();
$identifier->note();
```

---

## Boolean Helpers

```php
$identifier->containSeparator();
$identifier->containDigitalLinkQualifiers();
```

---

## Validations

```php
foreach ($identifier->validations as $validation) {
    $validation->length;
    $validation->fixed_length;
}
```

Helper:

```php
$identifier->amountOfvalidators();
```

---

## Exclusions / Requirements / Qualifiers

```php
foreach ($identifier->exclusions as $rule) {
    $rule->ais();
    $rule->belongsToGroup();
}
```

---

# Concepts

---

## DTO (Data Transfer Objects)

All API responses are converted into structured objects:

* `Identifier`
* `General`
* `Validation`
* `Exclusion` (and similar for rules)

This ensures:

* Type safety
* Clean access (`->` instead of arrays)
* Extensibility

---

## Collections

Array-based sections are converted into Laravel Collections:

```php
$identifier->validations
$identifier->exclusions
$identifier->requirements
$identifier->qualifiers
```

This enables:

```php
$identifier->validations->count();
$identifier->validations->first();
```

---

## Rule Engine

Exclusions, Requirements, and Qualifiers are modeled as logical rules:

* String → single condition
* Array → grouped condition (AND)
* Top-level array → OR

Example:

```php
["02", ["10", "21"]]
```

Meaning:

```
02 OR (10 AND 21)
```

---

# Architecture

```
Identifier
 ├── General
 ├── Validations (Collection)
 │     └── Validation
 ├── Exclusions (Collection)
 │     └── Exclusion (Rule)
 ├── Requirements (Collection)
 └── Qualifiers (Collection)
```

---

# Core Classes

---

## Identifier

Main entry point.

### Methods

* `ai()`
* `description()`
* `title()`
* `regex()`
* `note()`
* `containSeparator()`
* `containDigitalLinkQualifiers()`
* `amountOfvalidators()`

---

## General

Represents metadata of an identifier.

### Methods

* `canBeDigitalLinkPK()`
* `isValidForDataAttributes()`

---

## Validation

Represents a validation rule.

### Properties

* `fixed_length`
* `is_optional`
* `check_digit`
* `length`
* `type`

---

## Exclusion / Requirement / Qualifier

Logical rule representation.

### Methods

* `ais()` → returns involved AIs
* `belongsToGroup()` → indicates AND grouping

---

# Testing

This package supports testing via:

* `orchestral/testbench`

Example setup:

```bash
composer require --dev orchestra/testbench
```

---

# Error Handling

Custom exception:

Example:

```php
try {
    Identifier::find('01');
} catch (\Exception $e) {
    // handle error
}
```

## Credits

- Original Author: [David E Lares](https://davidlares.com/)

## License

- [MIT License](https://opensource.org/licenses/MIT)