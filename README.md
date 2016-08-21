Test8bitBundle
==================

Тестовое задание 8bit


### Installation:

- Add to composer.json:

```json
{
    "require": {
        "gemorroj/test8bit-bundle": "dev-master"
    }
}
```

- Add to AppKernel.php:
```php
    new Gemorroj\Test8bitBundle\GemorrojTest8bitBundle(),
```

### Requirements:

- PHP >= 5.5.9
- Symfony >= 3.0


### Simple example:

```php
$entity = $this->get('test8bit')->getData('http://example.com');
print_r($entity);
```
