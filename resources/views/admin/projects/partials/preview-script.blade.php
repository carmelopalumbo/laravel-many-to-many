<script>
    function showImage(event) {
        const imageTag = document.getElementById('preview');
        imageTag.src = URL.createObjectURL(event.target.files[0])
    }
</script>
