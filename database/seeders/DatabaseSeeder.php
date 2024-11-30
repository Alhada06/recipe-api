<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
//        if (Storage::disk('local')->exists('recipes.json')) {
//          dd("exists");
//        }else{
//            dd("not exists");
//        }


   $json= Storage::json('recipes.json');

   foreach($json['recipes'] as $recipe){
//       dd($recipe);
       try {
           $rec=new Recipe();
           $rec->name=$recipe['name'];
           $rec->ingredients=$recipe['ingredients'];
           $rec->instructions=$recipe['instructions'];
           $rec->servings=$recipe['servings'];
           $rec->rating=$recipe['rating'];
           $rec->prepTimeMinutes=$recipe['prepTimeMinutes'];
           $rec->cookTimeMinutes=$recipe['cookTimeMinutes'];
           $rec->image=$recipe['image'];
           $rec->cuisine=$recipe['cuisine'];
           $rec->difficulty=$recipe['difficulty'];
           $rec->save();
       }catch (\Exception $exception){
           dd($exception->getMessage());
       }

   }
    }
}
