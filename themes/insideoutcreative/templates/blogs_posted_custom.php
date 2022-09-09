<?php 
/**
 * 
 * Template Name: Blog_pages_custom
 */
get_header(); 

?>

<section class="pt-5 pb-5 body">
<div class="container">
<div class="row">
<div id="output"></div>
</div>
<div class="row">

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.hubapi.com/cms/v3/blogs/posts?hapikey=96830cc4-ac00-4b89-b66d-533b1e16e443",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {


$response_data = json_decode($response,TRUE);

$post = $response_data['results'];
$post  = array_reverse($post);



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.hubapi.com/cms/v3/blogs/tags?hapikey=96830cc4-ac00-4b89-b66d-533b1e16e443",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: e37e8649-fba8-19b5-12b0-4077a7c3739b"
  ),
));

$result = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
}
$resullt_data = json_decode($result,TRUE);


$tags=array();
$resullt_count=count($resullt_data['results']);
 for($i=0;$i<$resullt_count;$i++){  

$tags[$resullt_data['results'][$i]['id']]=$resullt_data['results'][$i]['name'];

 }
echo '<div class="custom_pagination">';
foreach ($post as $value){  
if($value['currentState'] == 'PUBLISHED'){?>

  <div class="custom_pages col-md-6 pr-lg-5 col-blog text-white  " style="margin-bottom: 50px;">
  <a href="<?php echo  $value['url'];?>" class="text-white "  target="_blank">
  <div class="position-relative overflow-h">
  <div class="overlay position-absolute"></div>
  <img height="420" width="510" src="<?php echo $value['featuredImage']; ?>" >

  <div class="position-absolute w-100 blog-content pl-4 pr-4 pb-4">

  <h3 class="h4"><?php echo $value['htmlTitle']; ?></h3>

  <hr class="border-white">


  <p class=""><?php foreach ($value['tagIds'] as $tags_key=> $tags_value) {echo $tags[$tags_value].", ";}
  ?><?php echo "</br>";?> <?php echo $value['authorName']; ?></p>
  <a href="<?php echo $value['url']; ?>">Read More</a>

  </div>
  </div> 
  </a>
  </div> 

<?php 
     } 
  } 
  echo "</div>";
} 
?>
<!-- pagination -->
<script>
function pagination(){
    var req_num_row=6;
    var $tr=jQuery('.custom_pagination .custom_pages');
    var total_num_row=$tr.length;
    //alert(total_num_row);
    var num_pages=0;
    if(total_num_row % req_num_row ==0){
      num_pages=total_num_row / req_num_row;
    }
    if(total_num_row % req_num_row >=1){
      num_pages=total_num_row / req_num_row;
      num_pages++;
      num_pages=Math.floor(num_pages++);
    }
    for(var i=1; i<=num_pages; i++){
      jQuery('#pagination').append("<a href='' class='custom_href active'>"+i+"</a>");
      jQuery('#pagination').append("<a href='' class='custom_href '>"+i+"</a>");

    }
    $tr.each(function(i){
      jQuery(this).hide();
      if(i+1 <= req_num_row){
        $tr.eq(i).show();
      }
    
    });
    jQuery('#pagination a').click(function(e){
      e.preventDefault();
      $tr.hide();
      var page=jQuery(this).text();
      var temp=page-1;
      var start=temp*req_num_row;
      //alert(start);
      
      for(var i=0; i< req_num_row; i++){
        
        $tr.eq(start+i).show();
      
      }
    });
  }
jQuery('document').ready(function(){
  pagination();

});
</script>
<script>
  jQuery(document).ready(function() {
jQuery(".custom_href").click(function () {
    jQuery(".custom_href").removeClass("active");
    // $(".tab").addClass("active"); // instead of this do the below 
    jQuery(this).addClass("active");   
});
});


</script>
<div class="col-md-12 text-center pt-5  block" id="page_navigation">
  <div id="pagination">
  </div>  
</div>

</div>
</div>
</section>
<style type="text/css">
  .custom_pages{
    width: 50%;
    float: left;
  }

a.custom_href {
    padding: 0px 10px 0 10px;
	color:#1c2e3c;
}
a.active {
    background: #1c2e3c;
    color: #fff;
    padding: 10px;
    margin: 10px;
}
a.custom_href:hover {
    background: #1c2e3c;
    color: #fff;
    padding: 10px;
}
a.custom_href:nth-child(2) {
    display: none;
}
a.custom_href:nth-child(3) {
    display: none;
}
</style>

<?php get_footer(); ?>




