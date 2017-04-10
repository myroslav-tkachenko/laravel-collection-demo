<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Example: Basic route

// Route::get('/', function () {
//     return 'Hello, World!';
// });


// Example: Sample website

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('about', function () {
    return view('about');
})->name('page.about');

// Route::get('products', function () {
//     return view('products');
// });

// Route::get('services', function () {
//     return view('services');
// });


// Example: Route verbs

Route::get('/', function () {
    return 'Hello, World!';
});

// Route::post('/', function () {});

// Route::put('/', function () {});

// Route::delete('/', function () {});

// Route::any('/', function () {});

// Route::match(['get', 'post'], '/', function () {});


// // Example: Controller method

// Route::get('/', 'WelcomeController@index');


// // Example: Route parameters

// Route::get('users/{id}/friends', function ($id) {
//     return $id;
// });


// Example: Optional route parameters
// Route::get('users/{id?}', function ($id = 'fallbackId') {
//     //
// });


// Example: Regular expression route constraints

Route::get('users/{id}', function ($id) {
    return $id;
})->where('id', '[0-9]+');
Route::get('users/{username}', function ($username) {
    //
})->where('username', '[A-Za-z]+');

Route::get('posts/{id}/{slug}', function ($id, $slug) {
    //
})->where(['id' => '[0-9]+', 'slug' => '[A-Za-z]+']);


// Example: URL helper
Route::get('url_helper', function () {
    return url('/asdflkjaslfkdj');
});


// Example: Defining route names
Route::get('members/{id}', function () {
    return route('page.about');
    // return route('members.show', ['id' => 14]);
    return route('members.show', ['userId' => 1, 'commentId' => 2, 'opt' => 'a']);
    
})->name('members.show');

// Routes naming conventions:
// photos.index
// photos.create
// photos.store
// photos.show
// photos.edit
// photos.update
// photos.destroy

// route() usage examples:

// Option 1:
// route('users.comments.show', [1, 2])
// // http://myapp.com/users/1/comments/2

// Option 2:
// route('users.comments.show', ['userId' => 1, 'commentId' => 2])
// // http://myapp.com/users/1/comments/2

// Option 3:
// route('users.comments.show', ['commentId' => 2, 'userId' => 1])
// // http://myapp.com/users/1/comments/2

// Option 4:
// route('users.comments.show', ['userId' => 1, 'commentId' => 2, 'opt' => 'a'])
// // http://myapp.com/users/1/comments/2?opt=a


// Example: Defining a route group

Route::group([], function () {
    Route::get('hello', function () {
        return 'Hello';
    });
    Route::get('world', function () {
        return 'World';
    });
});


// Example: Restricting a group of routes to logged-in users only

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    });
    Route::get('account', function () {
        return view('account');
    });
});


// Example: Prefixing a group of routes

Route::group(['prefix' => 'api'], function () {
    Route::get('/', function () {
        echo 'API ROOT';
        return Request::url();
    });
    Route::get('users', function () {
        // Handles the path /api/users
        echo 'API USERS';
        return Request::url();
    });
});


// Example: Subdomain routing (check config)

// Route::group(['domain' => 'my.laravel-demo.dev'], function () {
//     Route::get('/', function ($) {
//         return Request::url();
//     });
// });


// Example: Route group namespace prefixes

// // App\Http\Controllers\ControllerA
// Route::get('/', 'ControllerA@index');

// Route::group(['namespace' => 'API'], function () {
//     App\Http\Controllers\API\ControllerB
//     Route::get('api/', 'ControllerB@index');
// });


// // Example: Route group name prefixes
// Route::group(['as' => 'users.', 'prefix' => 'users'], function () {
//     Route::group(['as' => 'comments.', 'prefix' => 'comments'], function () {
//         // Route name will be users.comments.show
//         Route::get('{id}', function () {
//             return route('users.comments.show', ['14']);
//         })->name('show');

//     });
// });


// // Example: Simple view() usage
// Route::get('/', function () {
//    return view('welcome');
// });


// // Example: Passing variables to views
Route::get('tasks', function () {
    // load 'resources/views/tasks/index.blade.php' or 'resources/views/tasks/index.php'
    return view('tasks.index')
        ->with('tasks', Task::all());

    // share: view()->share('variableName', 'variableValue'); 
});


// Example: generate controller: php artisan make:controller TasksController

// Example: Use Controller class

// Route::get('/', 'TasksController@home');


// Route::get('tasks/create', 'TasksController@create');
// Route::post('tasks', 'TasksController@store');


//Example: Common form input controller method

// TasksController.php
// ...
// public function store()
// {
//     $task = new Task;
//     $task->title = Input::get('title');
//     $task->description = Input::get('description');
//     $task->save();

//     return redirect('tasks');
// }


// Example: Controller method injection via typehinting

// TasksController.php
// ...
// public function store(\Illuminate\Http\Request $request)
// {
//     $task = new Task;
//     $task->title = $request->input('title');
//     $task->description = $request->input('description');
//     $task->save();

//     return redirect('tasks');
// }


// Example: resource controller: php artisan make:controller MySampleResourceController --resource

// Example: Resource controller binding
// routes/web.php
Route::resource('items', 'ItemsController');


// Example: model binding
// Example: Using an explicit route model binding
Route::get('conferences/{conference}', function (Conference $conference) {
    return view('conferences.show')->with('conference', $conference);
});


// Example: list all routes: php artisan route:list
// Example: cache routes: php artisan route:cache
// Example: clear cache: artisan route:clear


// Example: method spoofing

// Route::get(), Route::post(), Route::any(), Route::match().
// Route::patch(), Route::put(), and Route::delete().

// Example: Form method spoofing
// <form action="/tasks/5" method="POST">
//     <input type="hidden" name="_method" value="DELETE">
// </form>


// CSRF:

// Example: CSRF tokens
/*<form action="/tasks/5" method="POST">
    <?php echo csrf_field(); ?>
    <!-- or: -->
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
</form>*/

// for JS:
/* <meta name="csrf-token" content="<?php echo csrf_token(); ?>" id="token"> */


// Example: Different ways to return a redirect

// // Using the global helper to generate a redirect response
// Route::get('redirect-with-helper', function () {
//     return redirect()->to('login');
// });

// // Using the global helper shortcut
// Route::get('redirect-with-helper-shortcut', function () {
//     return redirect('login');
// });

// // Using the facade to generate a redirect response
// Route::get('redirect-with-facade', function () {
//     return Redirect::to('login');
// });

// to() signature:

// function to($to = null, $status = 302, $headers = [], $secure = null)

// // Example: redirect()->route()
// Route::get('redirect', function () {
//     return redirect()->route('conferences.index');
// });

// route() signature:
// function route($to = null, $parameters = [], $status = 302, $headers = [])

// Example: redirect()->route() with parameters
// Route::get('redirect', function () {
//     return redirect()->route('conferences.show', ['conference' => 99]);
// });

// redirect()->back()

// home() redirects to a route named home.

// refresh() redirects to the same page the user is currently on.

// away() allows for redirecting to an external URL without the default URL validation.

// secure() is like to() with the secure parameter set to "true".

// action() allows you to link to a controller and method like this: redirect()->action('MyController@myMethod').

// guest() is used internally by the auth system (discussed in Chapter 9); when a user visits a route he’s not authenticated for, this captures the “intended” route and then redirects the user (usually to a login page).

// intended() is also used internally by the auth system; after a successful authentication, this grabs the “intended” URL stored by the guest() method and redirects the user there.


// Example: redirect with data

// Route::get('redirect-with-key-value', function () {
//     return redirect('dashboard')
//         ->with('error', true);
// });

// Route::get('redirect-with-array', function () {
//     return redirect('dashboard')
//         ->with(['error' => true, 'message' => 'Whoops!']);
// });


// Example: Redirect with form input
// Route::get('form', function () {
//     return view('form');
// });

// Route::post('form', function () {
//     return redirect('form')
//         ->withInput()
//         ->with(['error' => true, 'message' => 'Whoops!']);
// });

/* in the view:
<input name="username" value="<?=
    old('username', 'Default username instructions here');
?>"> */


// Example: Redirect with errors
// Route::post('form', function () {
//     $validator = Validator::make($request->all()), $this->validationRules);

//     if ($validator->fails()) {
//         return redirect('form')
//             ->withErrors($validator)
//             ->withInput();
//     }
// });


// Example: 403 Forbidden aborts
// Route::post('something-you-cant-do', function (Illuminate\Http\Request) {
//     abort(403, 'You cannot do that!');
//     abort_unless($request->has('magicToken'), 403);
//     abort_if($request->user()->isBanned, 403);
// });


// response()->make()
// If you want to create an HTTP response manually, just pass your data into the first parameter of response()->make(): e.g., return response()->make('Hello, World!'). Once again, the second parameter is the HTTP status code and the third is your headers.

// response()->json() and ->jsonp()
// To create a JSON-encoded HTTP response manually, pass your JSON-able content (arrays, collections, or whatever else) to the json() method: e.g., return response()->json(User::all());. It’s just like make(), except it json_encodes your content and sets the appropriate headers.

// response()->download() and ->file()
// To send a file for the end user to download, pass either an SplFileInfo instance or a string filename to download(), with an optional second parameter of the filename: e.g., return response()->download('file501751.pdf', 'myFile.pdf').

// To display the same file in the browser (if it’s a PDF or an image or something else the browser can handle), use response()->file() instead, which takes the same parameters.

