<?php
/**
 * Handle all requests
 * 
 * 
 */

$request = $_SERVER['REQUEST_URI'];

// Try to catch any eventids for editevents.php
$requestParams = explode('/', $request);

$editEventId = -1;
$editGalleryId = -1;

// Backend Routing params
if ((is_numeric($requestParams[3])) && (!empty($requestParams[3]))){
    if ($requestParams[2] === 'editevent'){
        $editEventId = $requestParams[3];
    } else if ($requestParams[2] === 'editgallery'){
        $editGalleryId = $requestParams[3];
    }
} else if ((is_numeric($requestParams[2])) && ($requestParams[1]) == 'event-details'){
    $eventDetailsId = $requestParams[2];
}

// Probably a better way to do this.
switch ($request) {
    // Front end Routes
    case '/' :
    case '/index.php':
        require __DIR__ . '/views/index.php';
        break;
    
    // Back end routes
    case '/admin/dashboard':
    case '/admin/dashboard/':
    case '/admin/dashboard.php':
        require __DIR__ . '/views/admin/dashboard.php';
        break;
    case '/admin/contacts':
    case '/admin/contacts/':
    case '/admin/contacts.php':
        require __DIR__ . '/views/admin/contacts.php';
        break;
    case '/admin/events':
    case '/admin/events/':
    case '/admin/events.php':
        require __DIR__ . '/views/admin/events.php';
        break;
    case ($editEventId > -1):
    case '/admin/editevent/' . $editEventId:
        require __DIR__ . '/views/admin/editevent.php';
        break;
    case '/admin/gallery':
    case '/admin/gallery/':
    case '/admin/gallery.php':
        require __DIR__ . '/views/admin/gallery.php';
        break;
    case ($editGalleryId > -1):
    case '/admin/editgallery/' . $editGalleryId:
        require __DIR__ .'/views/admin/editgallery.php';
        break;
    default: 
        require __DIR__ . '/views/404.php';
        break;
}
?>