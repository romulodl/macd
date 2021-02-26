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
		int $short_period = 12,
		int $long_period = 26,
		int $signal_period = 9
	) : array
	{
		if (empty($values) || count($values) < $long_period) {
			throw new \Exception('[' . __METHOD__ . '] $values parameters is invalid');
		}

		$short_ema = array_filter(
			array_reverse($this->ema->calculate($values, $short_period))
		);
		$long_ema = array_filter(
			array_reverse($this->ema->calculate($values, $long_period))
		);

		$macd     = [];
		$macd_val = [];
		foreach ($short_ema as $k => $v) {
			$current_val = $v - $long_ema[$k];
			$macd_val[]  = $current_val;
			$signal_val = 0;
			if (count($macd_val) > $signal_period) {
				$signal_val = $this->ema->calculate($macd_val, $signal_period)[0];
			}

			$macd[] = [
				$current_val,
				$signal_val
			];
		}

		return array_reverse($macd);
	}
}
