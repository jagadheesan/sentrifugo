<?php
namespace Application;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'home' => [ // Default route from initial setup, can be ZF's default later
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class, // Assuming it maps to Application\Controller\IndexController
                        'action'     => 'index',
                    ],
                ],
            ],
            'login' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/login',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'login',
                    ],
                ],
            ],
            'welcome' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/welcome',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'welcome',
                    ],
                ],
            ],
            'viewprofile' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/viewprofile',
                    'defaults' => [
                        'controller' => Controller\DashboardController::class,
                        'action'     => 'viewprofile',
                    ],
                ],
            ],
            'viewsettings' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/viewsettings/:tab',
                    'constraints' => [
                        'tab' => '[a-zA-Z0-9_-]*',
                    ],
                    'defaults' => [
                        'controller' => Controller\DashboardController::class,
                        'action'     => 'viewsettings',
                    ],
                ],
            ],
            'changepassword' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/changepassword',
                    'defaults' => [
                        'controller' => Controller\DashboardController::class,
                        'action'     => 'changepassword',
                    ],
                ],
            ],
            'empleavesummary' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/empleavesummary/:status',
                    'constraints' => [
                        'status' => '[a-zA-Z0-9_-]*',
                    ],
                    'defaults' => [
                        'controller' => Controller\EmpleavesummaryController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'approvedrequisitions' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/approvedrequisitions/:status',
                    'constraints' => [
                        'status' => '[a-zA-Z0-9_-]*',
                    ],
                    'defaults' => [
                        'controller' => Controller\ApprovedrequisitionsController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'shortlistedcandidates' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/shortlistedcandidates/:status',
                    'constraints' => [
                        'status' => '[a-zA-Z0-9_-]*',
                    ],
                    'defaults' => [
                        'controller' => Controller\ShortlistedcandidatesController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'empscreening' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/empscreening/con/:status', // Retaining 'con' part of the path
                    'constraints' => [
                        'status' => '[a-zA-Z0-9_-]*',
                    ],
                    'defaults' => [
                        'controller' => Controller\EmpscreeningController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'error' => [ // ZF1 name was error_route
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/error',
                    'defaults' => [
                        'controller' => Controller\ErrorController::class,
                        'action'     => 'error',
                    ],
                ],
            ],
            'policydocuments' => [ // ZF1 name was polidydocs_route
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/policydocuments/id/:id', // Simplified, wildcard part needs specific handling if used
                    'constraints' => [
                        'id' => '[a-zA-Z0-9_-]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\PolicydocumentsController::class,
                        'action'     => 'index',
                    ],
                ],
                // Note: The /* wildcard in ZF1 route might need a child "catch-all" route in Laminas if truly needed.
                // For now, assuming it's for optional parameters after /id/:id which Segment can handle to some extent.
            ],
            'multiplepolicydocuments' => [ // ZF1 name was multiplepolidydocs_route
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/policydocuments/addmultiple/:id',
                    'constraints' => [
                        'id' => '[a-zA-Z0-9_-]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\PolicydocumentsController::class,
                        'action'     => 'addmultiple',
                    ],
                ],
            ],
            'myleaves' => [ // ZF1 name was myleavesroute
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/pendingleaves/:flag',
                    'constraints' => [
                        'flag' => '[a-zA-Z0-9_-]*',
                    ],
                    'defaults' => [
                        'controller' => Controller\PendingleavesController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'display_not_found_strategy' => true,
        'display_exceptions'       => true, // For development
        'doctype'                  => 'HTML5', // From _initViewHelpers
        'template_map' => [
            // 'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml', // Example
            // 'application/index/index' => __DIR__ . '/../view/application/index/index.phtml', // Example
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
            // Path from _initView: APPLICATION_PATH . '/../public/themes/' . $theme . '/templates'
            // This translates to '/app/public/themes/default/templates'
            // This should be added if templates are expected to be resolved from there.
            // For module-specific views, the above __DIR__ . '/../view' is standard.
            '/app/public/themes/default/templates', // Added based on _initView
        ],
    ],
    'view_helpers' => [
        // ZendX_JQuery_View_Helper path was added in ZF1 bootstrap.
        // If these helpers are still needed, they might require a Laminas-compatible version
        // or their functionality replaced. For now, this is a placeholder.
        // 'invokables' => [
        //     'jQuery' => 'ZendX\JQuery\View\Helper\JQuery', // Example, actual class name might differ
        // ],
        // 'helper_paths' => [
        //     'ZendX\JQuery\View\Helper' => APPLICATION_PATH . '/../library/ZendX/JQuery/View/Helper', // If library is kept outside vendor
        // ],
    ],
    // We will add more config here later (controllers, service_manager, etc.)
];
