# Moving Average Convergence/Divergence

Calculate the MACD of giving values.

![Ema](https://github.com/romulodl/macd/workflows/Macd/badge.svg)

## Instalation

```
composer require romulodl/macd
```

or add `romulodl/macd` to your `composer.json`. Please check the latest version in releases.

## Usage

```php
$macd = new Romulodl\Macd();
$macd->calculate(array $values, int $short_period = 12, int $long_period = 26, int $signal_period = 9);
//returns an array values with the macd and signals
//for example
//
[
  [
    100, // macd value
    90 // signal value
  ],
  [
    99, //macd value from the previous candle
    89 // signal value from the previous candle
  ]
]
```

For example:
```php
$macd = new Romulodl\Macd();
$macd->calculate([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26]);
```

## Why did you do this?

The PECL Trading extension is crap and not everyone wants to install it.
I am building a trading bot and building more complex trading indicators that uses the MACD as a basic step.
