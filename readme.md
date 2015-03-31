## How to dev webapp by use Laravel PHP Framework::Allofhome

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Generate migration file

```
php artisan make:migration create_geo_region_table
```

## Run migration file

```
php artisan migrate
```

## Generate database seed file
Need to install "laracasts/generators": "dev-master" before.

```
php artisan make:seed geo_region
```


## Run seeder

```
php artisan db:seed
```
or specific seeder class, ensure that you have created models
```
php artisan db:seed --class GeoRegionTableSeeder

```

## Create models by command line
```
php artisan make:model --no-migration geoRegion
```
