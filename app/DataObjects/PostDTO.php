<?php

namespace App\DataObjects;

class PostDTO
{
    public function __construct(
        private readonly string $title,
        private readonly string $content,
        private readonly int $category_id,
        private readonly int $user_id,
        private readonly string $image
    ) {
    }

    /**
     * @return array<string, int|string|bool|null>
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'image' => $this->image,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
        ];
    }
}
