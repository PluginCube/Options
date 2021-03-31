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
        width: 220px;
        max-width: 100%;
        padding: 4px 12px;
        font-size: 13px;
        border: var(--pco-control-border) !important;
        box-shadow: var(--pco-box-shadow) !important;
        border-radius: var(--pco-border-radius);
        color: var(--pco-secondary-text);
        background-color: var(--pco-control-bg);
        margin: 0;
    }
</style>

<input type="text" bind:value {...args.attributes} />