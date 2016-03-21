tinymce.init({
    selector: 'textarea',
    theme: 'modern',
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | sizeselect | bold italic | fontselect |  fontsizeselect',
    toolbar2: 'print preview media | forecolor backcolor emoticons',
    image_advtab: true,
    fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
    templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
    ],
    content_css: [
        '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
        '//www.tinymce.com/css/codepen.min.css'
    ],
    setup: function(editor) {
        editor.on('change', function(e) {
            $('#editor').html(editor.getContent());
        });
    }
});