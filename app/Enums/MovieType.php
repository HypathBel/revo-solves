<?php

namespace App\Enums;

enum MovieType: int
{
    case REGULAR = 0;
    case NEW_RELEASE = 1;
    case CHILDRENS = 2;
}