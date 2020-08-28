<?php

// Routes 

Route::set('index.php', function () {
    Home::CreateView('Home');
});

Route::set('home', function () {
    Home::CreateView('Home');
});

Route::set('about-us', function () {
    AboutUs::CreateView('AboutUs');
});

Route::set('specials', function () {
    Specials::CreateView('Specials');
});

Route::set('conditions', function () {
    Conditions::CreateView('Conditions');
});

Route::set('contact-us', function () {
    ContactUs::CreateView('ContactUs');
});

Route::set('routes', function () {
    Routes::CreateView('Routes');
});

Route::set('products', function () {
    Products::CreateView('Products');
});
Route::set('registration', function () {
    Registration::CreateView('RegistrationForm');
});
