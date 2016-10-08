<?php
// Routes

$app->get('/', \JeremyGiberson\Controllers\MvcTopCommits::class);

$app->get('/refresh', \JeremyGiberson\Controllers\ClearCache::class);