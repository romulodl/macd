<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Romulodl\Macd;

final class MacdTest extends TestCase
{
	public function testCalculateMacdWithWrongTypeValues(): void
	{
		$this->expectException(Exception::class);

		$macd = new Macd();
		$macd->calculate(['poop']);
	}

	public function testCalculateMacdWithEmptyValues(): void
	{
		$this->expectException(Exception::class);

		$macd = new Macd();
		$macd->calculate([]);
	}

	public function testCalculateMacdWithInvalidValues(): void
	{
		$values = [
			9310.73
		];
		//15/05/2020

		$this->expectException(Exception::class);

		$macd = new Macd();
		$macd->calculate($values);
	}

	public function testCalculateMacdWithDefaultValues(): void
	{
		$values = [
			6825.29,
			6838,
			7120.06,
			7483.35,
			7504.11,
			7534.01,
			7694.17,
			7774,
			7735.75,
			8784.20,
			8624.76,
			8830.52,
			8975.18,
			8900,
			8873.98,
			9022.78,
			9148.27,
			9995,
			9807.49,
			9550.67,
			8719.53,
			8561.09,
			8808.71,
			9305.91,
			9786.80,
			9310.73
		];
		//15/05/2020

		$macd = new Macd();
		$this->assertSame(393.77, $macd->calculate($values));
	}

	public function testCalculateMacdWithAllValues(): void
	{
		$previous_values = [
			6673.41,
			6733.76,
			6353.64,
			6230.95,
			5876.27,
			6391.08,
			6407.10,
			6641.51,
			6791.63,
			6729.80,
			6851.10,
			6768.90,
			7325.73,
			7192.90,
			7357.66,
			7278.65,
			6857.82,
			6874.18,
			6900.52,
			6834,
			6864.11,
			6616.89,
			7098.15,
			7022.44,
			7242.42,
			7118.03
		];

		$values = [
			6825.29,
			6838,
			7120.06,
			7483.35,
			7504.11,
			7534.01,
			7694.17,
			7774,
			7735.75,
			8784.20,
			8624.76,
			8830.52,
			8975.18,
			8900,
			8873.98,
			9022.78,
			9148.27,
			9995,
			9807.49,
			9550.67,
			8719.53,
			8561.09,
			8808.71,
			9305.91,
			9786.80,
			9310.73
		];
		//15/05/2020

		$macd = new Macd();
		$this->assertSame(494.57, $macd->calculate($values, $previous_values, 12, 26));
	}
}
