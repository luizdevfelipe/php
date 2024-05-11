<?php 
declare(strict_types=1);

namespace App\Enums;

enum HttpMethod: string
{
    case Post = 'POST';
    case Get = 'GET';
    case Put = 'PUT';
    case Head = 'HEAD';
}