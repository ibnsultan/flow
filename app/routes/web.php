<?php

app()->get('/', fn() => render('welcome'));


app()->group('app', function(){

    app()->get('home', 'App\HomeController@home');


});

app()->get('test', function() {
    
    echo auth()->user()['role'];

});
