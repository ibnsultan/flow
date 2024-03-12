<?php

app()->group('api', function(){

    app()->get('/', fn() => 
        response()->json(['message' => 'Welcome to the Leaf API']));

});