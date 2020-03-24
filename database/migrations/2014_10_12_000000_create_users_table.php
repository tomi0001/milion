<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            //$table->primary('id');
            $table->string('login');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('subcategories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->BigInteger("id_categories")->unsigned();
            $table->timestamps();
        });
        Schema::create('questions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            //$table->primary('id');
            $table->string('questions',700);
            $table->string('reply1');
            $table->string('reply2');
            $table->string('reply3');
            $table->string('reply4');
            $table->char('correct_answer',1);
            $table->tinyInteger("level_questions")->unsigned();
            $table->tinyInteger("if_use")->nullable();
            //$table->BigInteger("id_users")->unsigned();
            //$table->foreign("id_users")->references("id")->on("users");
            $table->BigInteger("id_categories")->unsigned();
            $table->foreign("id_categories")->references("id")->on("categories");
            $table->BigInteger("id_subcategories")->unsigned()->nullable();
            //$table->BigInteger("id_users")->unsigned()->nullable();
            //$table->rememberToken();
            $table->timestamps();
        });
        Schema::create('statistics', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            //$table->primary('id');
            $table->dateTime('date');
            $table->string('ip',15);
            $table->string('system')->nullable();
            $table->string('page');
            $table->BigInteger("id_users")->unsigned()->nullable();
            $table->BigInteger("id_questions")->unsigned()->nullable();
            $table->string("what_reply")->nullable();
            //$table->BigInteger("id_users")->unsigned();
            //$table->foreign("id_users")->references("id")->on("users");
            //$table->BigInteger("id_categories")->unsigned();
            //$table->foreign("id_categories")->references("id")->on("categories");
            //$table->BigInteger("id_subcategories")->unsigned();
            //$table->BigInteger("id_users")->unsigned()->nullable();
            //$table->rememberToken();
            $table->timestamps();
        });
        Schema::create('questions_status', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            //$table->primary('id');
            $table->BigInteger('id_questions')->unsigned();
            $table->foreign("id_questions")->references("id")->on("questions");
            $table->BigInteger("id_users")->unsigned();
            $table->foreign("id_users")->references("id")->on("users");
            $table->tinyInteger("level_questions")->unsigned();
  
            //$table->BigInteger("id_users")->unsigned()->nullable();
            //$table->rememberToken();
            $table->timestamps();
        });
        DB::table("users")->insert(
                ["login" => "root"]
                );
        /*
        DB::table("products")->insert([
            ["name" => "nadczo",
                 "how_carolier" => 0  ],
                ["name" => "kawa",
                 "how_carolier" => 0.5  ],
                ["name" => "herbata",
                 "how_carolier" => 1  ],
                ["name" => "cola",
                 "how_carolier" => 40.9  ],
                ["name" => "kurczak",
                 "how_carolier" => 239  ],
                ["name" => "mleko 1%",
                 "how_carolier" => 42.3  ],
                ["name" => "pomarańcze",
                 "how_carolier" => 42.7  ]
                ]);
         * 
         */
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('subcategories');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('statistics');
        Schema::dropIfExists('questions_status');
       
    }
}
