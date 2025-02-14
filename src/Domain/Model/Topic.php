<?php

declare(strict_types=1);

namespace Terricon\Forum\Domain\Model;

class Topic implements IdentityInterface
{
    use UuidIdentityTrait;
    private array $messages;

    public function __construct(
        private string $name,
        string $message,
        User $author
    ) {
        $this->messages[] = new TopicMessage(
            author: $author,
            text: $message,
            topic: $this
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function addMessage(TopicMessage $message): self
    {
        $this->messages[] = $message;

        return $this;
    }
}
