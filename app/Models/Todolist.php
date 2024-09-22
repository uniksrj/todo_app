<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'priority',
        'due_date',
        'is_completed',
        'recurrence',
    ];

    public function getIsOverdueAttribute()
    {
        return $this->due_date < now() && !$this->is_completed;
    }

    public function get_list_by_id($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }
    
}
