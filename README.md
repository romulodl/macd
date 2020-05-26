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
$macd->calculate(array $values, array $previous_values = [], int $short_period = 12, int $long_period = 26);
//returns a float value
```

For example:
```php
$macd = new Romulodl\Macd();
$macd->calculate([10, 12, 14, 20, 14, 10, 11]);
```

#### What is `$previous_values` for?

The EMA calculation (used by the MACD) is based on the previous round of calculation. So the n round depends on n - 1 results.
Then what is n - 1 for the first calculation? If `$previous_values` is not available, it uses a simple moving average
for it. With `$previous_values` set, it will start the calculation of the EMA before and the result will be more
accurate (at least closest to what Trading view shows.)

It is recommended that you use the same ammount of `$values` and `$previous_values` for more accurate results. FOr example, send the previous 26 values when calculating a default MACD(12, 26). 


## Why did you do this?

The PECL Trading extension is crap and not everyone wants to install it.
I am building a trading bot and building more complex trading indicators that uses the MACD as a basic step.
