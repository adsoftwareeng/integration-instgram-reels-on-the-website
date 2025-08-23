<?php include('header.php'); ?>
<div class="container mt-5 mb-5">
<div class="text-center"> <h1><b>Dynamic Reels</b> </h1></div>
<hr/>
    <div id="instagram-feed" class="row g-0"></div>
</div>
<script>
    const ACCESS_TOKEN = 'YOUR_ACCESS_TOKEN';

    fetch(`https://graph.instagram.com/me/media?fields=APP_ID,media_type,media_url,thumbnail_url,permalink,caption,timestamp&access_token=${ACCESS_TOKEN}`)
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
