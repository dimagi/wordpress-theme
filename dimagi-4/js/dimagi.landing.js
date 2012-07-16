var DimagiAsyncImages = function(options) {
	var self = this;
	self.container = (options.container) ? $(options.container) : $('.blurbs');
	
	self.init = function () {
		$(function () {
			$.each(self.container.find('.async-image'), function () {
				$.ajax({
					url: $(this).data('imgsrc'),
					success: loadImage($(this))
				});
			});
		});
	};
	
	var loadImage = function(container) {
		return function (data) {
			var imageLink = container.data('imglink');
			var image = $('<img />').attr('src', container.data('imgsrc'));
			if (imageLink)
				image = $('<a />').attr('href', imageLink).append(image);
			image.attr('style', 'display:none;');
			container.append(image);
			image.fadeIn();
		}	
	};
	
};

var DimagiBannerControl = function (options) {
	var self = this;
	self.banner = options.banner || $('#dimagiBanner');
	
	self.init = function () {
		$(function () {
			restartCarousel();
			$(document).keydown(function(e){
				if (e.keyCode === 39) { 
					self.banner.carousel('next');
					return false;
				}else if(e.keyCode === 37) {
					self.banner.carousel('prev');
					return false;
				}
			});
			
			self.banner.on('slid', function () {
				var active = $(this).find('.active.item');
				var ind = active.parent().find('.item').index(active);
				$('.carousel-control[href="#'+self.banner.attr('id')+'"]').removeClass('on');
				$('.carousel-control[data-slidenum="'+ind+'"]').addClass('on');
				
			});
			$('.dimagi-carousel-controls .carousel-control').click(function () {
				restartCarousel;
				var carouselId = $(this).attr('href');
				$(carouselId).carousel(parseInt($(this).data('slidenum')));
				return false;
			});
			self.banner.find('article').click(function () {
				window.location=$(this).find('hgroup h2 a').attr('href');
			});
		});
	};
	
	var restartCarousel = function () {
		self.banner.carousel({
			interval: 5000,
			pause: "hover"
		});
	};
}

$(function () {
	$('footer .social a').tooltip();
});

