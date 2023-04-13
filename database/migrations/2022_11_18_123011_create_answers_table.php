<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->nullable(false);
            $table->string('instagramUser')->nullable();
            $table->string('phone')->nullable()->unique();

            $table->string('name1')->nullable();
            $table->string('name2')->nullable();
            $table->text('loveStory')->nullable();

            $table->date('weddingDate')->nullable();
            $table->string('weddingPlace')->nullable();

            $table->string('shopName')->nullable();
            $table->string('shopKeepersName')->nullable();
            $table->text('companions')->nullable();
            $table->text('shoppingExperience')->nullable();

            $table->text('finalDressEmotion')->nullable();
            $table->foreignId('designer_id')->nullable()->constrained('designers');
            $table->string('dressModel')->nullable();
            $table->text('dressDescription')->nullable();
            $table->text('dressOpinion')->nullable();
            $table->text('dressComplements')->nullable();

            $table->text('weddingExperience')->nullable();
            $table->text('peopleDressedWithUs')->nullable();

            $table->string('photoCopyRights')->nullable();

            $table->text('providers')->nullable();

            $table->dateTime('published_at')->nullable();
            $table->boolean('isNewsletterAccepted')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
