var $j = jQuery.noConflict();

$j(function() {
	var $_b = $j('html, body');
	var $_w = $j(window);
	var tableBreakpoint = 768;
	var templateTwo = $j('.template-two');
	var subMenuItems = $j('.sub-menu li');
	var subMenuHrefs = subMenuItems.find('a').attr('href');
	var subMenuArea = $j(subMenuHrefs);

	$j('.mod-header').on('click', 'a', function(e) {

		var currentTarget = $j(e.currentTarget);
		var $mod = $j(e.delegateTarget);
		var offset = templateTwo.length ? $mod.outerHeight() : '';

		if (!currentTarget[0].href.match(/http:/)) {
			e.preventDefault();						
		}

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
					isArrow    = $j(e.target).is('.skills-mod--arrow') || $j(e.target).is('.arrow');

				$mod.removeClass('skills-mod--open').find('.skills-mod__skill--open').removeClass('skills-mod__skill--open');

				// allow clicking through to skill and and not arrow.
				if (isOpenSkill && !isArrow) return;

				e.preventDefault();

				// Return is clicking arrow to close.
				if (isOpenSkill && isArrow) return;
				
				$target.addClass('skills-mod__skill--open');
				$mod.addClass('skills-mod--open')
			}
		});
	});
});