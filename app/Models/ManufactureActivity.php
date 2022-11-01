<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ManufactureActivity extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('user_id', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        });
    }

    public static function logActivity($type, $ip, $new = null, $table = null, $old = null)
    {

        if ($type == "create") {

            $description = "User Menambah data {$table} dengan data sbb:";
        } else if ($type == "update") {

            $description = "User Mengubah data {$table} dengan data sbb:";
        } else if ($type == "delete") {

            $description = "User Menghapus data {$table} dengan data sbb:";
        } else if ($type == "logout") {

            $description = "Usser Logout dari sistem manufaktur";
        } else {
            $description = "Usser Login ke sistem manufaktur";
        }

        if (isset($new["created_at"])) {
            unset($new["created_at"]);
        }
        if (isset($new["updated_at"])) {
            unset($new["updated_at"]);
        }
        if (isset($new["deleted_at"])) {
            unset($new["deleted_at"]);
        }
        if (isset($new["password"])) {
            unset($new["password"]);
        }

        if ($new != null) {
            $new = json_encode($new);
        }

        $user_id = Auth::id();
        ManufactureActivity::create([
            "user_id" => $user_id,
            "ip" => $ip,
            "type" => $type,
            "description" => $description,
            "new_value" => $new,
            "old_value" => $old,
            "table" => $table
        ]);
    }
}
