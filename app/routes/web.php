<?php

app()->get('/', fn() => render('welcome'));

app()->get('/test', 'Test@index');

# Application routes
