<?php include('header.php'); ?>
<div class="container mt-5 mb-5">
<div class="text-center"> <h1><b>Dynamic Reels</b> </h1></div>
<hr/>

    <div id="instagram-feed" class="row g-0"></div>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<script>
    const ACCESS_TOKEN = 'IGAAK2iZCGQubBBZAE14ZAzQ5WU5OLVRsdnNYWmxjb3FmOU95cmRIQ3VBeTkzRTdJYTViTlYxTE4xdTVsRnlJaF9wa1JpOWZAIZAU1LSXdLQ0gxRlZA6T2Y3S3o2eUNNdFFEMkw1cGw3YUhubk1qNlhydDlEYkZARZAmpPald2MHZAoUUc0UQZD';

    fetch(`https://graph.instagram.com/me/media?fields=17841476768927737,media_type,media_url,thumbnail_url,permalink,caption,timestamp&access_token=${ACCESS_TOKEN}`)
  .then(res => res.json())
  .then(data => {
    const container = document.getElementById('instagram-feed');
    data.data.forEach(item => {
        console.log(item);
      if (item.media_type === "VIDEO") {
        const embedHTML = `<div class="col-md-4">
          <blockquote class="instagram-media" data-instgrm-permalink="${item.permalink}" data-instgrm-version="14" style="margin:1em auto; max-width:540px;"></blockquote>
        </div>`;
        container.innerHTML += embedHTML;
      }
    });

    // Load Instagram embed script
    const script = document.createElement('script');
    script.src = 'https://www.instagram.com/embed.js';
    script.async = true;
    document.body.appendChild(script);
  })
  .catch(error => {
    console.error('Error fetching Instagram videos:', error);
  });

 </script>
</body>
</html>
