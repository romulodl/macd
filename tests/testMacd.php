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

		$this->expectException(Exception::class);

		$macd = new Macd();
		$macd->calculate($values);
	}

	public function testCalculateMacdWithAllValues(): void
	{
		$val = require(__DIR__ . '/values.php');
		$values = [];
		foreach ($val as $v) {
			$values[] = $v[2];
		}

		$macd = new Macd();
		$this->assertSame(152.24, round($macd->calculate($values)[0][0], 2));
		$this->assertSame(275.11, round($macd->calculate($values)[0][1], 2));
	}
}
