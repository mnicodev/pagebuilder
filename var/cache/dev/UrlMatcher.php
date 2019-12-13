<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/bloc' => [[['_route' => 'bloc', '_controller' => 'App\\Controller\\BlocController::index'], null, null, null, false, false, null]],
        '/admin/page' => [[['_route' => 'admin.page', '_controller' => 'App\\Controller\\PageBuilderController::index'], null, null, null, false, false, null]],
        '/admin/page/builder' => [[['_route' => 'admin.page.create', '_controller' => 'App\\Controller\\PageBuilderController::builder'], null, null, null, false, false, null]],
        '/admin/page/save' => [[['_route' => 'admin.page.save', '_controller' => 'App\\Controller\\PageBuilderController::save'], null, null, null, false, false, null]],
        '/admin/page/create' => [[['_route' => 'admin.popup.page.create', '_controller' => 'App\\Controller\\PageBuilderController::popupCreate'], null, null, null, false, false, null]],
        '/admin/zone/add' => [[['_route' => 'admin.popup.zone.add', '_controller' => 'App\\Controller\\PageBuilderController::popupZoneAdd'], null, null, null, false, false, null]],
        '/admin/zone/action' => [[['_route' => 'admin.popup.zone.action', '_controller' => 'App\\Controller\\PageBuilderController::popupZoneAction'], null, null, null, false, false, null]],
        '/admin/bloc/action' => [[['_route' => 'admin.popup.bloc.action', '_controller' => 'App\\Controller\\PageBuilderController::popupBlocAction'], null, null, null, false, false, null]],
        '/admin/content/action' => [[['_route' => 'admin.popup.content.action', '_controller' => 'App\\Controller\\PageBuilderController::popupContentAction'], null, null, null, false, false, null]],
        '/admin/content/add' => [[['_route' => 'admin.popup.content.add', '_controller' => 'App\\Controller\\PageBuilderController::popupContentAdd'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/admin/page/builder/([0-9]*)(*:197)'
                .'|/page/([^/]++)(*:219)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        197 => [[['_route' => 'admin.page.edit', '_controller' => 'App\\Controller\\PageBuilderController::edit'], ['slug'], null, null, false, true, null]],
        219 => [
            [['_route' => 'page.view', '_controller' => 'App\\Controller\\PageController::index'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
