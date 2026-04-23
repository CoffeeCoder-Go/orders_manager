<?php
namespace App\Utils;

class ViewActionNames {
    private string $update;
    private string $create;

    public function __construct(string $update = "update",string $create = "create"){
        $this->update = $update;
        $this->create = $create;
    }


    public function getUpdate(): string {
        return $this->update;
    }

    public function getCreate(): string {
        return $this->create;
    }
}