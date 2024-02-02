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

            toolbarButtons: [
                ['fullscreen',
                    'undo',
                    'redo',
                    'getPDF',
                    'print'
                ],
                [
                    'bold',
                    'italic',
                    'underline',
                    'textColor',
                    'backgroundColor',
                    'inlineStyle',
                    'clearFormatting'
                ],
                [
                    'alignLeft',
                    'alignCenter',
                    'alignRight',
                    'alignJustify'
                ],
                [
                    'formatOL',
                    'formatUL',
                    'indent',
                    'outdent'
                ],
                [
                    'paragraphFormat'
                ],
                [
                    'fontSize'
                ],
                [
                    'insertLink',
                    'insertImage',
                    'quote'
                ]
            ],
            imageInsertButtons: ['imageBack', '|', 'imageByURL'],
            imagePaste: false,
            imageUpload: false,

        });
    </script>
@endpush
