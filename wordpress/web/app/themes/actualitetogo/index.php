<?php
use Timber\Timber;
use Timber\PostQuery;
$context = Timber::get_context();
$context['posts'] = new PostQuery();
$template = ['index.twig'];
Timber::render($template, $context);