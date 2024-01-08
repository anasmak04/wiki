<?php

namespace App\dao;

interface AdminRepository
{
    public function countUsers();
    public function countCategoies();
    public function countWikis();
}
