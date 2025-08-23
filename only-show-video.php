<?php include('header.php'); ?>
<div class="container">
      <div class="row">
<div class="col-md-12 text-center">
  <h1><b>Only reels without frame</b> </h1> <hr/>
<Br/>
</div>
<div id="instagram-feed"></div>
</div>
<script>
    // Replace with your actual access token
const ACCESS_TOKEN = 'IGAAK2iZCGQubBBZAE14ZAzQ5WU5OLVRsdnNYWmxjb3FmOU95cmRIQ3VBeTkzRTdJYTViTlYxTE4xdTVsRnlJaF9wa1JpOWZAIZAU1LSXdLQ0gxRlZA6T2Y3S3o2eUNNdFFEMkw1cGw3YUhubk1qNlhydDlEYkZARZAmpPald2MHZAoUUc0UQZD';

// HTML container
// document.write('<div id="instagram-feed"></div>');

fetch(`https://graph.instagram.com/me/media?fields=17841476768927737,media_type,media_url,thumbnail_url,permalink,caption,timestamp&access_token=${ACCESS_TOKEN}`)
  .then(res => res.json())
  .then(data => {
    const container = document.getElementById('instagram-feed');
    data.data.forEach(item => {
      if (item.media_type === "VIDEO") {
        const videoHTML = `
          <div class="col-md-4">
            <video controls width="320" height="240" poster="${item.thumbnail_url}">
              <source src="${item.media_url}" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          </div>
        `;
        container.innerHTML += videoHTML;
      }
    });
  })
  .catch(error => {
    console.error('Error fetching Instagram videos:', error);
  });

</script>
