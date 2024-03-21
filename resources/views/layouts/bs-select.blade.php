@push('css')
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
@endpush
@push('scripts')
    <script>
        document.querySelectorAll('select').forEach((el) => {
            let settings = {};
            new TomSelect(el, settings);
        });
    </script>
    <script>
        new TomSelect("#input-tags", {
            persist: false,
            createOnBlur: true,
            create: true
        });
    </script>
@endpush
