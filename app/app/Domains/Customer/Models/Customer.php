<?php

namespace App\Domains\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CustomerFactory;

/**
 *
 *
 * @OA\Schema(
 * required={"email"},
 * @OA\Xml(name="Customer"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="first_name", type="string", maxLength=50, example="John"),
 * @OA\Property(property="last_name", type="string", maxLength=50, example="Doe"),
 * @OA\Property(property="email", type="string", format="email", description="Customer unique email address", example="customer@gmail.com"),
 * @OA\Property(property="phone_number", type="string",description="Customer phone number"),
 * @OA\Property(property="bank_account_number", type="string", format="string", description="bank account number"),
 * @OA\Property(property="date_of_birth", type="date", format="date", description="Date of birth customer", example="1990-02-25"),
 * @OA\Property(property="created_at", type="string", format="date-time", description="Initial creation timestamp", readOnly="true"),
 * @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp", readOnly="true")
 * )
 *
 * Class Customer
 */
class Customer extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'bank_account_number',
        'date_of_birth',
    ];

    protected static function newFactory()
    {
        return new CustomerFactory();
    }
}
