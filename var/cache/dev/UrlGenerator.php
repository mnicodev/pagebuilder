<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_twig_error_test' => [['code', '_format'], ['_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception::showAction'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception::cssAction'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    'admin.page' => [[], ['_controller' => 'App\\Controller\\PageBuilderController::index'], [], [['text', '/admin/page']], [], []],
    'admin.page.create' => [[], ['_controller' => 'App\\Controller\\PageBuilderController::builder'], [], [['text', '/admin/page/builder']], [], []],
    'admin.page.edit' => [['slug'], ['_controller' => 'App\\Controller\\PageBuilderController::edit'], ['slug' => '[0-9]*'], [['variable', '/', '[0-9]*', 'slug', true], ['text', '/admin/page/builder']], [], []],
    'admin.page.save' => [[], ['_controller' => 'App\\Controller\\PageBuilderController::save'], [], [['text', '/admin/page/save']], [], []],
    'admin.popup.page.create' => [[], ['_controller' => 'App\\Controller\\PageBuilderController::popupCreate'], [], [['text', '/admin/page/create']], [], []],
    'admin.popup.zone.add' => [[], ['_controller' => 'App\\Controller\\PageBuilderController::popupZoneAdd'], [], [['text', '/admin/zone/add']], [], []],
    'admin.popup.zone.action' => [[], ['_controller' => 'App\\Controller\\PageBuilderController::popupZoneAction'], [], [['text', '/admin/zone/action']], [], []],
    'admin.popup.bloc.action' => [[], ['_controller' => 'App\\Controller\\PageBuilderController::popupBlocAction'], [], [['text', '/admin/bloc/action']], [], []],
    'admin.popup.content.action' => [[], ['_controller' => 'App\\Controller\\PageBuilderController::popupContentAction'], [], [['text', '/admin/content/action']], [], []],
    'admin.popup.content.add' => [[], ['_controller' => 'App\\Controller\\PageBuilderController::popupContentAdd'], [], [['text', '/admin/content/add']], [], []],
    'page.view' => [['id'], ['_controller' => 'App\\Controller\\PageController::index'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/page']], [], []],
];
