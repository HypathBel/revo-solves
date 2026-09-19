<?php

namespace App\Application\Statements;

class StatementFactory
{
    public static function make(string $type): StatementFormatterInterface
    {
        return match ($type) {
            'text' => new TextStatementFormatter(),
            'html' => new HtmlStatementFormatter(),
            'xml' => new XmlStatementFormatter(),
            default => throw new \InvalidArgumentException("Invalid statement type: $type"),
        };
    }
}