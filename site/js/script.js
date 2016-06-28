$(function() {
	$(window).scroll(function() {
		var scroll = $(window).scrollTop() + 85;

		$('ul.menu li').removeClass('active');
		if (scroll >= $('div.site-area.blog').position().top) {
			$('ul.menu li').removeClass('active');
		} else if (scroll >= $('div.site-area.contact').position().top) {
			$('ul.menu li').eq(4).addClass('active');
		} else if (scroll >= $('div.site-area.about').position().top) {
			$('ul.menu li').eq(3).addClass('active');
		} else if (scroll >= $('div.site-area.students').position().top) {
			$('ul.menu li').eq(2).addClass('active');
		} else if (scroll >= $('div.site-area.testify').position().top) {
			$('ul.menu li').eq(1).addClass('active');
		} else if (scroll >= $('div.home').position().top) {
			$('ul.menu li').eq(0).addClass('active');
		}
	});

	$('ul.menu li a').click(function() {
		var anchor = 'div.' + $(this).attr('href').replace('#', '');
		var pos = $(anchor).position().top - 84;

		$('body:not(:animated)').animate({
			scrollTop: pos
		});

		$('ul.menu li').removeClass('active');
		$(this).parent().addClass('active');
	});

	var slider = $('div.slider');
	if (slider.length > 0) {
		var time = 7000;
		var total = slider.find('li').length - 1;

		if (total == 0) {
			slider.find('span.prev, span.next').hide();
		} else {
			var interval = window.setInterval(function() {
				slider.find('span.next').click();
			}, time);

			slider.find('span.prev').click(function() {
				var idx = slider.find('li.active').index();

				if (idx == 0) {
					slider.find('li').eq(total).addClass('pre-active').fadeIn(500, function() {
						slider.find('.active').removeClass('active');
						$(this).addClass('active').removeClass('pre-active').attr('style', '');
					});
				} else {
					slider.find('.active').prev().addClass('pre-active').fadeIn(500, function() {
						slider.find('.active').removeClass('active');
						$(this).addClass('active').removeClass('pre-active').attr('style', '');
					});
				}
			});

			slider.find('span.next').click(function() {
				var idx = slider.find('li.active').index();

				if (idx == total) {
					slider.find('li').eq(0).addClass('pre-active').fadeIn(500, function() {
						slider.find('.active').removeClass('active');
						$(this).addClass('active').removeClass('pre-active').attr('style', '');
					});
				} else {
					slider.find('.active').next().addClass('pre-active').fadeIn(500, function() {
						slider.find('.active').removeClass('active');
						$(this).addClass('active').removeClass('pre-active').attr('style', '');
					});
				}
			});
		}
	}

	var testify = $('div.testify');
	if (testify.length > 0) {
		var time = 7000;
		var items = testify.find('li');
		var total = slider.find('li').length - 1;

		var interval = window.setInterval(function() {
			if (testify.find('p.pagination span.active').next().length > 0) {
				testify.find('p.pagination span.active').next().click();
			} else {
				testify.find('p.pagination span').eq(0).click();
			}
		}, time);

		testify.find('div.wrap').append('<p class="pagination"></p>');
		for (i = 0; i <= total; i++) {
			testify.find('p.pagination').append('<span>' + (i + 1) + '</span>');
		}

		testify.find('p.pagination span').first().addClass('active');
		testify.find('p.pagination span').click(function() {
			testify.find('p.pagination span').removeClass('active');
			$(this).addClass('active');

			items.eq($(this).index()).addClass('pre-active').fadeIn(500, function() {
				items.removeClass('active').attr('style', '');
				$(this).removeClass('pre-active').addClass('active');
			});
		});
	}

	$.ajax({
		type: 'GET',
		url: 'blog.json',
		success: function(data) {
			var posts = $('div.blog ul');

			for (i = 0; i < data.count; i++) {
				var monthNames = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
				var date = new Date(data.posts[i].date);

				posts.append('\
					<li>\
						<div class="post-head">\
							<a href="' + data.posts[i].url + '"><img src="' + data.posts[i].thumbnail + '" alt="' + data.posts[i].title + '" /></a>\
							<h3><a href="' + data.posts[i].url + '">' + data.posts[i].title + '</a></h3>\
						</div>\
						<p class="excerpt"><a href="' + data.posts[i].url + '">' + data.posts[i].excerpt.replace("<p>", "").replace("</p>", "") + '</a></p>\
						<p class="meta">\
							<span>' + date.getDate() + ' ' + monthNames[date.getMonth()] + ' ' + date.getFullYear() + '</span>\
							' + data.posts[i].author.name + '\
						</p>\
					</li>\
				');
			}
		}
	});

	$('span.responsive_ico_menu, .menu li').click(function() {
		if ($('span.responsive_ico_menu').hasClass('active')) {
			$('.menu').animate({
				left: '-100%'
			}).height('auto');
		} else {
			var h = $(window).innerHeight() - $('.header').outerHeight(true);
			$('.menu').animate({
				left: 0
			}).height(h);
		}
		$('span.responsive_ico_menu').toggleClass('active');
	});
});