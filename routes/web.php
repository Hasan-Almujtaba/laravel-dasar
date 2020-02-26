<?php
use App\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// redirect
// Route::get('/', function () {
//     return redirect('/about');
// });

// // return string
// Route::get('/about', function() {
//     return 'Hi, this is about page';
// });

// return data array
// Route::get('/blog', function(){
//     $posts = [
//         ['id' => '1', 'title' => 'Post 1', 'body' => 'Body post 1'  ],
//         ['id' => '2', 'title' => 'Post 2', 'body' => 'Body post 2'  ],
//         ['id' => '3', 'title' => 'Post 3', 'body' => 'Body post 3'  ],
//         ['id' => '4', 'title' => 'Post 4', 'body' => 'Body post 4'  ],
//     ];

//     echo '<ul>';
//     foreach($posts as $p) {
//         echo '<li> <a href="'. route('post.detail', $p['id']) .'">' . $p['title'] . '</a></li>';
//     }
//     echo '</ul>';
// });

// alias route
// Route::get('/post/{id}', ['as' => 'post.detail',function($id){
//     echo "Post $id";
//     echo "<br>";
//     echo "Body post id $id";
// } ] );

// // Routing Controller
// Route::get('/blog', 'PostController@index');
// Route::get('/post/create', 'PostController@create');
// Route::post('/post/store', 'PostController@store');

Route::get('/', function () {
  echo 'Main Menu';
});

Route::resource('post', 'PostController');

Route::get('/insert', function(){
  $data = [
    'user_id' => 2, 
    'title' => 'Belajar Laravel Pemula', 
    'body' => 'Nuevelus Octa'
  ];
  DB::table('posts')->insert($data);
});

Route::get('/read', function(){
  $result =  DB::table('posts')->get();

  var_dump($result);
});

Route::get('/update', function(){
  $data = [
    'title' => 'Ini sudah diubah',
    'body' => 'ini juga'
  ];
  $result = DB::table('posts')->where('id', 1)->update($data);
  
  var_dump($result);
});

Route::get('/delete', function(){
  $result = DB::table('posts')->where('id', 1)->delete();

  var_dump($result);
});

Route::get('/posts', function() {
  $posts = Post::all();
  return $posts;
});

Route::get('/find', function() {
  $post = Post::find(5);
  return $post;
});

Route::get('/findwhere', function() {
  // $posts = Post::where('user_id', 2)->orderBy('id', 'desc')->get();
  $posts = Post::where('user_id', 2)->orderBy('id', 'desc')->take(1)->get();
  return $posts;
});

Route::get('/create', function() {
  $post = new Post();

  $post->title = 'Judul Postingan Baru';
  $post->body = 'Isi Postingan Baru';
  $post->user_id = 3;

  $post->save();
});

Route::get('/createpost', function() {
  $data = [
    'title' => 'Dibuat dengan create',
    'body' => 'Isi Postingan',
    'user_id' => 2
  ];

  $post = Post::create($data);
});

Route::get('/updatepost', function () {
  $data = [
    'title' => 'Dibuat dengan create',
    'body' => 'Isi Postingan',
    'user_id' => 5
  ];

  $post = Post::find(5);

  $post->update($data);
});

Route::get('/deletepost', function() {
  // $post = Post::find(4);
  // $post->delete();
  // $data = [7,8];
  // $post = Post::destroy($data);
  $post = Post::where('user_id', 3);
  $post->delete();
});

Route::get('/softdelete', function() {
  Post::destroy(2);
});

Route::get('/trash', function(){
  $post = Post::withTrashed()->get();
  return $post;
});

Route::get('/trashonly', function(){
  $post = Post::onlyTrashed()->get();
  return $post;
});

Route::get('/restore', function(){
  $post = Post::onlyTrashed()->restore();
  return $post;
});

Route::get('/forcedelete', function () {
  $post = Post::onlyTrashed()->forceDelete();
  return $post;
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
