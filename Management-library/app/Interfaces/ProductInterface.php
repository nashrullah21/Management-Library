<?php

namespace App\Interfaces;

interface ProductInterface
{
    public function findAll();

    public function findById($id);
}
