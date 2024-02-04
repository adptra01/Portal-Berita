<style>
    .blog_details {
        color: #212529;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    .blog_details h1 {
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .blog_details h1 strong {
        color: inherit;
    }

    .blog_details ol {
        margin-bottom: 1rem;
        padding-left: 1.25rem;
        list-style-type: decimal;
    }

    .blog_details ul {
        margin-bottom: 1rem;
        padding-left: 1.25rem;
        list-style-type: disc;
    }

    .blog_details li {
        margin-bottom: 0.25rem;
        list-style: inherit;
    }

    .blog_details p {
        margin-bottom: 1rem;
        font-size: 1rem;
    }

    .blog_details blockquote {
        margin: 0 0 1rem;
        padding: 0.5rem 1rem;
        border-left: 0.25rem solid #dee2e6;
        color: #6c757d;
        font-style: italic;
    }

    .blog_details blockquote p {
        margin: 0;
        font-style: italic;
    }

    .blog_details strong {
        font-weight: 700;
    }

    .blog_details em {
        font-style: italic;
    }

    /* Bootstrap styles */
    .blog_details a {
        color: #0d6efd;
        text-decoration: none;
        /* Remove underline for all links */
    }
</style>
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/plugins/paragraph_format.min.js">
    <link href="{{ asset('/admin/css/froala_style.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
