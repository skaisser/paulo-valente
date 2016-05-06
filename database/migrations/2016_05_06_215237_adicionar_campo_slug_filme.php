<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionarCampoSlugFilme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('filmes', function (Blueprint $table) {
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filmes', function (Blueprint $table) {
            $table->dropColumn('slug');

          });
    }
}
