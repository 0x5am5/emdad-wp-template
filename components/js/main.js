var $j = jQuery.noConflict();

$j(function() {
	var $_b = $j('html, body');
	var $_w = $j(window);
	var tableBreakpoint = 768;
	var templateTwo = $j('.template-two');
	var subMenuItems = $j('.sub-menu li');
	var subMenuHrefs = subMenuItems.find('a').attr('href');
	var subMenuArea = $j(subMenuHrefs);
	var header = $j('.mod-header');
	var isMoving;

	header.on('click', 'a', function(e) {

		var currentTarget = $j(e.currentTarget);
		var $mod = $j(e.delegateTarget);
		var offset = $mod.outerHeight();

		if ($j(e.currentTarget).is('.jump-link')) {
			e.preventDefault();						
		}

		// to trigger dropdown
		if(currentTarget.is('.dropdown')) {

			var $target = $j('.' + $j(this).data('menu'));

			$target.slideToggle(400);
			$mod.toggleClass("open");

			return;
		}	

		var top = $j(currentTarget.attr('href')).position().top;
		
		$_b.animate({
			scrollTop: top - offset
		}, '500', 'swing');
		
	});

	$_w.on('scroll', function() {

		var top = $j(this).scrollTop();

		if (top >= 1) {
			isMoving = true;
		} else {
			isMoving = false;
		}

		header.toggleClass('sticky-header', isMoving);

	})

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