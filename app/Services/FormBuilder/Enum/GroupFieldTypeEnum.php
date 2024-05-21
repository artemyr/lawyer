<?php

namespace App\Services\FormBuilder\Enum;

enum GroupFieldTypeEnum: string
{
    case NUMBER = 'EditNumber';
    case CHECKBOX = 'EditCheckbox';
    case NAME_LINK = 'EditNameLink';
    case TEXT = 'EditText';
    case TEXT_MULTI = 'EditTextMulti';
    case SELECT = 'EditSelect';
    case ICON_SELECT = 'EditIconSelect';
    case SELECT_MULTI = 'EditSelectMulti';
    case SELECT_SEARCH = 'EditSearchSelect';
    case MULTI_SELECT_SEARCH = 'EditMultiSearchSelect';
    case COORDS = 'EditCoords';
}
