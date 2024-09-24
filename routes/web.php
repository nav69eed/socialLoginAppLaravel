<?php

use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\notesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/dashboard',
    [notesController::class, 'showDashboard']
)->middleware(['auth'])->name('dashboard');
Route::get('/note/{uuid}', [notesController::class, 'showNote'])
    ->middleware(['auth'])
    ->name('shownote');
Route::get('/delete/{uuid}', [notesController::class, 'deleteNote'])
    ->middleware(['auth'])
    ->name('deletenote');
Route::post('/create', [notesController::class, 'createNote'])
    ->middleware(['auth'])
    ->name('createnote');
Route::post('/edit/{uuid}', [notesController::class, 'editNote'])
    ->middleware(['auth'])
    ->name('editnotepost');
Route::get('/new', function(){
    return view('new');
})  ->middleware(['auth']);
require __DIR__ . '/auth.php';
// Route::get('/editnote/{uuid}',[notesController::class,'editPost'])->name('editpost')  ->middleware(['auth']);



Route::get('/editnote/{uuid}', function($uuid){
    $note = Note::where('uuid', $uuid)->where('userID', Auth::id())->firstOrFail();
    if ($note) {
        return view('editnote')->with(['note' => $note]);
    }
});
// Route::get('/editnote/', function(){
//     return view('editnote');
// });




















Route::get('/login/facebook/callback', function () {
    try {
        // Retrieve user data from Facebook
        $socialUser = Socialite::driver('facebook')->user();
        
        // Check if a user with this Facebook email already exists in your database
        $user = User::where('email', $socialUser->email)->first();
        
        if ($user) {
            // User with this Facebook email already exists, so log them in
            Auth::login($user);
        } else {
            // User doesn't exist; create a new user in your database
            $newUser = User::create([
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                // Add other user attributes as needed
            ]);

            // Log in the newly created user
            Auth::login($newUser);
        }

        // Redirect to the user's dashboard or any other desired location
        return redirect('/dashboard');
    } catch (\Exception $e) {
        // Handle any exceptions that may occur during the login process
        return redirect('/login')->with('error', 'Facebook login failed. Please try again.');
    }
});






require __DIR__ . '/auth.php';
