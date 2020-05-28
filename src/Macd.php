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
	public function calculate(array $values, int $short_period = 12, int $long_period = 26) : float
	{
		if (empty($values) || count($values) < $long_period) {
			throw new \Exception('[' . __METHOD__ . '] $values parameters is invalid');
		}

		return $this->ema->calculate($values, $short_period) -
			$this->ema->calculate($values, $long_period);
	}
}
