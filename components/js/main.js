var $j = jQuery.noConflict();

$j(function() {
	var $_b = $j('html, body');
	var $_w = $j(window);
	var tableBreakpoint = 768;
	var templateTwo = $j('.template-two');
	var header = $j('.mod-header');
	var isMoving;

	header.on('click', 'a', function(e) {

		var currentTarget = $j(e.currentTarget);
		var $mod = $j(e.delegateTarget);
		var offset = $mod.outerHeight();

		if ($j(e.currentTarget).is('.jump-link')) {
			e.preventDefault();	
			var top = $j(currentTarget.attr('href')).position().top;	

			$_b.animate({
				scrollTop: top - (offset + 40)
			}, '500', 'swing');

			if (currentTarget.parents('.second-nav').length) {
				currentTarget.parent().siblings().removeClass('active');
				currentTarget.parent().addClass('active');
			}

			return;				
		}

		// to trigger dropdown
		if(currentTarget.is('.dropdown')) {
			var $target = $j('.' + $j(this).data('menu'));
			e.preventDefault();	
			$target.slideToggle(400);
			$mod.toggleClass("open");

			return;
		}	
	});

	$j('form input').each(function() {
		$j(this).on('focusout', function(e) {
			var valid = false;
			
			if(e.currentTarget.value != '') {
				valid = true;
			}

			$j(e.currentTarget).toggleClass('valid', valid);
		})
	});

	// $('input[name="redirect_to"]').val($('page-id').text());

	var items = $j('.sub-menu li');
	var contentSections = $j('#top .content__section[id]');

	$_w.on('scroll', function() {

		var top = $j(this).scrollTop();
		var padTop = parseInt($j('#top').css('padding-top'));

		if (top >= 1) {
			isMoving = true;
		} else {
			isMoving = false;
		}

		header.toggleClass('sticky-header', isMoving);


		contentSections.each(function(e, i) {
			if (top >= ($j(i).position().top - padTop)) {
				items.removeClass('active');
				items.eq($j(i).index()).addClass('active');
			}
		})
	});

	// $_w.on('scroll', function() {
	// 	subMenuArea.each(function() {
	// 		console.log(area)
	// 		var area = $j(this);
	// 		var link = $j('#' + area.id);

	// 		if ($_w.scrollTop() >= area.position().top) {
	// 			subMenuItems.removeClass('active');
	// 			link.addClass('active');
	// 		}
	// 	});
	// });

	$j('.skills-mod').each(function() {

		var skill = $j(this);

		skill.on('click', '.skills-mod--main-link', function(e) {

			if ($_w.width() > tableBreakpoint) {

				var $target   = $j(e.currentTarget).parent();
					$mod      = $j(e.delegateTarget),
					isOpenSkill = $target.hasClass('skills-mod__skill--open'),
					isView    = $j(e.target).is('.skills-mod--view-all');

				$mod.removeClass('skills-mod--open').find('.skills-mod__skill--open').removeClass('skills-mod__skill--open');

				// allow clicking through to skill and and not arrow.
				if (isView) return;

				e.preventDefault();

				// Return is clicking arrow to close.
				if (isOpenSkill) return;
				
				$target.addClass('skills-mod__skill--open');
				$mod.addClass('skills-mod--open')
			}
		});
	});
});