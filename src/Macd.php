<?php

namespace Romulodl;

class Macd
{
	private $ema;

	public function __construct($ema = null) {
		$this->ema = $ema ?: new Ema();
	}

	/**
	 * Calculate the MACD based on this formula
	 * macd: (EMA($short_period) - EMA($long_period))
	 */
	public function calculate(
		array $values,
		array $previous_values = [],
		int $short_period = 12,
		int $long_period = 26
	) : float
	{
		if (empty($values)) {
			throw new \Exception('[' . __METHOD__ . '] $values parameters is empty');
		}

		if (count($values) !== $long_period) {
			throw new \Exception(
				'[' . __METHOD__ . '] $values parameter has to contain ' . $long_period . ' prices'
			);
		}

		$total_values = array_merge($previous_values, $values);
		$short_prev_values = [];
		if (!empty($previous_values) && $total_values >= $short_period * 2) {
			$short_prev_values = array_slice($total_values, (-1 * $short_period) * 2, $short_period);
		}

		return round(
			$this->ema->calculate(array_slice($values, (-1 * $short_period)), $short_prev_values) -
			$this->ema->calculate($values, $previous_values),
			2
		);
	}
}
