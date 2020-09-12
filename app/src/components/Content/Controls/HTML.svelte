<script>
    export let args

    import merge from 'deepmerge'

    $: args = merge(
        {
            content: null,
        },
        args
    )
</script>

{@html args.content}