<?php

use App\Enums\GenderTypes;
use App\Enums\MenuPositions;
use App\Enums\PostType;
use App\Enums\RelationshipTypes;
use App\Enums\RequestStatuses;
use App\Enums\SupplementaryInsurancePaymentType;

function getModelsTranslate($model): string
{
    return match ($model) {
        'User' => 'کاربران',
        'Role' => 'نقش ها',
        'Permission' => 'دسترسی‌ها',
        'News' => 'اخبار و اطلاعیه‌ها',
        'Category' => 'دسته بندی‌ها',
        'Configuration' => 'تنظیمات ',
        'NotificationConfiguration' => 'تنظیمات اعلان ',
        'Ticket' => 'تیکت ها',
        'Menu' => 'فهرست ها',
        'Comment' => 'نظرات',
        default => $model,
    };
}

function getMenuPositionName($position): string
{
    return match ($position) {
        MenuPositions::HEADER => 'هدر اصلی',
        MenuPositions::FOOTER => 'فوتر',
        default => $position,
    };
}

function getGenderName($gender): string
{
    return match ($gender) {
        GenderTypes::MALE => 'مرد',
        GenderTypes::FEMALE => 'زن',
        default => $gender,
    };
}

function getRelationshipName($relationship): string
{
    return match ($relationship) {
        RelationshipTypes::SUPERVISOR => 'سرپرست',
        RelationshipTypes::CHILD => 'فرزند',
        RelationshipTypes::FATHER => 'پدر',
        RelationshipTypes::MOTHER => 'مادر',
        RelationshipTypes::WIFE => 'همسر',
        default => $relationship,
    };
}

function getRequestStatusName($gender): string
{
    return match ($gender) {
        RequestStatuses::REQUESTED => 'منتظر بررسی',
        RequestStatuses::CHECKING => 'درحال بررسی توسط کارشناس',
        RequestStatuses::REJECTED => 'رد شده',
        RequestStatuses::CONFIRMED => 'تایید شده',
        default => $gender,
    };
}


function getRequestStatusBadgeClass($status): string
{
    return match ($status) {
        RequestStatuses::REQUESTED => 'badge-warning',
        RequestStatuses::CHECKING => 'badge-light-info',
        RequestStatuses::REJECTED => 'badge-light-danger',
        RequestStatuses::CONFIRMED => 'badge-light-success',
        default => 'badge-secondary',
    };
}

function getPostTypeName($type): string
{
    return match ($type) {
        PostType::NEWS => 'خبر',
        PostType::BLOG => 'بلاگ',
        PostType::PAGE => 'صفحه',
        PostType::PANEL_NOTICE => 'اطلاعیه های داخل پنل',
        default => 'نامشخص'
    };
}
function getSupplementaryInsurancePaymentTypeName($type): string
{
    return match ($type) {
        SupplementaryInsurancePaymentType::PARACLINICAL => 'پاراکلینیکی',
        SupplementaryInsurancePaymentType::HOSPITAL => 'بیمارستانی',
        SupplementaryInsurancePaymentType::INTRODUCTION => 'معرفی نامه',
        default => 'نامشخص'
    };
}