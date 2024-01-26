@push('css')
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet'
        type='text/css' />
@endpush

@push('scripts')
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'>
    </script>

    <script>
        new FroalaEditor('#editor', {
            quickInsertEnabled: false,

            toolbarButtons: {

                'moreText': {

                    'buttons': ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript',
                         'textColor', 'backgroundColor',
                    ]

                },

                'moreParagraph': {

                    'buttons': ['alignLeft', 'alignCenter', 'formatOLSimple', 'alignRight', 'alignJustify',
                        'formatOL', 'formatUL', 'paragraphFormat', 'paragraphStyle', 'lineHeight', 'outdent',
                        'indent', 'quote'
                    ]

                },

                'moreRich': {

                    'buttons': ['insertLink', 'insertTable', 'emoticons',
                        'fontAwesome', 'specialCharacters', 'embedly',  'insertHR'
                    ]

                },

                'moreMisc': {

                    'buttons': ['undo', 'redo', 'fullscreen', 'print', 'getPDF', 'spellChecker', 'selectAll',
                        'html', 'help'
                    ],

                    'align': 'right',

                    'buttonsVisible': 2

                }

            }

        });
    </script>
@endpush
