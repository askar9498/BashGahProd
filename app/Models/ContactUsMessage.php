<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property mixed $first_name
 * @property mixed $last_name
 * @property mixed $email
 * @property mixed $subject
 * @property mixed $message
 * @property mixed|string|null $ip
 * @property mixed|string|null $user_agent
 * @property int $id
 * @property string|null $tracing_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUsMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUsMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUsMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUsMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUsMessage whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUsMessage whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUsMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUsMessage whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUsMessage whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUsMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUsMessage whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUsMessage whereTracingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUsMessage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUsMessage whereUserAgent($value)
 * @mixin \Eloquent
 */
class ContactUsMessage extends Model
{
    use HasFactory;
}
