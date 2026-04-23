<?php

namespace App\Enums;

use App\Utils\ViewActionNames;

enum FormType
{
    case Update;
    case Create;

    public function method(): string {
        return match($this){
            self::Update => "PUT",
            self::Create => "POST"
        };
    }

    public function spoof():bool {
        return $this->method() != "POST";
    }

    public function route(string $prefix = "",ViewActionNames $names = new ViewActionNames()): string{
        return match($this){
            self::Update => $prefix.$names->getUpdate(),
            self::Create => $prefix.$names->getCreate()
        };
    }
}
