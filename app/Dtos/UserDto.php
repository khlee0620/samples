<?php

namespace App\Dtos;

use Spatie\LaravelData\Data;

// DTO란? VO와의 차이점은?
// DTO - 데이터 전달용, VO - 값 표현용

class UserDto extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email,
    ) {}
}
