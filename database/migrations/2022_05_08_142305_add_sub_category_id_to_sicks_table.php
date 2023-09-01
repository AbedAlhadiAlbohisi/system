<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubCategoryIdToSicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sicks', function (Blueprint $table) {
            //
            $table->foreignId('sub_category_id')->after('user_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sicks', function (Blueprint $table) {
            //
            $table->dropForeign('sikes_sub_category_id_foreign');
            $table->dropColumn('sub_category_id');
        });
    }
}
