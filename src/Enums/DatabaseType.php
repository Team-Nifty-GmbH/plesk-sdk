<?php

declare(strict_types=1);

namespace TeamNifty\Plesk\Enums;

enum DatabaseType: string
{
    case MSSQL = 'mssql';
    case MYSQL = 'mysql';
    case POSTGRESQL = 'postgresql';
}
