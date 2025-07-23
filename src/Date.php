<?php

declare(strict_types=1);

namespace Dagweb\PHPDate;

class Date extends \DateTime
{
    public const string FORMAT_ISO_8601_SHORT = 'Y-m-d';

    /**
     * @throws \DateMalformedStringException
     */
    public function __construct(string $now = 'now', ?\DateTimeZone $timezone = null)
    {
        parent::__construct($now, $timezone);

        $this->setTime(0, 0);
    }

    public static function createFromDateTimeInterface(\DateTimeInterface $datetime): self
    {
        if ($datetime instanceof static) {
            return $datetime;
        }

        return new self($datetime->format('Y-m-d'));
    }

    /**
     * @throws \DateMalformedStringException
     *
     * @psalm-suppress LessSpecificImplementedReturnType
     */
    #[\Override]
    public static function createFromFormat(string $format, string $datetime, ?\DateTimeZone $timezone = null): self|false
    {
        if (false === ($parent = parent::createFromFormat($format, $datetime, $timezone))) {
            return false;
        }

        if ($parent instanceof static) {
            $parent->setTime(0, 0);
        }

        return static::createFromDateTimeInterface($parent);
    }

    #[\Override]
    public function format(string $format = self::FORMAT_ISO_8601_SHORT): string
    {
        return parent::format($format);
    }
}
