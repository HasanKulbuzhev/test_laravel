<?php

namespace App;

enum ProxyStatusEnum: int
{
    case CREATED = 1;
    case ERRORS = 0;
    case SUCCESS = 2;
}
