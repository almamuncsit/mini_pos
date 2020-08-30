<?php

use App\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = [
            'name' => 'Jone Done',
            'email' => 'jone@example.com',
            'password' => Hash::make(12345678),
            'phone' => 23423459,
            'email_verified_at' => now()
        ];
        Admin::create($admin);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
