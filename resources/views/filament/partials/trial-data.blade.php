<script>
    window.App = {
        isTrial: @json(auth()->user()?->isTrial()),
    };
</script>
