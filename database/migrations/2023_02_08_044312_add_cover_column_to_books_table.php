<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoverColumnToBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('cover')->nullable()->after('tittle');
            $table->string('slug')->nullable()->after('tittle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            if (Schema::hasColumn('books', 'slug')) {
                $table->dropcolumn('slug');
            }
            if (Schema::hasColumn('books', 'cover')) {
                $table->dropcolumn('cover');
            }
        });
    }
}
