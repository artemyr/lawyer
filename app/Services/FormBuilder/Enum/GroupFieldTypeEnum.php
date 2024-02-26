<?php

namespace App\Services\FormBuilder\Enum;

enum GroupFieldTypeEnum: string
{
    case NUMBER = 'EditNumber';
    case CHECKBOX = 'EditCheckbox';
    case NAME_LINK = 'EditNameLink';
    case TEXT = 'EditText';
    case SELECT = 'EditSelect';
    case SELECT_MULTI = 'EditSelectMulti';
    case SELECT_SEARCH = 'EditSearchSelect';
    case COORDS = 'EditCoords';
}
