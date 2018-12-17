<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'title' => 'Paginating Eloquent Results',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1_lord-of-the-rings-wallpaper-hd.jpg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-01 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 104
        ]);

        DB::table('articles')->insert([
            'title' => 'Some new Article',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1.jpeg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-13 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 11
        ]);
        DB::table('articles')->insert([
            'title' => 'Paginating Eloquent Results',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1_lord-of-the-rings-wallpaper-hd.jpg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-01 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 104
        ]);

        DB::table('articles')->insert([
            'title' => 'Some new Article',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1.jpeg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-13 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 11
        ]);
        DB::table('articles')->insert([
            'title' => 'Paginating Eloquent Results',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1_lord-of-the-rings-wallpaper-hd.jpg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-01 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 104
        ]);

        DB::table('articles')->insert([
            'title' => 'Some new Article',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1.jpeg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-13 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 11
        ]);
        DB::table('articles')->insert([
            'title' => 'Paginating Eloquent Results',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1_lord-of-the-rings-wallpaper-hd.jpg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-01 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 104
        ]);

        DB::table('articles')->insert([
            'title' => 'Some new Article',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1.jpeg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-13 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 11
        ]);
        DB::table('articles')->insert([
            'title' => 'Paginating Eloquent Results',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1_lord-of-the-rings-wallpaper-hd.jpg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-01 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 104
        ]);

        DB::table('articles')->insert([
            'title' => 'Some new Article',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1.jpeg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-13 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 11
        ]);
        DB::table('articles')->insert([
            'title' => 'Paginating Eloquent Results',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1_lord-of-the-rings-wallpaper-hd.jpg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-01 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 104
        ]);

        DB::table('articles')->insert([
            'title' => 'Some new Article',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1.jpeg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-13 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 11
        ]);
        DB::table('articles')->insert([
            'title' => 'Paginating Eloquent Results',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1_lord-of-the-rings-wallpaper-hd.jpg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-01 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 104
        ]);

        DB::table('articles')->insert([
            'title' => 'Some new Article',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1.jpeg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-13 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 11
        ]);
        DB::table('articles')->insert([
            'title' => 'Paginating Eloquent Results',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1_lord-of-the-rings-wallpaper-hd.jpg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-01 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 104
        ]);

        DB::table('articles')->insert([
            'title' => 'Some new Article',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1.jpeg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-13 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 11
        ]);
        DB::table('articles')->insert([
            'title' => 'Paginating Eloquent Results',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1_lord-of-the-rings-wallpaper-hd.jpg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-01 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 104
        ]);

        DB::table('articles')->insert([
            'title' => 'Some new Article',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1.jpeg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-13 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 11
        ]);
        DB::table('articles')->insert([
            'title' => 'Paginating Eloquent Results',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1_lord-of-the-rings-wallpaper-hd.jpg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-01 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 104
        ]);

        DB::table('articles')->insert([
            'title' => 'Some new Article',
            'description' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you ',
            'text' => 'You may also paginate Eloquent queries. In this example, we will paginate the User model with 15 items per page. As you can see, the syntax is nearly identical to paginating query builder results: Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an Illuminate\\Pagination\\Paginator or Illuminate\\Pagination\\LengthAwarePaginator instance, depending on your needs.',
            'active' => 0,
            'picture' => '1.jpeg',
            'video' => null,
            'user_id' => 1,
            'created_at' => '2018-12-13 14:08:55',
            'updated_at' => '2018-12-14 13:26:03',
            'total_views' => 11
        ]);
    }
}
