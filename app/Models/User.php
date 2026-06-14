<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username', 'name', 'email', 'password', 'rank', 'telephone',
        'facebook', 'linkedin', 'twitter', 'instagram', 'profile_pic', 'about_me',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class, 'asesor');
    }

    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class, 'asesor');
    }

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class, 'asesor');
    }

    public function isAdmin()
    {
        return $this->rank > 1;
    }

    public function isSuperAdmin()
    {
        return $this->id === 1;
    }

    public function getProfilePicUrlAttribute(): string
    {
        return asset('storage/assets/images/profile_pictures/' . ($this->profile_pic ?: 'default.jpg'));
    }

    public function adminlte_profile_url()
    {
        return route('admin.perfil.edit');
    }

    public function adminlte_image()
    {
        return $this->profile_pic_url;
    }

    public function adminlte_desc()
    {
        return $this->rank > 1 ? 'Asesor Ejecutivo' : 'Asesor';
    }
}
