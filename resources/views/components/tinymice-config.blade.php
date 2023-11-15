<!-- Include TinyMCE script -->
<script src="https://cdn.tiny.cloud/1/e1d5h7rpbpidycuvg98uz2kh4c2bdsi1njka5gicbt096y1v/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Initialize TinyMCE with Prism.js code highlighting -->
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat ',
    });
</script>
