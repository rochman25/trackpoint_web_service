<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['dashboard/login/admin']			= 'LoginController/loginAdmin';
$route['dashboard/traveller']           = 'DashboardController/data_traveller_sum';
$route['dashboard/wisata']              = 'DashboardController/data_wisata_sum';
$route['dashboard/pengelola']           = 'DashboardController/data_pengelola_sum';

$route['wisata']                        = 'WisataController/data_wisata'; //get all data
$route['wisata/pengelola/(:num)']		= 'WisataController/data_wisata_pengelola/$1';
$route['wisata/(:num)']                 = 'WisataController/data_wisata/id/$1'; //get data by id
$route['wisata/admin']['GET']           = 'WisataController/data_ByAdmin'; //get special data to admin
$route['wisata/kategori/(:any)']        = 'WisataController/data_ByKategori'; //get special data by kategori
$route['wisata/recommend']              = 'WisataController/data_ByRecommend'; //get special data by recommend rating
$route['wisata/nearby']                 = 'WisataController/data_ByDistance'; //get special data by distance
$route['wisata/input']                  = 'WisataController/input_data'; //input data
$route['wisata/edit']                   = 'WisataController/edit_data'; //edit data
$route['wisata/delete']                 = 'WisataController/delete_data'; //delete data
$route['wisata/slider']                 = 'WisataController/data_slider';

$route['traveller']                     = 'TravellerController/data_traveller';
$route['traveller/(:num)']              = 'TravellerController/data_traveller/id/$1';
$route['traveller/input']               = 'TravellerController/input_data';
$route['traveller/edit']                = 'TravellerController/edit_data';
$route['traveller/delete']              = 'TravellerController/delete_data';
$route['traveller/checkpoint']          = 'TravellerController/data_checkpoint';


$route['pengelola']                     = 'PengelolaController/data_pengelola';
$route['pengelola/login']				= 'LoginController/loginPengelola';
$route['pengelola/(:num)']              = 'PengelolaController/data_pengelola/id/$1';
$route['pengelola/input']               = 'PengelolaController/input_data';
$route['pengelola/edit']                = 'PengelolaController/edit_data';
$route['pengelola/delete']              = 'PengelolaController/delete_data';


$route['feedback']                      = 'FeedbackController/data_feedback';
$route['feedback/(:num)']               = 'FeedbackController/data_feedback/id/$1';
$route['feedback/input']                = 'FeedbackController/input_data';
$route['feedback/edit']                 = 'FeedbackController/edit_data';
$route['feedback/delete']               = 'FeedbackController/delete_data';
$route['feedback/wisata/(:num)']		= 'FeedbackController/data_feedback_wisata/$1';


$route['response']                      = 'ResponseController/data_response';
$route['response(:num)']                = 'ResponseController/data_response/id/$1';
$route['response/input']                = 'ResponseController/input_data';
$route['response/edit']                 = 'ResponseController/edit_data';
$route['response/delete']               = 'ResponseController/delete_data';



$route['ticket']                        = 'TicketController/data_ticket';
$route['ticket/(:num)']                 = 'TicketController/data_ticket/id/$1';
$route['ticket/input']                  = 'TicketController/input_data';
$route['ticket/edit']                   = 'TicketController/edit_data';
$route['ticket/delete']                 = 'TicketController/delete_data';


$route['driver']                        = 'DriverController/data_driver';
$route['driver/(:num)']                 = 'DriverController/data_driver/id/$1';
$route['driver/input']                  = 'DriverController/input_data';
$route['driver/edit']                   = 'DriverController/edit_data';
$route['driver/delete']                 = 'DriverController/delete_data';

$route['detailTiket']                   = 'DetailTicketController/detail_ticket';
$route['detailTiket/(:any)']            = 'DetailTicketController/detail_ticket_byID';
$route['detailTiket/wisata/(:any)']     = 'DetailTicketController/detail_ticket_byIdWisata';
$route['detailtiket/input']             = 'DetailTicketController/input_data';
$route['detailtiket/edit']              = 'DetailTicketController/edit_data';
$route['detailtiket/delete']            = 'DetailTicketController/delete_data';


//$route['login']['POST'] = 'LoginController/index_post';
$route['login'] = 'LoginController';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
