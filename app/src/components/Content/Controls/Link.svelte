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

    $: style = `font-weight: 900; background: ${color};`;
</script>

<style>
    i {
        margin-right: 5px;
        font-weight: 100;
        float: left;
    }
</style>

<SvelteTooltip tip={msg} top color="var(--pco-control-bg)">
    <Button on:click={click} {style} small>
        {#if args.icon}
            <i class={args.icon}></i>
        {/if}

        {args.text}
    </Button>
</SvelteTooltip>
