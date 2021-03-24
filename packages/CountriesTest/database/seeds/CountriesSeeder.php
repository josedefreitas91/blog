<?php

// namespace BaseExample\database\seeds;

// use Illuminate\Database\Seeder;
// use DB;

// class CountriesSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      *
//      * @return void
//      */
//     public function run()
//     {
//         $data = self::data();

//         DB::transaction(function () use($data) {

//             DB::statement('SET FOREIGN_KEY_CHECKS=0');

//             DB::table('countries')->truncate();

//             DB::table('countries')->insert($data);

//             DB::statement('SET FOREIGN_KEY_CHECKS=1');

//         });
//     }

//     private static function data() {

//         return [
//             [
//                 'id'=> 1,
//                 'name' => 'Argentina'
//             ],
//             [
//                 'id'=> 2,
//                 'name' => 'Chile'
//             ],
//             [
//                 'id'=> 3,
//                 'name' => 'Uruguay'
//             ],
//         ];
//     }
// }