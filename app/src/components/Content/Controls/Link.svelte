<script>
    export let args

    import Button from '../../Comman/Button'
    import SvelteTooltip from 'svelte-tooltip'

    $: color = args.color || '#fd1044';
    $: msg = args.msg || '#fd1044';

    let click = () => {
        if ( args.url ) {
            window.open(args.url, "_blank");
        }
    }

    $: style = `font-weight: 700; padding: 0px 10px; margin-top: 10px; background: ${color};`;
</script>

<style>
    i {
        margin-right: 5px;
        font-weight: 100;
    }

    :global(.tooltip.top) {
        margin-top: -35px !important;
    }
</style>

<SvelteTooltip tip={msg} top color="#ffffff">
    <Button on:click={click} {style}>
        {#if args.icon}
            <i class={args.icon}></i>
        {/if}

        {args.text}
    </Button>
</SvelteTooltip>
