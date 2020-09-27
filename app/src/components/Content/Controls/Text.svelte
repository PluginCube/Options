<script>
    export let value
    export let args

    import merge from 'deepmerge'

    $: args = merge(
        {
            attributes: {},
        },
        args
    )
</script>

<style>
    input {
        width: 260px;
        max-width: 100%;
        padding: 4px 12px;
        font-size: 13px;
        border: var(--co-control-border) !important;
        box-shadow: var(--co-box-shadow) !important;
        border-radius: var(--co-border-radius);
        margin: 0;
    }
</style>

<input type="text" bind:value {...args.attributes} />