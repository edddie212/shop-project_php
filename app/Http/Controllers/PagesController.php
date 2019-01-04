<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Content;



class PagesController extends MainController
{

public function home (){
  self::$data['title'] = 'Home Page';
  return view('contant.home',self::$data);

  }

public function content($url){
Content::getAll($url, self::$data);
return view('contant.content', self::$data);

 }
}
