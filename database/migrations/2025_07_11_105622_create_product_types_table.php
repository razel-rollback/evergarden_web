<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_types', function (Blueprint $table) {
            $table->id('product_type_id'); // Changed primary key
            $table->string('name'); // Added name column
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('product_type_id')->after('id');

            $table->foreign('product_type_id')
                ->references('product_type_id')
                ->on('product_types')
                ->onDelete('cascade'); // Added foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['product_type_id']); // Dropped foreign key
            $table->dropColumn('product_type_id'); // Dropped column
        });

        Schema::dropIfExists('product_types');
    }
};
