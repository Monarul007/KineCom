<?php

namespace App\Providers;

use App\GeneralSetting;
use Request;
use App\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $GenSettings = GeneralSetting::first();
        $category = Category::where('parent_id', 0)->limit(10)->get();
        $subMenuArray = array();
        
        $src = substr (Request::root(), 7);
        foreach($category as $cat){
            $catid = $cat['id'];
            $cat_url = $cat['url'];
            $subcategory = Category::where('parent_id', $catid)->limit(3)->get();

            $count = $subcategory->count();
            if($count > 0){
                $subMenuDiv = "<li class='menu-item-has-children'><a href='/category/".$cat['url']."'>".$cat['name']."</a>";
            }else{
                $subMenuDiv = "<li><a href='/category/".$cat['url']."'>".$cat['name']."</a>";
            }
            
            if($subcategory->count() > 0){
                $subMenuDiv .= "<ul id=sub-$catid class='category-mega-menu'>";
                foreach($subcategory as $subcat){

                    $subcatid = $subcat['id'];
                    $subcaturl = $subcat['url'];
                    $subcatname = $subcat['name'];
                    $subcatparent = $subcat['parent_id'];
                        
                    $subMenuDiv .= "<li class='menu-item-has-children'><a href='/category/".$subcaturl."'>$subcatname</a>";
                    
                    $subMenuDiv .= "<ul>";
                    
                    $subsubcategory = Category::where('parent_id', $subcatid)->limit(6)->get();
                    
                    foreach($subsubcategory as $subsubcat){
                    
                        $subsubcatid = $subsubcat['id'];
                        $subsubcaturl = $subsubcat['url'];
                        $subsubcatname = $subsubcat['name'];
                        $subsubcatparent = $subcat['parent_id'];
                        //$subMenuDiv .= "<li><a href= $src.'/".$subsubcatid."'>".$subsubcatname."</a></li>";
                        $subMenuDiv .= "<li><a href='/category/".$subsubcaturl."'>$subsubcatname</a></li>";
                    }
                    $subMenuDiv .= "</ul></li>";
                }
                $subMenuDiv .= "</ul>";
            }
            $subMenuDiv .= "</li>";
            $subMenuArray[] = $subMenuDiv;
            
        }
        view()->share('GenSettings',$GenSettings);
        view()->share('subMenuArray',$subMenuArray);
    }
    
}
