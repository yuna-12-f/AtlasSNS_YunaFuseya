$(function () {
    $(".js-accordion-title").on("click", function () {
        $(this).next().slideToggle(300);
        $(this).toggleClass("open", 300);
    });
});

// 変数に要素を入れる
var trigger = $('.modal__trigger'),
    wrapper = $('.modal__wrapper'),
    layer = $('.modal__layer'),
    container = $('.modal__container'),
    close = $('.modal__close');

// 『モーダルを開くボタン』をクリックしたら、『モーダル本体』を表示
$(trigger).click(function () {
    var index = $(this).index();
    $(wrapper).eq(index).fadeIn(400);

    var post = $(this).attr('post');
    // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
    var post_id = $(this).attr('post_id');

    // 取得した投稿内容をモーダルの中身へ渡す
    $('.modal_post').text(post);
    // 取得した投稿のidをモーダルの中身へ渡す
    $('.modal_id').val(post_id);
    return false;

    // スクロール位置を戻す
    $(container).scrollTop(0);

    // サイトのスクロールを禁止にする
    $('html, body').css('overflow', 'hidden');
});

// 『背景』と『モーダルを閉じるボタン』をクリックしたら、『モーダル本体』を非表示
$(layer).add(close).click(function () {
    $(wrapper).fadeOut(400);

    // サイトのスクロール禁止を解除する
    $('html, body').removeAttr('style');
});
