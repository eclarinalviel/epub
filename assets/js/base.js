$(function () {

    function icheck() {
        $('input').iCheck({
            labelHover: false,
            cursor: true,
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green',
            increaseArea: '20%' // optional
        });
    }

    function btn_change_state() {
        $('#btn-change-state').click(function () {
            var btn = $(this);
            btn.button('loading');
            setTimeout(function () {
                btn.button('reset');
            }, 3000);
        });
    }

    function word_count() {
        $("#word_count").on('keyup', function () {
            var words = this.value.match(/\S+/g).length;
            if (words > 100) {
                // Split the string on first 200 words and rejoin on spaces
                var trimmed = $(this).val().split(/\s+/, 100).join(" ");
                // Add a space at the end to keep new typing making new words
                $(this).val(trimmed + " ");
            }
            else {
                $('#display_count').text(words);
                $('#word_left').text(100 - words);
            }
        });
    }

    function animateScroll() {
        new WOW().init();
    }

    //Custom dropdown select
    function chosen() {
        $(".chosen-select").chosen();
    }

    //Active List Highlighting
    function sidebar() {
        var str = location.href.toLowerCase();
        $(".nav-sidebar li a").each(function () {
            if (str.indexOf(this.href.toLowerCase()) > -1) {
                $(".nav-sidebar li.active").removeClass("active");
                $(this).parent().addClass("active");
            }
        });
        $(".nav-sidebar li.active").parents().each(function () {
            if ($(this).is("li")) {
                $(this).addClass("active");
            }
        });
    }

    function tooltip() {
        $('[data-toggle="tooltip"]').tooltip();
    }

    function popover() {
        $("#popover").popover({
            trigger: "hover",
            html: true,
            content: function () {
                return;
            }
        });
    }

    //Timeago
    function timeago() {
        $("time").timeago();
    }

    //Feedback Message
    function feedback() {
        $('#feedback').addClass('animated shake').fadeOut(5000);
    }

    //Tinymce WYSIWYG
    function wysiwyg() {
        tinymce.init({
            selector: "textarea",
            skin: "lightgray",
            theme: "modern",
            menubar: false, // Disable all menus
            statusbar: true, // Disable status bar
            toolbar_items_size: 'medium',
            forced_root_block: false, // Remove <p> tag
            force_p_newlines: false,
            remove_linebreaks: false,
            force_br_newlines: false,
            remove_trailing_nbsp: false,
            verify_html: false,
            relative_urls: true,
            plugins: [
                "wordcount",
                "link",
                "advlist",
                "autolink",
                "preview",
                "code"
            ],
            toolbar: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist | link unlink | preview code"
        });
        //Prevent bootstrap dialog from blocking focusin
        $(document).on('focusin', function (e) {
            if ($(e.target).closest(".mce-window").length) {
                e.stopImmediatePropagation();
            }
        });
    }

    // Datatables
    function datatables() {
        var table = $('table').dataTable({
            "order": [[0, "desc"]]
        });
        var tableTools = new $.fn.dataTable.TableTools(table, {
            "buttons": [
                "copy",
                "xls",
                "pdf"
            ]
        });
        $(tableTools.fnContainer()).appendTo('div.command-group-footer');
    }

    icheck();
    btn_change_state();
    word_count();
    animateScroll();
    chosen();
    sidebar();
    tooltip();
    popover();
    timeago();
    feedback();
    wysiwyg();
    datatables();
});