<script>
    export let value = ''
    export let options = {}

    import merge from 'deepmerge'

    $: options = merge(
        {
            icon: 'ri-page-separator',
            attributes: {
                type: 'text',
            },
        },
        options
    )

    let input
</script>

<style lang="scss">
    div {
        position: relative;
        border: var(--cf-control-border) !important;
        box-shadow: var(--cf-box-shadow) !important;
        border-radius: var(--cf-border-radius);
        overflow: hidden;
        width: fit-content;

        i {
            float: left;
            font-size: 14px;
            position: absolute;
            right: 0px;
            background: #fff;
            width: 32px;
            height: 100%;
            line-height: 34px;
            text-align: center;
            border-left: var(--cf-control-border);
            cursor: pointer;
            padding-right: 1px;
            color: var(--cf-primary-text);
        }

        input {
            float: left;
            width: 125px;
            max-width: 100%;
            padding: 4px 12px;
            font-size: 13px;
            border: none;
            box-shadow: none;
            border-radius: var(--cf-border-radius);
            margin: 0;
        }
    }
</style>

<div>
    <i class={options.icon} on:click={() => input.focus()} />
    <input bind:value {...options.attributes} bind:this={input} />
</div>