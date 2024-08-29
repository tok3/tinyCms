<?php
$manifestPath = public_path('build/manifest.json');

if (file_exists($manifestPath)) {
    $manifest = json_decode(file_get_contents($manifestPath), true);
}

return [
    /*
    |--------------------------------------------------------------------------
    | Profiles
    |--------------------------------------------------------------------------
    |
    | You can add as many as you want of profiles to use it in your application.
    |
    */

    'profiles' => [

        'default' => [
            'plugins' => 'advlist autoresize codesample directionality emoticons fullscreen hr image imagetools link lists media table toc wordcount',
            'toolbar' => 'undo redo removeformat | formatselect fontsizeselect | bold italic | rtl ltr | alignjustify alignright aligncenter alignleft | numlist bullist | forecolor backcolor | blockquote table toc hr | image link media codesample emoticons | wordcount fullscreen',
            'upload_directory' => null,
        ],

        'simple' => [
            'plugins' => 'code autoresize directionality emoticons link wordcount',
            'toolbar' => 'code | removeformat | bold italic | rtl ltr | link emoticons',
            'upload_directory' => null,
            'content_css'=>'http://localhost:8003/build/assets/theme-CpaP5O79.css',
            'importcss_append'=>true,
        ],

        'template' => [
            'plugins' => 'autoresize template',
            'toolbar' => 'template',
            'upload_directory' => null,
        ],
        /*
        |--------------------------------------------------------------------------
        | Custom Configs
        |--------------------------------------------------------------------------
        |
        | If you want to add custom configurations to directly tinymce
        | You can use custom_configs key as an array
        |
        */


          'assan' => [
            'plugins' => 'fullscreen code autoresize directionality emoticons link wordcount template',
            'toolbar' => 'fullscreen code | removeformat | bold italic | rtl ltr | link emoticons | template',
            'custom_configs' => [
                'content_css'=>'/build/'.$manifest['resources/scss/tinyMCEtheme.scss']['file'],

            ]
        ],

        'custom' => [
            'plugins' => 'code advlist autoresize codesample directionality emoticons fullscreen hr image imagetools link lists media table toc wordcount',
            'toolbar' => 'fullscreen | code | undo redo removeformat | formatselect fontsizeselect | bold italic | rtl ltr | alignjustify alignright aligncenter alignleft | numlist bullist | forecolor backcolor | blockquote table toc hr | image link media codesample emoticons | wordcount ',
            'upload_directory' => 'storage',
            'custom_configs' => [
                'allow_html_in_named_anchor' => true,
                'link_default_target' => '_blank',
                'codesample_global_prismjs' => true,
                'image_advtab' => true,
                'extended_valid_elements' => 'section[class|id|style|data-*],div[class|id|style|data-*],svg[*],defs[*],linearGradient[*],stop[*],filter[*],feTurbulence[*],feGaussianBlur[*],feBlend[*],feColorMatrix[*],rect[*],h1[class|id|style|data-*],h5[class|id|style|data-*],p[class|id|style|data-*],a[href|class|id|style|data-*|target|rel],i[class|id|style|data-*],ul[class|id|style|data-*],li[class|id|style|data-*],small[class|id|style|data-*|target|rel|href]',
                'valid_children' => '+body[section|svg|defs], +defs[linearGradient|filter], +linearGradient[stop], +svg[rect|defs|filter], +div[h1|h5|p|a|i|ul|li|small]',
                'forced_root_block' => '',  // Verhindert das automatische Hinzufügen von <p>-Tags um Inhalte
                'entity_encoding' => 'raw',  // Erlaubt die Ausgabe von HTML-Entitäten in ihrem Rohformat
                'valid_elements' => '*[*]',  // Erlaubt grundsätzlich alle HTML-Elemente und Attribute
                'custom_elements' => 'section,div,svg,defs,linearGradient,stop,filter,feTurbulence,feGaussianBlur,feBlend,feColorMatrix,rect,h1,h5,p,a,i,ul,li,small',  // Fügt benutzerdefinierte oder nicht standardmäßige Elemente hinzu
                'image_class_list' => [
                  [
                    'title' => 'None',
                    'value' => '',
                  ],
                  [
                    'title' => 'Fluid',
                    'value' => 'img-fluid',
                  ],
                  [
                    'title' => 'Mask - Kidney (blob)',
                    'value' => 'mask-image mask-blob',
                  ],
                  [
                    'title' => 'Mask - Kidney flip-x (blob-3)',
                    'value' => 'mask-image mask-blob flip-x',
                  ],

              ],
                'content_css'=>'/build/'.$manifest['resources/scss/tinyMCEtheme.scss']['file'],
                'images_upload_url' => '/upload-image', // Direkte URL verwenden
                'automatic_uploads' => true,
                'images_upload_handler' => 'function (blobInfo, success, failure) {
                let formData = new FormData();
                formData.append("file", blobInfo.blob(), blobInfo.filename());

                fetch("/upload-image", {
                    method: "POST",
                    body: formData,
                }).then(response => response.json())
                .then(result => {
                    if (result && result.location) {
                        success(result.location);
                    } else {
                        failure("Image upload failed");
                    }
                }).catch(error => {
                    failure("Image upload failed: " + error.message);
                });
            }',
            ]
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Templates
    |--------------------------------------------------------------------------
    |
    | You can add as many as you want of templates to use it in your application.
    |
    | https://www.tiny.cloud/docs/plugins/opensource/template/#templates
    |
    | ex: TinyEditor::make('content')->profiles('template')->template('example')
    */

    'templates' => [

        'example' => [
            // content
            ['title' => 'Some title 1', 'description' => 'Some desc 1', 'content' => 'My content'],
            // url
            ['title' => 'Some title 2', 'description' => 'Some desc 2', 'url' => 'http://localhost'],
        ],
        'assan' => [
            // content
            ['title' => 'countdown', 'description' => 'countdown', 'content' => '<div class="position-relative d-flex flex-wrap mb-7" data-countdown="2024/01/01"></div>'],
            // url
            ['title' => 'countdown fille', 'countdown file' => 'Some desc 2', 'url' => 'countdown.html'],
        ],

    ],
];
