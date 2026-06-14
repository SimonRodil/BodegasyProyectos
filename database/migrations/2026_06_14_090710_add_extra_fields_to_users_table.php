<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->after('id');
            $table->string('telephone')->nullable()->after('email');
            $table->tinyInteger('rank')->default(1)->after('telephone');
            $table->string('facebook')->nullable()->after('rank');
            $table->string('linkedin')->nullable()->after('facebook');
            $table->string('twitter')->nullable()->after('linkedin');
            $table->string('instagram')->nullable()->after('twitter');
            $table->string('profile_pic')->nullable()->after('instagram');
            $table->text('about_me')->nullable()->after('profile_pic');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'telephone', 'rank', 'facebook', 'linkedin', 'twitter', 'instagram', 'profile_pic', 'about_me']);
        });
    }
};
