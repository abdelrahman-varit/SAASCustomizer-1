<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablesCompanyIdBuynoir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

        // Super Channel package migration alterations
        Schema::table('attribute_option_translations', function (Blueprint $table) {
            if (Schema::hasColumn('attribute_option_translations', 'company_id')) {
                
            }else{
                $table->integer('company_id')->unsigned()->nullable();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
    
            }
        });
        Schema::table('orders', function (Blueprint $table) {

            if (Schema::hasColumn('orders', 'company_id')) {
                
            }else{
                $table->integer('company_id')->unsigned()->nullable();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
    
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
        //
    }
}
