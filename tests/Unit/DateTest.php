<?php

declare(strict_types=1);

namespace Dagweb\PHPDate\Tests\Unit;

use Dagweb\PHPDate\Date;
use Dagweb\PHPDate\Tests\AbstractTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class DateTest extends AbstractTestCase
{
    #[DataProvider('getJsonDataProvider')]
    public function testFromDateTime(string $inputDateTime, string $expectedDate): void
    {
        $dateTime = new \DateTime($inputDateTime);
        $date = Date::createFromDateTimeInterface($dateTime);

        static::assertDate($expectedDate, $date);
    }

    #[DataProvider('getJsonDataProvider')]
    public function testFromDate(string $inputDate, string $expectedDate): void
    {
        $originalDate = new Date($inputDate);
        $date = Date::createFromDateTimeInterface($originalDate);

        static::assertDate($expectedDate, $date);
    }

    #[DataProvider('getJsonDataProvider')]
    public function testCreateFromFormat(string $inputFormat, string $inputDateString, string $expectedDate): void
    {
        $date = Date::createFromFormat($inputFormat, $inputDateString);

        static::assertDate($expectedDate, $date);
    }

    #[DataProvider('getJsonDataProvider')]
    public function testFailNewDate(string $inputDateString): void
    {
        static::expectException(\DateMalformedStringException::class);

        new Date($inputDateString);
    }

    #[DataProvider('getJsonDataProvider')]
    public function testFailCreateFromFormat(string $inputFormat, string $inputDateString): void
    {
        static::assertFalse(Date::createFromFormat($inputFormat, $inputDateString));
    }

    private static function assertDate(string $expectedDate, Date $date): void
    {
        static::assertSame($expectedDate, $date->format());
        static::assertSame('00:00:00', $date->format('H:i:s'));
    }
}
