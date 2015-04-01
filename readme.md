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

แท็ก

ระดับราคาคอนโด
- ULTIMATE เป็นคอนโดระดับบนสุด ราคามากกว่า 200,000 บาทต่อตารางเมตร
- SUPER LUXURY เป็นคอนโดระดับราคาตารางเมตรละ 160,000 - 200,000 บาทต่อตารางเมตร
- LUXURY เป็นคอนโดติดแบรนด์ระดับสูง ราคาเฉลี่ยอยู่ระหว่าง 130,000 - 160,000 บาทต่อตารางเมตร
- HIGH CLASS เป็นคอนโดชั้นสูง ส่วนมากจะทำเลดี เกาะแนวรถไฟฟ้า ราคาเฉลี่ยอยู่ระหว่าง 100,000 - 130,000 บาทต่อตารางเมตร
- UPPER CLASS เป็นคอนโดชั้นดี ทำเลไม่ห่างจากรถไฟฟ้ามาก ราคาเฉลี่ยอยู่ระหว่าง 80,000 - 100,000 บาทต่อตารางเมตร
- MAIN CLASS เป็นคอนโดที่นิยมทำกันมาก จับตลาดลูกค้าระดับกลาง ราคาเฉลี่ยอยู่ระหว่าง 60,000 - 80,000 บาทต่อตารางเมตร
- ECONOMY เป็นคอนโดชั้นประหยัด ราคาเฉลี่ยอยู่ระหว่าง 45,000 - 60,000 บาทต่อตารางเมตร
- SUPER ECONOMY เป็นคอนโดที่ประหยัดสุด ราคาเฉลี่ยอยู่ระหว่าง 30,000 - 45,000 บาทต่อตารางเมตร

ระดับราคา
ต่ำกว่า 1 ล้านบาท
1 - 2 ล้านบาท
2 - 3 ล้านบาท
3 - 5 ล้านบาท
5 - 7 ล้านบาท
7 - 10 ล้านบาท
10 - 15 ล้านบาท
15 - 30 ล้านบาท
30 ล้านบาท ขึ้นไป

