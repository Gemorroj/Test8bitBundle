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
    new Gemorroj\Test8bitBundle\Test8bitBundle(),
```

### Requirements:

- PHP >= 5.5.9
- Symfony >= 3.0


### Simple example:

```php
$entity = $this->get('test8bit')->getData('https://raw.githubusercontent.com/Gemorroj/Test8bitBundle/master/Tests/fixtures/success.json');
print_r($entity);
/*
Gemorroj\Test8bitBundle\Entity\Test8bitEntity Object
(
    [locations:Gemorroj\Test8bitBundle\Entity\Test8bitEntity:private] => Array
        (
            [0] => Gemorroj\Test8bitBundle\Entity\Test8bitLocationEntity Object
                (
                    [name:Gemorroj\Test8bitBundle\Entity\Test8bitLocationEntity:private] => Eiffel Tower
                    [coordinates:Gemorroj\Test8bitBundle\Entity\Test8bitLocationEntity:private] => Gemorroj\Test8bitBundle\Entity\Test8bitLocationCoordinateEntity Object
                        (
                            [lat:Gemorroj\Test8bitBundle\Entity\Test8bitLocationCoordinateEntity:private] => Litipk\BigNumbers\Decimal Object
                                (
                                    [value:protected] => 21.12
                                    [scale:Litipk\BigNumbers\Decimal:private] => 2
                                )

                            [long:Gemorroj\Test8bitBundle\Entity\Test8bitLocationCoordinateEntity:private] => Litipk\BigNumbers\Decimal Object
                                (
                                    [value:protected] => 19.56
                                    [scale:Litipk\BigNumbers\Decimal:private] => 2
                                )

                        )

                )

            [1] => Gemorroj\Test8bitBundle\Entity\Test8bitLocationEntity Object
                (
                    [name:Gemorroj\Test8bitBundle\Entity\Test8bitLocationEntity:private] => test
                    [coordinates:Gemorroj\Test8bitBundle\Entity\Test8bitLocationEntity:private] => Gemorroj\Test8bitBundle\Entity\Test8bitLocationCoordinateEntity Object
                        (
                            [lat:Gemorroj\Test8bitBundle\Entity\Test8bitLocationCoordinateEntity:private] => Litipk\BigNumbers\Decimal Object
                                (
                                    [value:protected] => 12.34
                                    [scale:Litipk\BigNumbers\Decimal:private] => 2
                                )

                            [long:Gemorroj\Test8bitBundle\Entity\Test8bitLocationCoordinateEntity:private] => Litipk\BigNumbers\Decimal Object
                                (
                                    [value:protected] => 56.78
                                    [scale:Litipk\BigNumbers\Decimal:private] => 2
                                )

                        )

                )

        )

)
*/
```
