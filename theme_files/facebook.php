<?php

require __DIR__ . '/includes/facebook/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '333817067380493',
    'app_secret' => '40aa30c097211288d0bdc7af91c67c38',
    'default_graph_version' => 'v3.1'
    ]);

    $access_token =  'EAAEvmte4nw0BAJu3sG372toXhpRKMJ5eioKEPWjpOT1eKk9kbiF8SOkSK8IEfsMLEF6QvZAZBdOtMchGkFQbsDipmchwD9wWX2i1TQHKb4cK2uHE2bCdXNt5Sn4SklnUZCnLpo0qAQ57i4DIxPpkxiK0QnnEcDY55lgGZAS1nh5yOWFnk6I64vVK6zlG6nLeYgNz4YZBBPQZDZD';


    try {
      // Returns a `Facebook\FacebookResponse` object
      $response = $fb->get('/564993593940832?fields=feed.limit(3){created_time,message,attachments,from},name,link', $access_token );
      $postBody = $response->getDecodedBody(); // for Array resonse
      $graphNode = $response->getGraphNode()->asJson();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }

$json = json_decode($graphNode, true);

//var_dump($graphNode);
echo '<div id="page-info" class=" col-md-12">';
  echo '<div id="page-name"><a href="'.$json['link'].'" target="_blank">'.$json['name'].'</a></div>';
  echo '<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FMytestpage-564993593940832%2F&width=384&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=333817067380493" width="384" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>';
echo '</div>';
echo  '<div id="fb-outer" class="col-xs-12 owl-carousel">';

foreach ( $json['feed'] as $key)
{ 
  $userPic = 'https://graph.facebook.com/'.$key['from']['id'].'/picture?type=square';
  echo '<div class="fb-post-outer thumbnail item">';

  echo '<div class="fb-info-msg col-md-8">';

    echo '<div class="fb-post-info col-xs-4">';
      echo '<div class="info-outer name">'.$key['from']['name'].'</div>';
      echo '<div class="info-outer"><img src="'.$userPic.'" alt="profile picture" /></div>';
      echo '<div class="info-outer date">'.$key['created_time']['date'].'</div>';
    echo '</div>';

    echo '<div class="fb-post-msg col-xs-8">'.$key['message'].'</div>';

  echo '</div>';

  
  
  if (isset($key['attachments'])) {
    echo '<div class="fb-post-attac col-md-4">';
    if (isset($key['attachments']['0']['subattachments'])) {

      $count = 0;

      foreach ($key['attachments']['0']['subattachments'] as $src) {
        echo '<div class="post-attac"><img src="'.$src['media']['image']['src'].'" alt="post image" /></div>';
        $count++;
        if($count==4) {
          echo '<div>More..</div>';
          break;
        }; 
      } 

    } else {

      foreach ($key['attachments'] as $src) {
        echo '<div class="post-attac"><img src="'.$src['media']['image']['src'].'" alt="post image" /></div>';
      }
    }
    echo '</div>';
  }
  
 
  echo '</div>'; 
}
echo '</div>'; 
?>