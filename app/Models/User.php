<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;


/**
 * 
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $employee_number
 * @property string $national_id
 * @property string $start_date
 * @property string $end_date
 * @property int $retired_year
 * @property string $birth_date
 * @property string|null $cellphone
 * @property string|null $email
 * @property int $is_admin
 * @property Carbon|null $email_verified_at
 * @property mixed|null $password
 * @property int $status
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read File|null $photo
 * @property-read Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static UserFactory factory($count = null, $state = [])
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User onlyTrashed()
 * @method static Builder|User permission($permissions, $without = false)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null, $without = false)
 * @method static Builder|User whereBirthDate($value)
 * @method static Builder|User whereCellphone($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereEmployeeNumber($value)
 * @method static Builder|User whereEndDate($value)
 * @method static Builder|User whereFirstName($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIsAdmin($value)
 * @method static Builder|User whereLastName($value)
 * @method static Builder|User whereNationalId($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereRetiredYear($value)
 * @method static Builder|User whereStartDate($value)
 * @method static Builder|User whereStatus($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User withTrashed()
 * @method static Builder|User withoutPermission($permissions)
 * @method static Builder|User withoutRole($roles, $guard = null)
 * @method static Builder|User withoutTrashed()
 * @property int $last_post
 * @property string $insurance_number
 * @property string $birth_certificate_number
 * @property-read File|null $birthCertificateImage
 * @property-read File|null $nationalCardImage
 * @method static Builder|User whereBirthCertificateNumber($value)
 * @method static Builder|User whereInsuranceNumber($value)
 * @method static Builder|User whereLastPost($value)
 * @property string|null $club_membership_date
 * @property string|null $club_validity_date
 * @property int|null $photo_id
 * @property int|null $birth_certificate_image_id
 * @property int|null $national_card_image_id
 * @method static Builder|User whereBirthCertificateImageId($value)
 * @method static Builder|User whereClubMembershipDate($value)
 * @method static Builder|User whereClubValidityDate($value)
 * @method static Builder|User whereNationalCardImageId($value)
 * @method static Builder|User wherePhotoId($value)
 * @mixin Eloquent
 */
class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    public function photo(): BelongsTo
    {
        return $this->belongsTo(File::class, 'photo_id');
    }

    public function birthCertificateImage(): BelongsTo
    {
        return $this->belongsTo(File::class, 'birth_certificate_image_id');
    }

    public function nationalCardImage(): BelongsTo
    {
        return $this->belongsTo(File::class, 'national_card_image_id');
    }
}
