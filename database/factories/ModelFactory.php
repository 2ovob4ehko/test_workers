<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Employees::class, function (Faker\Generator $faker) {
    $image = $faker->imageUrl(400,600,'people'); //fake image address
    $filename = time().mt_rand(0,1000).'.jpg'; //new file name for thumb
    $thumbPath = public_path('photo/thumb/'.$filename); //real path for new thumb
    $imagePath = public_path('photo/'.$filename); //real path for new image
    try{
        Image::make($image)->save($imagePath); //save new image
    }catch(\Intervention\Image\Exception\NotReadableException $e){
        Image::make(public_path('photo/exception.jpg'))->save($imagePath); //save new image
    }
    Image::make($imagePath)->fit(50,75)->save($thumbPath); //save new thumb
    return [
        'name' => $faker->name,
        'position' => $faker->jobTitle,
        'recruited' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'salary' => mt_rand(100*100,50000*100)/100,
        'photo' => '/photo/'.$filename,
        'thumb' => '/photo/thumb/'.$filename,
    ];
});