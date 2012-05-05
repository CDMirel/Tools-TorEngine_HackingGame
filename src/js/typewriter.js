(function ($) {
    $.fn.typewriter = function () {
        this.each(function () {
            var $ele = $(this),
                str = $ele.text(),
                progress = 0;
            $ele.text('');
            var timer = setInterval(function () {
                $ele.text(str.substring(0, progress++) + (progress & 1 ? '\u25ae' : ''));
                if (progress >= str.length) clearInterval(timer);
            }, 40);
        });
        return this;
    };
})(jQuery);

$(document).ready(function () {
    $("#line2,#line3,#line4").hide();
    $("#line1").typewriter().delay(1800).queue(function (next) {
        $("#line2").show().typewriter().delay(1800).queue(function (next) {
            $("#line3").show().typewriter().delay(1800).queue(function (next) {
				$("#line4").show().typewriter().delay(1800).queue(function (next) {
					$("#line5").show().typewriter().delay(1800).queue(function (next) {
						$("#line6").show().typewriter();
						next();
					});
				next();
			});
			next();
        });
        next();
    });
});
