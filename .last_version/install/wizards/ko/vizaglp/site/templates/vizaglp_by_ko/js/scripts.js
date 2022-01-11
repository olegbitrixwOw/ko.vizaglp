

$(function(){

	 // $(document).on("submit","#Form",function(e){
  //       e.preventDefault();
  //       var m_data=$(this).serialize();
  //       $.ajax({
  //           type: 'POST',
  //           url: 'assets/templates/kosmetolog/js/php.php',
  //           data: m_data,
  //           resetForm: 'true',
  //           success: function(result){
  //               alert('ok'+result)
  //           }
  //       });
  //   });

	$('.zap').click(function(){
		$('.popup').fadeIn();
		$('.bg_popup').fadeIn();

		$('.bg_popup, .krest').click(function(){
			$('.popup').fadeOut();
			$('.bg_popup').fadeOut();
		});
	});

	$('.slick').slick({
		dots: true
	});

	$('.fancy').fancybox();

	$(window).resize(function(){

		setInterval(function(){

			if($('.face').height() >= $(window).height()){
				$('header, .header_inset').height($(window).height());
			}
			else{
				$('header, .header_inset').height($('.face').height());
			}

		});

		$('.port').each(function(){
			var $ul = $('ul', this);
			var $li = $('li', this);
			var $this = $(this);

			var q = 5;

			if($(window).width() < 1000){
				q = 2
			}

			$('.port_slick').slick({
			  slidesToShow: q,
			  slidesToScroll: 1,
			  autoplay: true,
			  autoplaySpeed: 1000,
			});

			// if($(window).width() < 1000){
			// 	$li.width($(window).width()/2);
			// 	$ul.width($li.length * 50 + '%');
			// }
			// else{
			// 	$ul.width($li.length * 20 + '%');
			// 	$li.width($(window).width()/5);
			// }


			// $ul.css({
			// 	'left' : - $ul.width() + $(window).width()
			// });

			// var x = 1;

			// setInterval(function(){

			// 	if(x == 1){
			// 		$ul.css({
			// 			'left' : 0
			// 		});
			// 		x=0;
			// 	}
			// 	else{
			// 		$ul.css({
			// 			'left' : - $ul.width() + $(window).width()
			// 		});
			// 		x=1;
			// 	}
			// }, 30000);

		});

	}).resize();

	var $animate = $('.animate');

	$(window).scroll(function(){

		$animate.each(function(){
			var $this = $(this);

			if( $this.offset().top < $(window).scrollTop() + $(window).height() / 1.3){
				$this.addClass('active');
			}
			else{
				$this.removeClass('active');
			}
		});

		$('.header_inset').css({'top': - $(window).scrollTop() / 2});

		if($(window).scrollTop() > 200){
			$('.top_line').css('z-index','1');
		}
		else{
			$('.top_line').css('z-index','5');
		}

	}).scroll();

	$('.uslugi li').click(function(){
		$(this).addClass('click').siblings().removeClass('click');
	});

	$('.sert > span').click(function(){
		if($(this).hasClass('active')){
			$(this).removeClass('active').siblings('div').removeClass('active');
		}
		else{
			$(this).addClass('active').siblings('div').addClass('active');
		}
	});

	$('.form').each(function(){
		var $this = $(this);

		var $er = $('input[name="phone"]', this);

		$('input[type="button"]', this).click(function(){
			var name = $this.find('input[name="name"]').val();
			var phone = $this.find('input[name="phone"]').val();
			var email = $this.find('input[name="email"]').val();
			var $input = $this.find('input[type="text"]');

			$er.focus().removeClass('active');

			if(phone !== ''){

				phone = '\nТелефон: ' + name;

				if(name == undefined){
					name = '';
				}
				else{
					name = '\nИмя: ' + name;
				}

				if(email == undefined){
					email = '';
				}
				else{
					email = '\nE-mail: ' + email;
				}


				$.ajax({
					type: "POST",
					url: "js/php.php",
					data: {
						name:name,
						phone:phone,
						email:email,
					},
					success :function (data) {
						$input.val('')
						alert('Данные отправленны!');
					},

					dataType : 'text'
				});
			}
			else{
				$er.addClass('active');
			}

		});
	});

});
















