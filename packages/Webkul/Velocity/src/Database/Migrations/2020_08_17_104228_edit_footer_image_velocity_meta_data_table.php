<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditFooterImageVelocityMetaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('velocity_meta_data', function (Blueprint $table) {
            if(!Schema::hasColumn('velocity_meta_data','footer_image')){
                $table->text('footer_image')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('velocity_meta_data', function (Blueprint $table) {
            //
        });
    }
}
