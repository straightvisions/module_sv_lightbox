/*jQuery(document).ready(function(){
	jQuery('a[href*=".mp4"], , a[href*="youtube.com/embed/"]').attr('data-lity', '1');
});
*/
	window.addEventListener('load', function() {

		// images
		const images = document.querySelectorAll('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"], a[href*=".webp"], a[href*=".svg"]');
		images.forEach(element =>
			element.addEventListener("click", function(event) {
				event.preventDefault();
				basicLightbox.create('<img src="'+this.getAttribute("href")+'">').show();
			}
		));

		// videos
		const videos = document.querySelectorAll('a[href*=".mp4"]');
		videos.forEach(element =>
			element.addEventListener("click", function(event) {
				event.preventDefault();
				basicLightbox.create('<video controls autoplay playsinline><source src="'+this.getAttribute("href")+'" type="video/mp4"></video>').show();
			}
		));

	});