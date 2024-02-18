<?php

namespace App\Services\FormBuilder\Enum;

enum FieldTypeEnum: string
{
    case TEXT = 'text';
    case TEXTAREA = 'textarea';
    case DATE = 'date';
    case CHECKBOX = 'checkbox';
    case RADIO = 'radio';
    case SELECT = 'select';
    case NUMBER = 'number';
}
