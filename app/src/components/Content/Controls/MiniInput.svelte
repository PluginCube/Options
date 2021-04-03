<script>
    export let value = ''
    export let args = {}

    import merge from 'deepmerge'

    $: args = merge(
        {
            icon: 'ri-page-separator',
            attributes: {
                type: 'text',
            },
        },
        args
    )

    let input
</script>

<style lang="scss">
    div {
        position: relative;
        border: var(--pco-control-border) !important;
        box-shadow: var(--pco-box-shadow) !important;
        border-radius: var(--pco-border-radius);
        overflow: hidden;
        width: fit-content;

        i {
            float: left;
            font-size: 14px;
            position: absolute;
            right: 0px;
            background: var(--pco-control-bg);
            width: 32px;
            height: 100%;
            line-height: 34px;
            text-align: center;
            border-left: 1px solid #00000010;
            cursor: pointer;
            padding-right: 1px;
            color: var(--pco-primary-text);
        }

        input {
            float: left;
            width: 125px;
            max-width: 100%;
            padding: 0px 10px;
            font-size: 13px;
            border: none;
            line-height: 34px;
            height: 34px;
            box-shadow: none;
            border-radius: var(--pco-border-radius);
            margin: 0;
            font-size: 11px;
            padding-top: 2px;
        }
    }
</style>

<div>
    <i class={args.icon} on:click={() => input.focus()} />
    <input bind:value {...args.attributes} bind:this={input} />
</div>