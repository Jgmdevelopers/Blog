<?php

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'blog');

//rutas
define('BASE_PATH', dirname(__DIR__));

define('BASE_URL', 'http://localhost/php_avanzado/blog/');
define('PUBLIC_PATH', BASE_URL . 'Public/');
define('ASSETS_PATH', PUBLIC_PATH . 'css/');
define('ASSETS_PATH_JS', BASE_URL . 'js/');
define('COMPONENTS_PATH', BASE_PATH . '/blog/App/Views/Components/');
define('VIEWS_PATH', BASE_URL . 'App/Views/');

//privacidad
define('SVG_PUBLIC', '
<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px" height="25px" viewBox="0 0 204.875 204.875" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M179.143,104.478c6.181-4.165,10.437-12.358,10.437-19.735c0-10.424-8.445-18.861-18.857-18.861 c-1.163,0-2.277,0.137-3.374,0.344c0.006,0,0.013-0.009,0.019-0.009c-4.299-6.963-12.422-13.616-22.365-16.13 c6.18-4.165,10.431-12.357,10.431-19.735c0-10.424-8.439-18.861-18.853-18.861c-10.412,0-18.857,8.442-18.857,18.861 c0,7.377,4.256,15.57,10.431,19.735c-9.944,2.515-18.058,9.167-22.366,16.13c-1.099-0.192-2.208-0.335-3.355-0.335 c-1.148,0-2.256,0.137-3.355,0.335c-4.302-6.963-12.419-13.616-22.365-16.13c6.18-4.165,10.431-12.357,10.431-19.735 c0-10.424-8.443-18.861-18.855-18.861c-10.412,0-18.855,8.442-18.855,18.861c0,7.377,4.253,15.57,10.431,19.735 c-9.944,2.515-18.058,9.167-22.366,16.13c0.006,0,0.012,0.009,0.018,0.009c-1.096-0.201-2.213-0.344-3.373-0.344 c-10.413,0-18.855,8.443-18.855,18.861c0,7.377,4.253,15.57,10.434,19.735C10.948,108.223,0,121.046,0,130.558 c0,5.608,17.071,8.427,34.148,8.427l-9.563-9.572l8.056-19.467h-0.119l-3.124-3.586c1.516,0.548,3.093,0.877,4.725,0.877 c1.635,0,3.212-0.329,4.716-0.865l-3.118,3.574h-0.088l8.056,19.467l-9.566,9.572c5.301,0,10.595-0.273,15.391-0.815 c0-0.013,0.006-0.024,0.006-0.036c-0.018,0.347-0.106,0.663-0.106,1.01c0,7.375,4.253,15.564,10.431,19.729 c-14.769,3.745-25.721,16.568-25.721,26.073c0,5.627,17.074,8.439,34.151,8.439l-9.563-9.572l8.056-19.473h-0.094l-3.124-3.58 c1.513,0.535,3.094,0.877,4.726,0.877c1.635,0,3.212-0.329,4.713-0.877l-3.118,3.58h-0.085l8.056,19.473l-9.566,9.572 c17.074,0,34.151-2.812,34.151-8.439c0-9.499-10.948-22.328-25.721-26.073c6.181-4.165,10.431-12.354,10.431-19.729 c0-10.424-8.442-18.863-18.855-18.863c-1.154,0-2.262,0.134-3.355,0.341c-4.302-6.966-12.419-13.628-22.366-16.137 c6.181-4.165,10.434-12.357,10.434-19.735c0-0.334-0.083-0.648-0.101-0.971v0.006c4.789,0.536,10.086,0.81,15.387,0.81 l-9.563-9.572l8.056-19.467h-0.095l-3.13-3.589c1.513,0.542,3.094,0.88,4.726,0.88c1.635,0,3.212-0.332,4.713-0.874l-3.118,3.577 h-0.085l8.056,19.467l-9.566,9.572c5.3,0,10.601-0.273,15.39-0.81c-0.021,0.329-0.101,0.637-0.101,0.965 c0,7.377,4.253,15.57,10.431,19.735c-7.35,1.857-13.744,5.974-18.319,10.796c10.077,3.143,17.46,12.367,17.652,23.419 c2.968,0.183,6.028,0.286,9.097,0.286l-9.566-9.572l8.056-19.467h-0.091l-3.124-3.58c1.513,0.535,3.09,0.877,4.725,0.877 c1.635,0,3.212-0.329,4.713-0.877l-3.118,3.58h-0.085l8.056,19.467l-9.572,9.578c3.069,0,6.129-0.098,9.098-0.279 c0.194-11.046,7.574-20.289,17.652-23.42c-4.573-4.828-10.979-8.95-18.319-10.802c6.178-4.165,10.434-12.357,10.434-19.735 c0-0.334-0.085-0.642-0.104-0.965c4.792,0.536,10.09,0.81,15.388,0.81l-9.561-9.572l8.05-19.467h-0.085l-3.13-3.589 c1.517,0.542,3.094,0.88,4.726,0.88s3.215-0.332,4.713-0.874l-3.118,3.577h-0.085l8.062,19.467l-9.572,9.572 c5.304,0,10.601-0.273,15.394-0.81v-0.006c-0.024,0.329-0.098,0.643-0.098,0.971c0,7.377,4.25,15.57,10.425,19.735 c-9.944,2.515-18.055,9.164-22.359,16.136c-1.097-0.2-2.211-0.341-3.361-0.341c-10.413,0-18.853,8.446-18.853,18.858 c0,7.38,4.251,15.576,10.431,19.741c-14.778,3.745-25.727,16.568-25.727,26.073c0,5.627,17.074,8.439,34.148,8.439l-9.561-9.572 l8.05-19.473h-0.085l-3.13-3.58c1.517,0.535,3.094,0.877,4.726,0.877s3.215-0.329,4.713-0.877l-3.118,3.58h-0.085l8.062,19.473 l-9.572,9.572c17.074,0,34.154-2.812,34.154-8.439c0-9.499-10.949-22.328-25.721-26.073c6.18-4.165,10.431-12.354,10.431-19.729 c0-0.347-0.086-0.663-0.11-1.01c0,0.012,0.013,0.023,0.013,0.036c4.792,0.542,10.084,0.815,15.388,0.815l-9.566-9.572l8.056-19.467 h-0.091l-3.13-3.586c1.522,0.548,3.093,0.877,4.731,0.877c1.632,0,3.209-0.329,4.713-0.865l-3.118,3.574h-0.091l8.062,19.467 l-9.565,9.572c17.067,0,34.153-2.812,34.153-8.427C204.864,121.053,193.916,108.223,179.143,104.478z M21.677,128.219l-0.797,1.925 l1.474,1.474l4.052,4.049c-14.94-0.761-22.64-3.635-23.315-5.108c0-8.062,9.916-19.577,23.209-23.011l0.749,0.858l1.921,2.204 L21.677,128.219z M55.822,182.607l-0.797,1.93l1.47,1.475l4.056,4.061c-14.94-0.767-22.643-3.641-23.315-5.127 c0-8.05,9.916-19.57,23.208-23.004l0.749,0.864l1.918,2.204L55.822,182.607z M99.32,184.824c-0.691,1.583-8.4,4.481-23.331,5.236 l4.052-4.049l1.471-1.475l-0.798-1.93l-7.289-17.609l1.906-2.192l0.755-0.871C89.389,165.375,99.302,176.896,99.32,184.824z M84.012,139.143c0,6.395-3.803,13.615-9.052,17.147l-1.416,0.95l-1.623,0.584c-1.258,0.451-2.488,0.683-3.654,0.683 s-2.369-0.226-3.678-0.694l-1.589-0.566l-1.422-0.956c-5.252-3.532-9.055-10.753-9.055-17.147c0-8.688,7.063-15.746,15.738-15.746 C76.937,123.396,84.012,130.454,84.012,139.143z M61.854,121.473c0.024-0.013,0.043-0.013,0.067-0.024 c-5.991,2.155-10.574,7.203-12.008,13.518c-2.426,0.292-5.063,0.548-8.074,0.7l4.053-4.049l1.47-1.474l-0.797-1.925l-7.289-17.621 l1.909-2.192l0.752-0.865C50.68,109.806,57.88,115.541,61.854,121.473z M40.81,101.89l-1.416,0.953l-1.623,0.581 c-1.257,0.454-2.487,0.686-3.653,0.686s-2.369-0.226-3.678-0.691l-1.589-0.569l-1.422-0.959c-5.252-3.529-9.055-10.75-9.055-17.147 c0-8.686,7.063-15.743,15.737-15.743c8.674,0,15.738,7.063,15.738,15.743C49.861,91.146,46.059,98.361,40.81,101.89z M55.822,73.818l-0.797,1.928l1.47,1.47l4.056,4.058c-3.014-0.149-5.645-0.411-8.074-0.703 c-1.422-6.278-5.967-11.311-11.917-13.487c3.97-5.949,11.161-11.685,19.878-13.935l0.749,0.859l1.918,2.21L55.822,73.818z M71.922,49.033c-1.258,0.457-2.488,0.688-3.654,0.688s-2.369-0.226-3.678-0.694l-1.589-0.566l-1.422-0.962 c-5.252-3.528-9.055-10.747-9.055-17.147c0-8.683,7.063-15.744,15.738-15.744C76.937,14.607,84,21.674,84,30.351 c0,6.4-3.803,13.619-9.052,17.147l-1.416,0.956L71.922,49.033z M75.99,81.274l4.052-4.052l1.471-1.471l-0.798-1.927l-7.289-17.613 l1.906-2.195l0.755-0.868c8.738,2.25,15.945,8.001,19.912,13.923c-5.961,2.177-10.519,7.209-11.941,13.494 C81.637,80.864,79,81.119,75.99,81.274z M124.122,73.818l-0.804,1.928l1.474,1.47l4.055,4.058 c-3.014-0.149-5.645-0.411-8.074-0.703c-1.425-6.278-5.967-11.311-11.916-13.487c3.97-5.949,11.161-11.685,19.881-13.935 l0.743,0.859l1.924,2.21L124.122,73.818z M140.221,49.033c-1.267,0.457-2.49,0.688-3.653,0.688c-1.169,0-2.375-0.226-3.678-0.694 l-1.596-0.566l-1.425-0.962c-5.249-3.528-9.049-10.747-9.049-17.147c0-8.683,7.063-15.744,15.734-15.744 c8.678,0,15.741,7.066,15.741,15.744c0,6.4-3.807,13.619-9.055,17.147l-1.413,0.956L140.221,49.033z M144.283,81.274l4.049-4.052 l1.474-1.471l-0.791-1.927l-7.295-17.613l1.912-2.195l0.755-0.868c8.731,2.25,15.941,8.001,19.905,13.923 c0.03-0.006,0.055-0.012,0.079-0.018c-6.004,2.158-10.583,7.2-12.02,13.512C149.933,80.864,147.296,81.119,144.283,81.274z M124.122,182.607l-0.804,1.93l1.474,1.475l4.055,4.061c-14.942-0.767-22.642-3.641-23.315-5.127c0-8.05,9.914-19.57,23.206-23.004 l0.749,0.864l1.918,2.204L124.122,182.607z M167.617,184.824c-0.688,1.583-8.397,4.481-23.334,5.236l4.049-4.049l1.474-1.475 l-0.791-1.93l-7.295-17.609l1.912-2.192l0.755-0.871C157.685,165.375,167.598,176.896,167.617,184.824z M143.253,156.29 l-1.412,0.95l-1.62,0.584c-1.267,0.451-2.49,0.683-3.653,0.683c-1.169,0-2.375-0.226-3.678-0.694l-1.596-0.566l-1.425-0.956 c-5.249-3.532-9.049-10.753-9.049-17.147c0-8.688,7.063-15.746,15.734-15.746c8.678,0,15.741,7.063,15.741,15.746 C152.308,145.537,148.502,152.758,143.253,156.29z M158.269,128.219l-0.797,1.925l1.467,1.474l4.056,4.049 c-3.008-0.152-5.65-0.408-8.074-0.7c-1.425-6.284-5.968-11.308-11.917-13.481c3.977-5.955,11.162-11.679,19.882-13.938l0.742,0.858 l1.925,2.204L158.269,128.219z M174.369,103.43c-1.26,0.454-2.484,0.685-3.653,0.685s-2.368-0.226-3.678-0.691l-1.595-0.566 l-1.419-0.962c-5.249-3.528-9.055-10.75-9.055-17.147c0-8.686,7.063-15.744,15.74-15.744c8.671,0,15.74,7.063,15.74,15.744 c0,6.397-3.806,13.619-9.061,17.147l-1.412,0.953L174.369,103.43z M178.424,135.666l4.056-4.049l1.474-1.474l-0.798-1.925 l-7.289-17.621l1.906-2.192l0.755-0.865c13.299,3.435,23.218,14.955,23.23,22.89C201.064,132.013,193.368,134.905,178.424,135.666z "></path> </g> </g></svg>
');
define('SVG_FRIENDS', '<svg fill="#000000" width="25px" height="25px" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style> .cls-1 { fill: none; } </style> </defs> <path d="M25,10H7a3.0033,3.0033,0,0,0-3,3v6a2.0023,2.0023,0,0,0,2,2v7a2.0023,2.0023,0,0,0,2,2h4a2.0023,2.0023,0,0,0,2-2V16H12V28H8V19H6V13a1.0009,1.0009,0,0,1,1-1H25a1.0009,1.0009,0,0,1,1,1v6H24v9H20V16H18V28a2.0023,2.0023,0,0,0,2,2h4a2.0023,2.0023,0,0,0,2-2V21a2.0023,2.0023,0,0,0,2-2V13A3.0033,3.0033,0,0,0,25,10Z" transform="translate(0 0)"></path> <path d="M10,9a4,4,0,1,1,4-4A4.0042,4.0042,0,0,1,10,9Zm0-6a2,2,0,1,0,2,2A2.0023,2.0023,0,0,0,10,3Z" transform="translate(0 0)"></path> <path d="M22,9a4,4,0,1,1,4-4A4.0042,4.0042,0,0,1,22,9Zm0-6a2,2,0,1,0,2,2A2.0023,2.0023,0,0,0,22,3Z" transform="translate(0 0)"></path> <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1" width="32" height="32"></rect> </g></svg>');
define('SVG_PRIVATE', '<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px" height="25px" viewBox="0 0 400 400" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M261.543,166.668h-0.524v-27.582c0-29.719-24.179-53.898-53.896-53.898h-14.239c-29.721,0-53.899,24.18-53.899,53.898 v27.582h-0.524c-8.687,0-15.73,7.047-15.73,15.734v100.313c0,8.689,7.044,15.734,15.73,15.734h123.086 c8.688,0,15.73-7.045,15.73-15.734V182.402C277.273,173.715,270.229,166.668,261.543,166.668z M215.73,246.475 c0,8.688-7.043,15.73-15.73,15.73c-8.688,0-15.73-7.043-15.73-15.73v-19.664c0-8.688,7.042-15.729,15.73-15.729 c8.688,0,15.73,7.043,15.73,15.729V246.475z M230.219,166.668h-60.438v-27.582c0-12.737,10.362-23.098,23.1-23.098h14.239 c12.735,0,23.099,10.36,23.099,23.098V166.668L230.219,166.668z"></path> <path d="M352.987,328.874l1.75-2.132C384.348,290.73,400,246.902,400,200c0-47.661-16.123-92.051-46.63-128.368l-1.699-2.021 l0.917-2.479c1.655-4.473,2.494-9.182,2.494-13.986c0-22.245-18.097-40.342-40.34-40.342c-8.121,0-15.95,2.406-22.644,6.951 l-2.179,1.481l-2.369-1.153C260.23,6.756,230.773,0,200,0c-31.787,0-62.099,7.176-90.095,21.331l-2.526,1.276l-2.26-1.702 c-7.035-5.3-15.419-8.104-24.247-8.104c-22.243,0-40.338,18.097-40.338,40.342c0,5.989,1.288,11.762,3.829,17.157l1.209,2.569 l-1.777,2.215C15.145,110.766,0,153.964,0,200c0,46.902,15.652,90.73,45.262,126.742l1.75,2.132l-1.081,2.537 c-2.128,4.999-3.208,10.311-3.208,15.787c0,22.241,18.097,40.338,40.34,40.338c8.577,0,16.771-2.665,23.7-7.705l2.224-1.616 l2.466,1.219C139.045,393.08,168.837,400,200,400s60.955-6.92,88.546-20.566l2.466-1.219l2.226,1.616 c6.928,5.04,15.123,7.705,23.698,7.705c22.243,0,40.342-18.097,40.342-40.338c0-5.479-1.08-10.788-3.208-15.787L352.987,328.874z M335.038,307.572l-1.998,2.502l-3.028-1.035c-4.221-1.446-8.621-2.184-13.077-2.184c-22.241,0-40.34,18.098-40.34,40.343 c0,1.385,0.073,2.788,0.214,4.171l0.328,3.184l-2.89,1.383c-23.311,11.145-48.29,16.791-74.248,16.791 s-50.939-5.646-74.248-16.791l-2.89-1.383l0.329-3.184c0.141-1.383,0.214-2.786,0.214-4.171c0-22.245-18.097-40.343-40.34-40.343 c-4.456,0-8.855,0.735-13.077,2.184l-3.028,1.035l-1.998-2.502C40.305,276.685,27.273,239.484,27.273,200 c0-39.093,12.793-75.996,36.996-106.714l1.92-2.438l2.969,0.899c3.796,1.151,7.737,1.734,11.714,1.734 c22.243,0,40.34-18.097,40.34-40.338c0-1.104-0.053-2.265-0.166-3.541l-0.267-3.089l2.778-1.378 c23.921-11.853,49.64-17.863,76.442-17.863c25.153,0,49.433,5.323,72.166,15.818l3.04,1.402l-0.438,3.318 c-0.239,1.821-0.361,3.614-0.361,5.332c0,22.241,18.097,40.338,40.339,40.338c5.085,0,10.059-0.945,14.785-2.808l3.115-1.23 l2.097,2.611c24.497,30.519,37.985,68.854,37.985,107.944C372.727,239.484,359.695,276.686,335.038,307.572z"></path> </g> </g> </g> </g></svg>');
define('SVG_PERFIL', '<svg class="icon-menu" width="40px" height="40px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><g id="layer1"><path d="M 10 0 C 4.4830748 0 0 4.4830748 0 10 C 0 15.516925 4.4830748 20 10 20 C 15.516925 20 20 15.516925 20 10 C 20 4.4830748 15.516925 0 10 0 z M 10 1 C 14.976485 1 19 5.0235149 19 10 C 19 12.349397 18.095422 14.478558 16.625 16.080078 L 15.998047 15.878906 L 15.15625 15.646484 L 14.306641 15.449219 L 13.447266 15.287109 L 13.322266 15.25 L 13.212891 15.181641 L 13.125 15.087891 L 13.0625 14.974609 L 13.033203 14.847656 L 13.035156 14.720703 L 13.070312 14.595703 L 13.136719 14.484375 L 13.347656 14.193359 L 13.529297 13.884766 L 13.833984 13.275391 L 14.103516 12.652344 L 14.339844 12.013672 L 14.541016 11.361328 L 14.705078 10.703125 L 14.833984 10.035156 L 14.925781 9.359375 L 14.982422 8.6816406 L 15 8.0019531 L 14.982422 7.5664062 L 14.923828 7.1328125 L 14.830078 6.7070312 L 14.697266 6.2910156 L 14.53125 5.8886719 L 14.330078 5.5 L 14.097656 5.1328125 L 13.830078 4.7871094 L 13.537109 4.4648438 L 13.212891 4.171875 L 12.869141 3.90625 L 12.5 3.6699219 L 12.113281 3.46875 L 11.710938 3.3027344 L 11.294922 3.1699219 L 10.867188 3.0761719 L 10.435547 3.0195312 L 10 3 L 9.5644531 3.0195312 L 9.1328125 3.0761719 L 8.7050781 3.1699219 L 8.2890625 3.3027344 L 7.8867188 3.46875 L 7.5 3.6699219 L 7.1328125 3.90625 L 6.7871094 4.171875 L 6.4628906 4.4648438 L 6.1699219 4.7871094 L 5.9042969 5.1328125 L 5.6699219 5.5 L 5.46875 5.8886719 L 5.3027344 6.2910156 L 5.1699219 6.7070312 L 5.0761719 7.1328125 L 5.0195312 7.5664062 L 5 8.0019531 L 5.0175781 8.6816406 L 5.0742188 9.359375 L 5.1660156 10.035156 L 5.2949219 10.703125 L 5.4589844 11.361328 L 5.6601562 12.013672 L 5.8984375 12.652344 L 6.1660156 13.275391 L 6.4707031 13.884766 L 6.6523438 14.193359 L 6.8632812 14.484375 L 6.9296875 14.595703 L 6.9648438 14.720703 L 6.96875 14.847656 L 6.9375 14.974609 L 6.875 15.087891 L 6.7871094 15.181641 L 6.6777344 15.25 L 6.5527344 15.287109 L 5.6953125 15.449219 L 4.84375 15.646484 L 4.0019531 15.878906 L 3.375 16.080078 C 1.9045777 14.478558 1 12.349397 1 10 C 1 5.0235149 5.0235149 1 10 1 z M 10 4 L 10.392578 4.0195312 L 10.78125 4.078125 L 11.160156 4.1738281 L 11.529297 4.3046875 L 11.886719 4.4746094 L 12.222656 4.6738281 L 12.537109 4.9082031 L 12.830078 5.171875 L 13.091797 5.4628906 L 13.326172 5.7792969 L 13.527344 6.1152344 L 13.695312 6.4707031 L 13.828125 6.8398438 L 13.923828 7.2207031 L 13.982422 7.609375 L 14 8.0019531 L 13.984375 8.6289062 L 13.931641 9.2519531 L 13.845703 9.8710938 L 13.728516 10.486328 L 13.576172 11.09375 L 13.390625 11.693359 L 13.173828 12.279297 L 12.925781 12.855469 L 12.646484 13.416016 L 12.509766 13.644531 L 12.351562 13.865234 L 12.220703 14.0625 L 12.121094 14.279297 L 12.056641 14.509766 L 12.029297 14.748047 L 12.042969 14.986328 L 12.091797 15.220703 L 12.177734 15.443359 L 12.298828 15.652344 L 12.451172 15.835938 L 12.628906 15.996094 L 12.830078 16.123047 L 13.052734 16.216797 L 13.283203 16.273438 L 14.099609 16.427734 L 14.912109 16.615234 L 15.712891 16.835938 L 15.8125 16.867188 C 14.244524 18.195439 12.219491 19 10 19 C 7.7805094 19 5.7554759 18.195439 4.1875 16.867188 L 4.2871094 16.835938 L 5.0878906 16.615234 L 5.9003906 16.427734 L 6.7167969 16.273438 L 6.9472656 16.216797 L 7.1699219 16.123047 L 7.3710938 15.996094 L 7.5507812 15.835938 L 7.7011719 15.652344 L 7.8222656 15.443359 L 7.9101562 15.220703 L 7.9570312 14.986328 L 7.9707031 14.748047 L 7.9433594 14.509766 L 7.8789062 14.279297 L 7.7792969 14.0625 L 7.6484375 13.865234 L 7.4902344 13.644531 L 7.3535156 13.416016 L 7.0742188 12.855469 L 6.8261719 12.279297 L 6.609375 11.693359 L 6.4238281 11.09375 L 6.2734375 10.486328 L 6.1542969 9.8710938 L 6.0683594 9.2519531 L 6.015625 8.6289062 L 6 8.0019531 L 6.0195312 7.609375 L 6.078125 7.2207031 L 6.171875 6.8398438 L 6.3046875 6.4707031 L 6.4726562 6.1152344 L 6.6738281 5.7792969 L 6.9082031 5.4628906 L 7.1699219 5.171875 L 7.4628906 4.9082031 L 7.7773438 4.6738281 L 8.1152344 4.4746094 L 8.4707031 4.3046875 L 8.8398438 4.1738281 L 9.21875 4.078125 L 9.6074219 4.0195312 L 10 4 z " style="fill:#222222; fill-opacity:1; stroke:none; stroke-width:0px;"></path></g></g></svg>');
define('SVG_GLOBAL', '<svg class="icon-menu" width="40px" height="40px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><g id="icomoon-ignore"> </g><path d="M16 2.672c-0.004 0-0.007 0-0.011 0-0.002 0-0.003 0-0.005 0-0.005 0-0.010 0.001-0.016 0.001-7.347 0.017-13.296 5.977-13.296 13.327 0 7.348 5.949 13.309 13.296 13.327 0.005 0 0.010 0.001 0.016 0.001 0.002 0 0.004 0 0.005 0 0.004 0 0.008 0 0.011 0 7.36 0 13.328-5.968 13.328-13.328s-5.968-13.328-13.328-13.328zM16.533 10.648c1.413-0.039 2.788-0.225 4.112-0.548 0.399 1.571 0.647 3.382 0.686 5.367h-4.798v-4.819zM16.533 9.582v-5.759c1.437 0.398 2.893 2.314 3.821 5.252-1.231 0.297-2.509 0.47-3.821 0.507zM15.467 3.81v5.772c-1.323-0.037-2.611-0.213-3.852-0.515 0.936-2.956 2.405-4.879 3.852-5.256zM15.467 10.647v4.82h-4.831c0.039-1.988 0.287-3.801 0.687-5.373 1.334 0.326 2.72 0.515 4.144 0.553zM9.563 15.467h-5.811c0.118-2.741 1.139-5.252 2.773-7.241 1.187 0.654 2.446 1.189 3.766 1.589-0.431 1.7-0.689 3.617-0.728 5.652zM9.563 16.533c0.039 2.034 0.297 3.951 0.728 5.651-1.319 0.401-2.579 0.936-3.766 1.59-1.635-1.989-2.656-4.5-2.773-7.241h5.811zM10.636 16.533h4.831v4.814c-1.424 0.038-2.81 0.228-4.145 0.555-0.399-1.571-0.647-3.383-0.686-5.369zM15.467 22.412v5.778c-1.448-0.378-2.919-2.303-3.854-5.263 1.241-0.302 2.53-0.478 3.854-0.515zM16.533 28.178v-5.765c1.313 0.038 2.591 0.211 3.822 0.508-0.928 2.941-2.384 4.86-3.822 5.257zM16.533 21.347v-4.814h4.798c-0.039 1.983-0.286 3.791-0.684 5.361-1.325-0.323-2.7-0.51-4.113-0.548zM22.404 16.533h5.845c-0.118 2.741-1.138 5.251-2.773 7.24-1.197-0.658-2.467-1.197-3.797-1.599 0.43-1.698 0.687-3.611 0.726-5.64zM22.404 15.467c-0.039-2.033-0.297-3.946-0.727-5.646 1.33-0.402 2.599-0.94 3.795-1.598 1.636 1.989 2.658 4.501 2.776 7.244h-5.845zM24.738 7.409c-1.061 0.564-2.18 1.031-3.35 1.385-0.623-2.005-1.498-3.642-2.533-4.717 2.27 0.545 4.297 1.719 5.883 3.332zM13.103 4.087c-1.029 1.073-1.9 2.702-2.521 4.697-1.158-0.353-2.268-0.815-3.319-1.375 1.575-1.602 3.587-2.774 5.84-3.322zM7.259 24.587c1.052-0.561 2.163-1.024 3.322-1.377 0.621 1.997 1.492 3.629 2.522 4.702-2.255-0.549-4.268-1.721-5.844-3.326zM18.855 27.922c1.036-1.075 1.911-2.712 2.535-4.721 1.17 0.355 2.29 0.82 3.351 1.387-1.586 1.614-3.614 2.791-5.886 3.334z" fill="#000000"> </path></g></svg>');
define('SVG_LOGOUT', '  <svg width="40px" height="40px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2a9.985 9.985 0 0 1 8 4h-2.71a8 8 0 1 0 .001 12h2.71A9.985 9.985 0 0 1 12 22zm7-6v-3h-8v-2h8V8l5 4-5 4z"></path></g></g></svg>');

