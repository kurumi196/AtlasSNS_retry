$(function(){
	// 変数に要素を入れる
	var open = $('.modal-open'),
		container = $('.modal-container');
	//開くボタンをクリックしたらモーダルを表示する
	open.on('click',function(){	
		// container.addClass('active');
        container.fadeIn();
        var post=$(this).data('post'),
        id=$(this).data('id');
        $('.modal-post').val(post);
        $('.modal-id').val(id);
		return false;
	});
	//モーダルの外側をクリックしたらモーダルを閉じる
	$(document).on('click',function(e) {
		if(!$(e.target).closest('.modal-body').length) {
			container.removeClass('active').fadeOut();
		}
	});
    // https://recooord.org/jquery-modal-window/
    // https://qiita.com/sanogemaru/items/faf1821ae09820e30ce8
    // https://www.nyamucoro.com/entry/2020/03/23/204637

	$('.accordion-open').on('click',function(){
		$('.accordion-container').slideToggle();
	})

});