<?php

namespace App\Dtos;

use Spatie\LaravelData\Data;

class TodoDto extends Data
{
    public function __construct(
        // id에 ?를 붙인 경우는 post의 경우에는 id값이 없음 put의 경우에는 id가 존재
        public readonly ?int $id,
        public readonly string $title,
        public readonly string $description,
        public readonly int $user_id,
    ) {}
}
