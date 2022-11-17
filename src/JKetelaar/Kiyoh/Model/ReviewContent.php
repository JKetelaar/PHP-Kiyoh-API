<?php

declare(strict_types=1);

/**
 * @author JKetelaar
 */

namespace JKetelaar\Kiyoh\Model;

class ReviewContent
{
    /**
     * ReviewContent constructor.
     */
    public function __construct(
        private string $group,
        private string $type,
        private string $rating,
        private int $order,
        private string $translation
    ) {
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function setGroup(string $group): self
    {
        $this->group = $group;

        return $this;
    }

    public function getRating(): int|bool|string
    {
        $rating = $this->rating;
        return match ($this->getType()) {
            'INT' => (int) $rating,
            'BOOLEAN' => filter_var($rating, FILTER_VALIDATE_BOOLEAN),
            default => (string) $rating,
        };
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setRating($rating): self
    {
        $this->rating = match ($this->getType()) {
            'BOOLEAN' => $this->validateRating($rating),
            default => (string) $rating,
        };

        return $this;
    }

    private function validateRating($rating): string
    {
        if (is_bool($rating)) {
            return $rating ? 'true' : 'false';
        }
        return $rating;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function getTranslation(): string
    {
        return $this->translation;
    }

    public function setTranslation(string $translation): self
    {
        $this->translation = $translation;

        return $this;
    }
}
