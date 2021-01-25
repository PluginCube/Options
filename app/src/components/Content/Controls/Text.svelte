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
        padding: 6px 12px;
        font-size: 13px;
        border: var(--pco-control-border) !important;
        box-shadow: var(--pco-box-shadow) !important;
        border-radius: var(--pco-border-radius);
        margin: 0;
    }
</style>

<input type="text" bind:value {...args.attributes} />