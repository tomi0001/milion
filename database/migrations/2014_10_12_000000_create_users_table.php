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
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            //$table->primary('id');
            $table->string('name');
            $table->float('how_carolier',6,2)->unsigned();
            $table->BigInteger("id_users")->unsigned()->nullable();
            //$table->rememberToken();
            $table->timestamps();
        });
        Schema::create("registrations",function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->BigIncrements('id')->unsigned();
            //$table->primary('id');
            $table->datetime('date');
            $table->integer('sugar_measurement')->length(2)->unsigned();
            $table->integer('how_much')->length(2)->unsigned();
            $table->BigInteger("id_users")->unsigned();
            $table->foreign("id_users")->references("id")->on("users");
            $table->BigInteger('id_products')->unsigned();
            //$table->rememberToken();
            $table->timestamps();
        });
        /*
        Schema::create("foods",function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->BigIncrements('id')->unsigned();
            //$table->primary('id');
            $table->string('name');
            $table->integer('sugar_measurement')->length(2)->unsigned();
            $table->integer('how_much')->length(2)->unsigned();
            $table->BigInteger("id_users")->unsigned();
            $table->foreign("id_users")->references("id")->on("users");
            $table->integer('what_food')->unsigned();
            //$table->rememberToken();
            $table->timestamps();
        });
         * 
         */
        DB::table("users")->insert(
                ["login" => "root"]
                );
        DB::table("products")->insert([
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
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('products');
        Schema::dropIfExists('registrations');
       
    }
}
