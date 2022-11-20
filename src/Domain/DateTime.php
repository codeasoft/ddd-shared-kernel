<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain;

use DateTimeImmutable;

abstract class DateTime
{
    final public function __construct(
        public readonly Instant $instant,
    ) {
    }

    abstract public static function by(DateTimeImmutable $dateTime): self;

    public static function asOf(Clock $clock): self
    {
        return new static($clock->instant());
    }

    public static function sinceThen(self $that): self
    {
        return new static($that->instant);
    }

    public function equals(self $that): bool
    {
        return $this->instant->equals($that->instant);
    }

    public function laterThan(self $that): bool
    {
        return $this->instant->compare($that->instant) > 0;
    }

    public function laterThanOrEqualTo(self $that): bool
    {
        return $this->instant->compare($that->instant) >= 0;
    }

    public function earlierThan(self $that): bool
    {
        return $this->instant->compare($that->instant) < 0;
    }

    public function earlierThanOrEqualTo(self $that): bool
    {
        return $this->instant->compare($that->instant) <= 0;
    }

    public function isBetweenInclusive(self $from, self $to): bool
    {
        return $this->laterThanOrEqualTo($from) && $this->earlierThanOrEqualTo($to);
    }

    public function isBetweenExclusive(self $from, self $to): bool
    {
        return $this->laterThan($from) && $this->earlierThan($to);
    }

//    public function modify(Seconds $seconds): self
//    {
//        return new static($this->instant->shift($seconds));
//    }
//
//    public function difference(self $that): DateTimeInterval
//    {
//        return new DateTimeInterval($this, $that);
//    }

    public function date(): Date
    {
        return Date::by($this->asNative());
    }

    public function time(): Time
    {
        return Time::by($this->asNative());
    }

    public function iso6801(): string
    {
        return $this->asNative()->format(DATE_ATOM);
    }

    abstract protected function asNative(): DateTimeImmutable;
}
