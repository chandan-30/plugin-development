<?php
/**
  * Handles an api call to get dummy data
  *
  * outputs an HTML snippet with title and body from retrived data on 'news' CPT
  */
function test_api_call() {
    //check if post is of type news
    if(is_singular('news')){
    //fetching data from remote url
    $data = file_get_contents('https://jsonplaceholder.typicode.com/posts');
    //converting json data into php array
    $posts = json_decode($data);
    //looping through each array element
    foreach($posts as $post){
        ?>
            <h2><?php echo esc_html($post->title); ?></h2>
            <p>
                <?php echo esc_html($post->body);?>
            </p>
        <?php
    }
}
}
    //hooking test_api_call function to action hook
    add_filter('the_content', 'test_api_call');

?>