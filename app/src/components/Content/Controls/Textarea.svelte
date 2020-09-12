<script>
    export let value
    export let options
</script>

<style>
    textarea {
        max-width: 100%;
        width: 280px;
        padding: 6px 12px;
        font-size: 13px;
        border: var(--cf-control-border);
        box-shadow: var(--cf-box-shadow);
        border-radius: var(--cf-border-radius);
        margin: 0;
    }
</style>

<textarea type="text" bind:value rows="5" cols="40" {...options.attributes} />