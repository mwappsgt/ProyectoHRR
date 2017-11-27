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

Route::get('/', function () {
    return view('index');
});


Route::get('/reservacion', function () {
    return view('reservacion');
});


Route::get('/doble', function () {
    return view('doble');
});

 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// ----------- v:archivos -----------


Route::get('/archivos', function () {
    return view('archivos');
});

Route::post('/addFiles', 'PHPController@addFiles');


// ----------- end ------------------

Route::get('/toursPlantilla', function () {
    return view('toursPlantilla');
});



// ----------- v:contactanos -----------

Route::get('/contactanos', function () {
    return view('contactanos');
});




// ---------------------------------------

Route::post('/verDisponibilidad', 'PHPController@verDisponibilidad');


// Dashboard Routes



Route::get('/inicioDash', function () {
    return view('dashboard.inicio');
});


Route::get('/reservacion', function () {
    return view('dashboard.reservacion');
});


Route::get('/habitaciones', function () {
    return view('dashboard.habitaciones');
});

Route::get('/tours', function () {
    return view('dashboard.tours');
});

Route::get('/empleados', function () {
    return view('dashboard.empleados');
});

Route::get('/calificaciones', function () {
    return view('dashboard.calificaciones');
});


Route::get('/estadisticas', function () {
    return view('dashboard.estadisticas');
});

Route::get('/pagos', function () {
    return view('dashboard.pagos');
});

Route::get('/roles', function () {
    return view('dashboard.roles');
});

Route::get('/usuarios', function () {
    return view('dashboard.usuarios');
});




Route::post('/setInfoHotel', 'Controller@setInfoHotel');
Route::post('/getInfoHotel', 'Controller@getInfoHotel');

Route::post('/getHabitacionesTotales', 'Controller@getHabitacionesTotales');
Route::post('/updateHabitacion', 'Controller@updateHabitacion');
Route::post('/setEnHabitaciones', 'Controller@setEnHabitaciones');
Route::post('/addHabitacion', 'Controller@addHabitacion');

Route::post('/getToursTotales', 'Controller@getToursTotales');
Route::post('/addTour', 'Controller@addTour');
Route::post('/delTour', 'Controller@delTour');
Route::post('/getOneTour', 'Controller@getOneTour');
Route::post('/updateTour', 'Controller@updateTour');

Route::post('/getEmpleados', 'Controller@getEmpleados');
Route::post('/addEmpleado', 'Controller@addEmpleado');



// End


//Google Maps

Route::get('/ubicacion', function () {
    return view('ubicacion');
});



// End


Route::get('/comentarios', function () {
    return view('comentarios');
});


Route::post('/getComents', 'Controller@getComents');
Route::post('/setComents', 'Controller@setComents');

// ----------- v:reservación -----------

Route::get('/confirmReserva', function () {
    return view('confirmReser');
});
Route::get('/postReservacion', 'Controller@postReservacion');


// End

