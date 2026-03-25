<?php

namespace App\Services\Home;

use App\Models\User;

interface HomeInterface
{
    public function getHomeData(?User $user): array;
}
