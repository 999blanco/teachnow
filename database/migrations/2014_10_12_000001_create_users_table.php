<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{   
    private $social = [
        "instagram" => null,
        "linkedin" => null,
        "github" => null,
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            
            $table->string('profile-banner', 2048)->nullable()->default('default-profile-banner.png');
            $table->string('avatar', 2048)->nullable()->default('default-avatar.png');
            $table->string('phone')->nullable();
            $table->string('title')->nullable();
            $table->string('city')->nullable();
            $table->foreignId('region_id')->nullable()->constrained()->onDelete('set null');            
            $table->string('country')->nullable()->default('España');
            $table->text('about_me')->nullable();
            $table->json('social')->default(json_encode($this->social));
            $table->json('education')->nullable();

            $table->float('price_per_hour')->nullable();

            $table->boolean('banned')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
