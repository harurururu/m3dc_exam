$(function () {

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg != value;
    }, "選択してください");

    $.extend(jQuery.validator.messages, {
        required: "必須項目です",
        maxlength: jQuery.validator.format("{0} 文字以下を入力してください"),
        minlength: jQuery.validator.format("{0} 文字以上を入力してください"),
        rangelength: jQuery.validator.format("{0} 文字以上 {1} 文字以下で入力してください"),
        email: "メールアドレスを入力してください",
        url: "URLを入力してください",
        dateISO: "日付を入力してください",
        number: "有効な数字を入力してください",
        digits: "0-9までを入力してください",
        // equalTo: "同じ値を入力してください",
        range: jQuery.validator.format(" {0} から {1} までの値を入力してください"),
        max: jQuery.validator.format("{0} 以下の値を入力してください"),
        min: jQuery.validator.format("{0} 以上の値を入力してください"),
    });


    $("#nameForm").validate({
        rules: {
            todohuken: {
                valueNotEquals: "msg",
                range: [1,47],
            },
            fname: {
                required: true,
                maxlength: 50,
            },
            lname: {
                required: true,
                maxlength: 50,
            },
            viewcnt: {
                required: true,
                number: true,
            },
        },
        messages: {
            todohuken: {
                equalTo: "選択してください",
                range: "値が不正です",
            },

        },
        errorClass: "error_msg",
        wrapper: "li"
    });
});
