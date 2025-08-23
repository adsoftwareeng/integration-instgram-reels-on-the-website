<?php include('header.php'); ?>
<h1><b>All Reels</b> </h1> <hr/>
<div id="instagram-feed" class="row"></div>
<h1><b>All Post</b> </h1> <hr/>
<div id="instagram-feed1" class="row"></div>
</div>
<script>
    // Replace with your actual access token
const ACCESS_TOKEN = 'YOUR_ACCESS_TOKEN';

// HTML container
// document.write('<div id="instagram-feed"></div>');

fetch(`https://graph.instagram.com/me/media?fields=APP_ID,media_type,media_url,thumbnail_url,permalink,caption,timestamp&access_token=${ACCESS_TOKEN}`)
  .then(res => res.json())
  .then(data => {
      const feed = document.getElementById('instagram-feed');
      const feed1 = document.getElementById('instagram-feed1');
      data.data.forEach(post => {
        let content = '';
        let content1 = '';

        if (post.media_type === 'IMAGE' || post.media_type === 'CAROUSEL_ALBUM') {
          content1 = `<div class="col-md-4"><a href="${post.permalink}" target="_blank"><img src="${post.media_url}" /></a><br/></div>`;
        } else if (post.media_type === 'VIDEO') {
          content = `<div class="col-md-4">
            <a href="${post.permalink}" target="_blank">
              <video width="300" controls>
                <source src="${post.media_url}" type="video/mp4">
              </video>
            </a><br/></div>`;
        }

        feed.innerHTML += `<div style="margin: 10px;">${content}</div>`;
        feed1.innerHTML += `<div style="margin: 10px;">${content1}</div>`;
      });
    });
</script>
