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
    textarea {
        max-width: 100%;
        width: 280px;
        padding: 8px 12px;
        font-size: 13px;
        border: var(--pco-control-border);
        box-shadow: var(--pco-box-shadow);
        border-radius: var(--pco-border-radius);
        color: var(--pco-secondary-text);
        background-color: var(--pco-control-bg);
        margin: 0;
    }
</style>

<textarea type="text" bind:value rows="5" cols="40" {...args.attributes} />