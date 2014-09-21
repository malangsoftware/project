<?php
function get_BasePath($object){
 return base_url('assets/'.$object);
}
function get_SitePath($object){
 return site_url('fashion/'.$object);
}

function imageUrl($object){
 return get_BasePath('img/fashion/'.$object);
}

function cssUrl($object){
 return get_BasePath('css/fashion/'.$object);
}

function scriptUrl($object){
 return get_BasePath('js/fashion/'.$object);
}

function bagImageUrl($object){
 return get_BasePath('product-images/fashion/a/'.$object);
}

function jacketImageUrl($object){
 return get_BasePath('product-images/fashion/a/'.$object);
}

function parfumeImageUrl($object){
 return get_BasePath('product-images/fashion/b/'.$object);
}

function cosmeticImageUrl($object){
 return get_BasePath('product-images/fashion/c/'.$object);
}



//end of file table-helper.php
