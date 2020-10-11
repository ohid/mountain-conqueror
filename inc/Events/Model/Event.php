<?php declare(strict_types=1); # -*- coding: utf-8 -*-

namespace MConqueror\Events\Model;

use MConqueror\Events\Model\Location;
use MConqueror\Events\Model\ContactPerson;

final class Event
{
    public static function fromPost(\WP_Post $post): Event
    {
        return new static($post);
    }

    public function id(): int
    {
        return 0;
    }

    public function startDate(): \DateTimeImmutable
    {
        return new \DateTimeImmutable('now');
    }

    public function endDate(): \DateTimeImmutable
    {
        return new \DateTimeImmutable('now');
    }
    
    public function registrationEnd(): \DateTimeImmutable
    {
        return new \DateTimeImmutable('now');
    }

    public function includedInPrice(): array
    {
        return [
            'drinks',
            'food',
        ];
    }

    public function subscribedMin(): int
    {
        return 1;
    }

    public function subscribedMax(): int
    {
        return 5;
    }
    

    public function additionalNotes(): string
    {
        return 'Additional information about this event can be found on tour website www.example.com';
    }

    public function location(): Location
    {
        return new Location();
    }

    public function contactPerson(): ContactPerson
    {
        return new ContactPerson();
    }
}
